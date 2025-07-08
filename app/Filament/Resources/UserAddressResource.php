<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserAddressResource\Pages;
use App\Filament\Resources\UserAddressResource\RelationManagers;
use App\Models\UserAddress;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserAddressResource extends Resource
{
    protected static ?string $model = UserAddress::class;

    protected static ?string $navigationIcon = 'heroicon-o-map-pin';

    protected static ?string $navigationGroup = 'User Management';

    protected static ?string $navigationLabel = 'User Addresses';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label('User')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                Forms\Components\TextInput::make('label')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('e.g., Home, Office'),

                Forms\Components\TextInput::make('recipient_name')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->maxLength(20),

                Forms\Components\Textarea::make('address_line_1')
                    ->label('Address Line 1')
                    ->required()
                    ->rows(2),

                Forms\Components\Textarea::make('address_line_2')
                    ->label('Address Line 2 (Optional)')
                    ->rows(1),

                Forms\Components\TextInput::make('city')
                    ->required()
                    ->maxLength(100),

                Forms\Components\TextInput::make('state')
                    ->required()
                    ->maxLength(100),

                Forms\Components\TextInput::make('postal_code')
                    ->required()
                    ->maxLength(20),

                Forms\Components\TextInput::make('country')
                    ->required()
                    ->maxLength(100)
                    ->default('Indonesia'),

                Forms\Components\Toggle::make('is_default')
                    ->label('Default Address')
                    ->default(false),
            ])
            ->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('User')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('label')
                    ->badge()
                    ->color('blue')
                    ->searchable(),

                Tables\Columns\TextColumn::make('recipient_name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),

                Tables\Columns\TextColumn::make('full_address')
                    ->label('Address')
                    ->limit(50)
                    ->tooltip(function (Tables\Columns\TextColumn $column): ?string {
                        $state = $column->getState();
                        if (strlen($state) <= 50) {
                            return null;
                        }
                        return $state;
                    }),

                Tables\Columns\TextColumn::make('city')
                    ->searchable(),

                Tables\Columns\IconColumn::make('is_default')
                    ->label('Default')
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
                Tables\Filters\SelectFilter::make('user_id')
                    ->label('User')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->preload(),
                Tables\Filters\Filter::make('is_default')
                    ->label('Default Addresses Only')
                    ->query(fn (Builder $query): Builder => $query->where('is_default', true)),
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
            'index' => Pages\ManageUserAddresses::route('/'),
        ];
    }
}
