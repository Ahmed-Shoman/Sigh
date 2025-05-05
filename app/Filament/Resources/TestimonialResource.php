<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimonialResource\Pages;
use App\Filament\Resources\TestimonialResource\RelationManagers;
use App\Models\Testimonial;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TestimonialResource extends Resource
{
    protected static ?string $model = Testimonial::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    public static function getNavigationLabel(): string
    {
        return __('admin.testmonial');
    }

    public static function getModelLabel(): string
    {
        return __('admin.testmonial');
    }

    public static function getPluralModelLabel(): string
    {
        return __('admin.testmonial');
    }
    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Section::make(__('admin.testmonial'))
                ->schema([
                Forms\Components\FileUpload::make('image')
                    ->required()
                    ->label(__('admin.image_testmonial'))
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label(__('admin.name'))
                    ->maxLength(255),
                Forms\Components\TextInput::make('job_title')
                    ->required()
                    ->label(__('admin.job_title'))
                    ->maxLength(255),
                Forms\Components\TextInput::make('rate')
                    ->required()
                    ->label(__('admin.rate'))
                    ->maxLength(255),
                Forms\Components\Textarea::make('comment')
                    ->required()
                    ->label(__('admin.comment'))
                    ->columnSpanFull(),
            ])->columns(2)
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->label(__('admin.created_at'))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->label(__('admin.updated_at'))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->label(__('admin.name')),

                Tables\Columns\TextColumn::make('job_title')
                    ->searchable()
                    ->label(__('admin.job_title')),
                Tables\Columns\TextColumn::make('rate')
                    ->searchable()
                    ->label(__('admin.rate')),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->button(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTestimonials::route('/'),
            'create' => Pages\CreateTestimonial::route('/create'),
            'edit' => Pages\EditTestimonial::route('/{record}/edit'),
        ];
    }
}
