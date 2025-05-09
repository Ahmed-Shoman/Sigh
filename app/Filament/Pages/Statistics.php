<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Statistics extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';
    protected static bool $shouldRegisterNavigation = false;

    protected static string $view = 'filament.pages.statistics';

    public function getHeading(): string
    {
        return __('admin.statistics');
    }

    public static function getNavigationGroup(): string
    {
        return __('admin.statistics');
    }

    public static function getNavigationLabel(): string
    {
        return __('admin.statistics');
    }
}
