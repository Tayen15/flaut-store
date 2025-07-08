<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductVariantResource\Pages;
use App\Filament\Resources\ProductVariantResource\RelationManagers;
use App\Models\ProductVariant;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductVariantResource extends Resource
{
    protected static ?string $model = ProductVariant::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Catalogs';

    protected static ?string $navigationLabel = 'Product Variants';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('catalog_id')
                    ->label('Product')
                    ->relationship('catalog', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('e.g., Red - Large'),

                Forms\Components\TextInput::make('sku')
                    ->label('SKU')
                    ->required()
                    ->unique(ProductVariant::class, 'sku', ignoreRecord: true)
                    ->maxLength(255),

                Forms\Components\TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('Rp')
                    ->step(0.01),

                Forms\Components\TextInput::make('compare_at_price')
                    ->label('Compare at Price')
                    ->numeric()
                    ->prefix('Rp')
                    ->step(0.01),

                Forms\Components\TextInput::make('stock_quantity')
                    ->label('Stock')
                    ->required()
                    ->numeric()
                    ->default(0),

                Forms\Components\TextInput::make('weight')
                    ->numeric()
                    ->suffix('kg')
                    ->step(0.01),

                Forms\Components\Toggle::make('track_quantity')
                    ->label('Track Quantity')
                    ->default(true),

                Forms\Components\Toggle::make('is_active')
                    ->label('Active')
                    ->default(true),
            ])
            ->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('catalog.name')
                    ->label('Product')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('sku')
                    ->label('SKU')
                    ->searchable()
                    ->copyable(),

                Tables\Columns\TextColumn::make('price')
                    ->money('IDR')
                    ->sortable(),

                Tables\Columns\TextColumn::make('stock_quantity')
                    ->label('Stock')
                    ->badge()
                    ->color(fn ($record) => $record->stock_quantity > 0 ? 'success' : 'danger')
                    ->sortable(),

                Tables\Columns\IconColumn::make('track_quantity')
                    ->label('Track Qty')
                    ->boolean(),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean()
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
                Tables\Filters\SelectFilter::make('catalog_id')
                    ->label('Product')
                    ->relationship('catalog', 'name')
                    ->searchable()
                    ->preload(),
                Tables\Filters\Filter::make('is_active')
                    ->label('Active Only')
                    ->query(fn (Builder $query): Builder => $query->where('is_active', true)),
                Tables\Filters\Filter::make('out_of_stock')
                    ->label('Out of Stock')
                    ->query(fn (Builder $query): Builder => $query->where('stock_quantity', '<=', 0)),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageProductVariants::route('/'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
