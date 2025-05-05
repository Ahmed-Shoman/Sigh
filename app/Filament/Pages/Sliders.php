<?php

namespace App\Filament\Pages;

use App\Models\Slider;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Pages\Page;
use Filament\Forms;
use Filament\Notifications\Notification;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;

class Sliders extends Page
{
    use InteractsWithActions;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static string $view = 'filament.pages.sliders';
    protected static bool $shouldRegisterNavigation = false;

    public ?string $image_slider = '';
    public ?string $url_vido = '';
    public ?string $slider_title = '';  
    public ?string $sub_title = '';
    public ?string $title_image = '';
    public ?string $sub_title_image = '';
    public ?string $images = '';

    public function getHeading(): string
    {
        return __('admin.sliders');
    }

    public static function getNavigationGroup(): string
    {
        return __('admin.content_management');
    }

    public static function getNavigationLabel(): string
    {
        return __('admin.sliders');
    }

    public function mount(): void
    {
        $slider = Slider::firstOrCreate([], [
            'image_slider' => '',
            'url_vido' => '',
            'slider_title' => '',  
            'sub_title' => '',
            'title_image' => '',
            'sub_title_image' => '',
            'images' => '',
        ]);

        $this->fill($slider->toArray());
    }

    public function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Section::make(__('admin.sliders'))
                ->schema([
                    FileUpload::make('image_slider')
                        ->directory('uploads/images')
                        ->label(__('admin.image_slider'))
                        ->image(),

                    TextInput::make('url_vido')
                        ->label(__('admin.url_vido'))
                        ->url(),

                    Textarea::make('slider_title') 
                        ->label(__('admin.title')),

                    Textarea::make('sub_title')
                        ->label(__('admin.sub_title')),

                    Textarea::make('title_image')
                        ->label(__('admin.title_image')),

                    Textarea::make('sub_title_image')
                        ->label(__('admin.sub_title_image')),

                    FileUpload::make('images')
                        ->directory('uploads/images') 
                        ->label(__('admin.images'))
                        ->multiple()
                        ->image(),
                ])
                ->columns(2),
        ]);
    }

    public function submit(): void
    {
        $data = $this->form->getState();
        if (!isset($data['slider_title']) || empty($data['slider_title'])) {
            $data['slider_title'] = 'Default Title';
        }
        Slider::updateOrCreate([], $data);

        Notification::make()
            ->title(__('admin.updated_successfully'))
            ->success()
            ->send();
    }
}
