<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsResource\Pages;
use App\Filament\Resources\NewsResource\RelationManagers;
use App\Models\CategoriesNews;
use App\Models\News;
use App\Models\NewsStatus;
use Dompdf\FrameDecorator\Text;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Grouping\Group as TableGroup;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Post;

use function Clue\StreamFilter\fun;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;

    protected static ?string $navigationLabel = 'Manage News';

    protected static ?string $slug = 'manage-news';

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationGroup = 'News';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->placeholder('Masukkan judul berita'),
                TextInput::make('slug')
                    ->required()
                    ->placeholder('Masukkan slug berita'),
                Select::make('category_id')
                    ->label('Category')
                    ->required()
                    ->default(0)
                    ->relationship('category', 'name'),
                FileUpload::make('image_url')
                    ->label('Image')
                    ->required()
                    ->disk('public')
                    ->directory('image/news')
                    ->columnSpanFull()
                    ->previewable(true)
                    ->storeFileNamesIn('attachment_file_names')
                    ->panelLayout('grid'),
                RichEditor::make('content')
                    ->columnSpanFull()
                    ->required(),
                TagsInput::make('tags')
                    ->required()
                    ->separator(', ')
                    ->splitKeys(['Enter', ',', 'Tab'])
                    ->label('Tags')
                    ->placeholder('Enter tags'),
                Select::make('status_id')
                    ->required()
                    ->label('Status')
                    ->options(NewsStatus::all()->pluck('name', 'id'))
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        if ($state == 2) {
                            $set('published_at', now());
                        }
                    }),
                DateTimePicker::make('published_at')
                    ->hidden(fn ($get) => $get('status_id') != 2),
                Hidden::make('author_id')
                    ->default(Auth::user()->id),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->groups([
                TableGroup::make('status.name')
                    ->label('Status'),
                TableGroup::make('category.name')
                    ->label('Category'),
            ])
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('category.name')
                    ->label('Category')
                    ->searchable(),
                TextColumn::make('user.name')
                    ->label('Author')
                    ->searchable(),
                TextColumn::make('status.name')
                    ->label('Status')
                    ->badge()
                    ->color(fn (News $news) => match ($news->status->name) {
                        'Draft' => 'gray',
                        'Published' => 'success',
                        'Archived' => 'danger',
                    })
                    ->icon(fn (News $news) => match ($news->status->name) {
                        'Draft' => 'heroicon-o-pencil',
                        'Published' => 'heroicon-o-check-circle',
                        'Archived' => 'heroicon-o-archive-box',
                    })
                    ->searchable(),
                ImageColumn::make('image_url')
                    ->label('Image')
                    ->disk('public')
                    ->defaultImageUrl('news.image'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageNews::route('/'),
        ];
    }
}
