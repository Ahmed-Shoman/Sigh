<?php
namespace App\Filament\Resources;

use App\Filament\Resources\DistinctiveProductResource\Pages;
use App\Models\DistinctiveProduct;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class DistinctiveProductResource extends Resource
{
    protected static ?string $model = DistinctiveProduct::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('main_title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Repeater::make('products')
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->label('Image')
                            ->required(),
                        Forms\Components\TextInput::make('product_title')
                            ->label('Product Title')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('product_description')
                            ->label('Product Description')
                            ->required()
                            ->maxLength(1000),
                        Forms\Components\TextInput::make('price')
                            ->label('Price')
                            ->required()
                            ->numeric()
                            ->prefix('$')
                            ->minValue(0)
                            ->maxValue(999999.99),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('main_title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListDistinctiveProducts::route('/'),
            'create' => Pages\CreateDistinctiveProduct::route('/create'),
            'edit' => Pages\EditDistinctiveProduct::route('/{record}/edit'),
        ];
    }
}