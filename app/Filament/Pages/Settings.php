<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms;
use Filament\Notifications\Notification;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\NumericInput;
use App\Models\Setting;
use Filament\Actions\Concerns\InteractsWithActions;

class Settings extends Page
{
    use InteractsWithActions;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static string $view = 'filament.pages.settings';

     public ?string $meta_title = null;
    public ?string $meta_description = null;
    public ?string $name_brand = null;
    public ?string $mobile = null;
    public ?string $whatsapp = null;
    public ?string $location = null;
    public ?string $email = null;
    public ?string $time_work = null;
    public ?string $privacy = null;
    public ?string $terms_and_condition = null;
    public ?float $price_delivery = 0.0;
    public ?float $price_fast_delivery = 0.0;
    

    public function getHeading(): string
    {
        return __('admin.settings');
    }

    public static function getNavigationGroup(): string
    {
        return __('admin.settings');
    }

    public static function getNavigationLabel(): string
    {
        return __('admin.settings');
    }
    public function mount(): void
    {
        $settings = Setting::firstOrCreate([], [
            
            'meta_title' => '',
            'meta_description' => '',
            'name_brand' => '',
            'mobile' => '',
            'whatsapp' => '',
            'location' => '',
            'email' => '',
            'time_work' => '',
            'privacy' => '',
            'terms_and_condition' => '',
            'price_delivery' => 0.0,
            'price_fast_delivery' => 0.0,
        ]);
    
        $settingsArray = $settings->toArray();
        
        // Ensure 'logo' is always a string
        $this->logo = is_array($settingsArray['logo']) ? ($settingsArray['logo'][0] ?? '') : (string) $settingsArray['logo'];
    
        $this->fill($settingsArray);
    }
    
    
    

    public function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Section::make(__('admin.settings'))
                ->schema([
                 
                    TextInput::make('meta_title')
                        ->label(__('admin.meta_title'))
                        ->maxLength(255),

                    Textarea::make('meta_description')
                        ->label(__('admin.meta_description')),

                    TextInput::make('name_brand')
                        ->label(__('admin.name_brand'))
                        ->maxLength(255),

                    TextInput::make('mobile')
                        ->label(__('admin.mobile'))
                        ->maxLength(20),

                    TextInput::make('whatsapp')
                        ->label(__('admin.whatsapp'))
                        ->maxLength(20),

                    Textarea::make('location')
                        ->label(__('admin.location')),

                    TextInput::make('email')
                        ->label(__('admin.email'))
                        ->email(),

                    TextInput::make('time_work')
                        ->label(__('admin.time_work'))
                        ->maxLength(255),

                    Textarea::make('privacy')
                        ->label(__('admin.privacy')),

                    Textarea::make('terms_and_condition')
                        ->label(__('admin.terms_and_condition')),

                    TextInput::make('price_delivery')
                        ->label(__('admin.price_delivery')),

                    TextInput::make('price_fast_delivery')
                        ->label(__('admin.price_fast_delivery')),
                ])
                ->columns(2),
        ]);
    }

    public function submit(): void
    {
        $data = $this->form->getState();
        
        Setting::updateOrCreate([], $data);

        Notification::make()
            ->title(__('تم التحديث بنجاح'))
            ->success()
            ->send();
    }
}
