<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AttributeResource\Pages;
use App\Models\Attribute;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AttributeResource extends Resource
{
    protected static ?string $model = Attribute::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static ?string $navigationGroup = 'Catalogs';

    protected static ?string $navigationLabel = 'Attributes';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('e.g., Size, Color, Material'),

                Forms\Components\Select::make('type')
                    ->options([
                        'dropdown' => 'Dropdown',
                        'color_picker' => 'Color Picker',
                        'text' => 'Text Input',
                        'number' => 'Number Input',
                    ])
                    ->required()
                    ->default('dropdown'),

                Forms\Components\TextInput::make('sort_order')
                    ->numeric()
                    ->default(0)
                    ->helperText('Lower numbers appear first'),

                Forms\Components\Toggle::make('is_required')
                    ->label('Required for products')
                    ->default(false),
            ])
            ->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('type')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'dropdown' => 'blue',
                        'color_picker' => 'pink',
                        'text' => 'green',
                        'number' => 'orange',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('values_count')
                    ->label('Values')
                    ->counts('values')
                    ->badge()
                    ->color('success'),
                Tables\Columns\TextColumn::make('sort_order')
                    ->sortable()
                    ->alignCenter(),
                Tables\Columns\ToggleColumn::make('is_required')
                    ->label('Required'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'dropdown' => 'Dropdown',
                        'color_picker' => 'Color Picker',
                        'text' => 'Text Input',
                        'number' => 'Number Input',
                    ]),
                Tables\Filters\Filter::make('is_required')
                    ->label('Required Only')
                    ->query(fn(Builder $query): Builder => $query->where('is_required', true)),
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
            'index' => Pages\ManageAttributes::route('/'),
        ];
    }
}
