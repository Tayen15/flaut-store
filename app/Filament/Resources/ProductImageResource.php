<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductImageResource\Pages;
use App\Filament\Resources\ProductImageResource\RelationManagers;
use App\Models\ProductImage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductImageResource extends Resource
{
    protected static ?string $model = ProductImage::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationGroup = 'Catalogs';

    protected static ?string $navigationLabel = 'Product Images';

    protected static ?int $navigationSort = 5;

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

                Forms\Components\FileUpload::make('image_url')
                    ->label('Image')
                    ->image()
                    ->directory('image/catalog')
                    ->required()
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        '1:1',
                        '4:3',
                        '16:9',
                    ]),

                Forms\Components\TextInput::make('alt_text')
                    ->label('Alt Text')
                    ->maxLength(255)
                    ->placeholder('Describe the image for accessibility'),

                Forms\Components\TextInput::make('sort_order')
                    ->numeric()
                    ->default(0)
                    ->helperText('Lower numbers appear first'),

                Forms\Components\Toggle::make('is_primary')
                    ->label('Primary Image')
                    ->default(false)
                    ->helperText('Only one image can be primary per product'),
            ])
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_url')
                    ->label('Image')
                    ->square()
                    ->size(80),

                Tables\Columns\TextColumn::make('catalog.name')
                    ->label('Product')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('alt_text')
                    ->label('Alt Text')
                    ->limit(50)
                    ->tooltip(function (Tables\Columns\TextColumn $column): ?string {
                        $state = $column->getState();
                        if (strlen($state) <= 50) {
                            return null;
                        }
                        return $state;
                    }),

                Tables\Columns\TextColumn::make('sort_order')
                    ->sortable()
                    ->alignCenter(),

                Tables\Columns\IconColumn::make('is_primary')
                    ->label('Primary')
                    ->boolean(),

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
                Tables\Filters\SelectFilter::make('catalog_id')
                    ->label('Product')
                    ->relationship('catalog', 'name')
                    ->searchable()
                    ->preload(),
                Tables\Filters\Filter::make('is_primary')
                    ->label('Primary Images Only')
                    ->query(fn (Builder $query): Builder => $query->where('is_primary', true)),
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
            ->defaultSort('sort_order', 'asc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageProductImages::route('/'),
        ];
    }
}
