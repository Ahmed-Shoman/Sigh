<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Resources\Concerns\Translatable;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;
    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';
    use Translatable;

    public static function getNavigationLabel(): string
    {
        return __('admin.products');
    }

    public static function getModelLabel(): string
    {
        return __('admin.products');
    }

    public static function getPluralModelLabel(): string
    {
        return __('admin.products');
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make(__('admin.product_details'))
                    ->schema([

                        Forms\Components\FileUpload::make('image')
                            ->label(__('admin.image'))
                            ->directory('uploads/images')
                            ->columnSpanFull(),

                        Forms\Components\Textarea::make('name')
                            ->label(__('admin.product_name'))
                            ->columnSpanFull(),

                        Forms\Components\Textarea::make('description')
                            ->label(__('admin.product_description'))
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('price')
                            ->label(__('admin.product_price'))
                            ->required()
                            ->numeric(),

                        Forms\Components\TagsInput::make('tages')
                            ->label(__('admin.product_tags'))
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('rate')
                            ->label(__('admin.product_rate'))
                            ->required()
                            ->maxLength(255),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('admin.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label(__('admin.updated_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                    
                    Tables\Columns\ImageColumn::make('image')
                    ->label(__('admin.image'))
                    ->searchable(),


                 Tables\Columns\TextColumn::make('name')
                    ->label(__('admin.name'))
                    ->searchable(),


                Tables\Columns\TextColumn::make('price')
                    ->label(__('admin.product_price'))
                    ->sortable(),

                Tables\Columns\TextColumn::make('rate')
                    ->label(__('admin.product_rate'))
                    ->searchable(),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
