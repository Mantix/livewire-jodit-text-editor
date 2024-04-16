<?php

declare(strict_types=1);

namespace Mantix\LivewireJoditTextEditor;

use Mantix\LivewireJoditTextEditor\Http\Livewire\JoditTextEditor;
use Livewire\Livewire;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LivewireJoditTextEditorServiceProvider extends PackageServiceProvider {
    public function configurePackage(Package $package): void {
        $package
            ->name('livewire-jodit-text-editor')
            ->hasViews();
    }

    public function bootingPackage(): void {
        $this->registerLivewireComponent();
    }

    public function registerLivewireComponent(): void {
        Livewire::component('jodit-text-editor', JoditTextEditor::class);
    }
}
