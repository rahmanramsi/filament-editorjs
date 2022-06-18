<?php

namespace FilamentEditorJs;

use Filament\Facades\Filament;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentEditorJsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-editorjs')
            ->hasViews()
            ->hasAssets();
    }

    public function packageBooted()
    {
        if (class_exists(\Filament\FilamentServiceProvider::class)) {
            Filament::serving(function () {
                Filament::registerScripts($this->getScripts(), true);
                Filament::registerStyles($this->getStyles());
            });
        }
    }

    public function getScripts(): array
    {
        return [
            'filament-editorjs' => __DIR__ . '/../resources/dist/js/editor.js',
        ];
    }

    public function getStyles(): array
    {
        return [
            'filament-editorjs' => __DIR__ . '/../resources/dist/css/editor.css',
        ];
    }
}
