<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AttributeValueResource\Pages;
use App\Filament\Resources\AttributeValueResource\RelationManagers;
use App\Models\AttributeValue;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AttributeValueResource extends Resource
{
    protected static ?string $model = AttributeValue::class;

    protected static ?string $navigationIcon = 'heroicon-o-swatch';

    protected static ?string $navigationGroup = 'Catalogs';

    protected static ?string $navigationLabel = 'Attribute Values';

    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('attribute_id')
                    ->label('Attribute')
                    ->relationship('attribute', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                Forms\Components\TextInput::make('value')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('e.g., Large, Red, Cotton'),

                Forms\Components\ColorPicker::make('color_code')
                    ->label('Color Code')
                    ->helperText('Only for color attributes')
                    ->nullable(),

                Forms\Components\TextInput::make('sort_order')
                    ->numeric()
                    ->default(0)
                    ->helperText('Lower numbers appear first'),
            ])
            ->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('attribute.name')
                    ->label('Attribute')
                    ->badge()
                    ->color('blue')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('value')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\ColorColumn::make('color_code')
                    ->label('Color')
                    ->placeholder('N/A'),

                Tables\Columns\TextColumn::make('sort_order')
                    ->sortable()
                    ->alignCenter(),

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
                Tables\Filters\SelectFilter::make('attribute_id')
                    ->label('Attribute')
                    ->relationship('attribute', 'name')
                    ->searchable()
                    ->preload(),
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
            'index' => Pages\ManageAttributeValues::route('/'),
        ];
    }
}
