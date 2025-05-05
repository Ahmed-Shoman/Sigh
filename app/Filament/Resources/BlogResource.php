<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogResource\Pages;
use App\Models\Blog;
use Filament\Forms;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;
    protected static ?string $navigationIcon = 'heroicon-o-map';

    public static function getNavigationLabel(): string
    {
        return __('admin.blogs');
    }

    public static function getModelLabel(): string
    {
        return __('admin.blogs');
    }

    public static function getPluralModelLabel(): string
    {
        return __('admin.blogs');
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make(__('admin.blog'))
                ->schema([
                    Forms\Components\FileUpload::make('image')
                        ->required()
                        ->label(__('admin.image'))
                        ->directory('uploads/images')
                        ->columnSpanFull(),

                    Forms\Components\Textarea::make('title')
                        ->required()
                        ->rows(10)
                        ->label(__('admin.title'))
                        ->columnSpanFull(),

                    Forms\Components\RichEditor::make('description')
                        ->required()
                        ->label(__('admin.description'))  
                        ->columnSpanFull(),

                    Forms\Components\TagsInput::make('tags')
                        ->required()
                        ->label(__('admin.tags'))  
                        ->columnSpanFull(),
                ]),

                Section::make(__('admin.status_blog'))
                ->schema([
                    Radio::make('status')
                        ->label(__('admin.status_blog'))
                        ->options([
                            'publish' => __('admin.publish'),
                            'draft' => __('admin.draft'),
                            'schedule' => __('admin.schedule'),  
                        ])
                        ->reactive()
                        ->afterStateUpdated(fn(callable $set, $state) => 
                            $set('publish_time', $state === 'schedule' ? null : now())  
                        ),
            
                    Forms\Components\DateTimePicker::make('publish_time')  
                        ->label(__('admin.publish_at'))
                        ->nullable()
                        ->hidden(fn($get) => $get('status') !== 'schedule'),  
                    ])
            
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),

            Tables\Columns\TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),

            Tables\Columns\ImageColumn::make('image')->label(__('admin.image')),
            Tables\Columns\TextColumn::make('description')->label(__('admin.description')),
            Tables\Columns\TextColumn::make('title')->label(__('admin.title')),

       
        ])
        ->filters([])
        ->actions([
            Tables\Actions\EditAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
            ]),
        ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }
}
