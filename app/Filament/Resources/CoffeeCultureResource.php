<?php
namespace App\Filament\Resources;

use App\Filament\Resources\CoffeeCultureResource\Pages;
use App\Models\CoffeeCulture;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CoffeeCultureResource extends Resource
{
    protected static ?string $model = CoffeeCulture::class;

    protected static ?string $navigationIcon = 'heroicon-o-cup';

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
                Forms\Components\Repeater::make('images')
                    ->schema([
                        Forms\Components\TextInput::make('image')
                            ->label('Image URL')
                            ->required()
                            ->url()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('alt')
                            ->label('Alt Text')
                            ->maxLength(255),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Repeater::make('items')
                    ->schema([
                        Forms\Components\TextInput::make('icon')
                            ->label('Icon')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('link')
                            ->label('Link')
                            ->required()
                            ->url()
                            ->maxLength(255),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('cta_button_link')
                    ->label('CTA Button Link')
                    ->url()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('main_title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('title')
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
            'index' => Pages\ListCoffeeCultures::route('/'),
            'create' => Pages\CreateCoffeeCulture::route('/create'),
            'edit' => Pages\EditCoffeeCulture::route('/{record}/edit'),
        ];
    }
}
