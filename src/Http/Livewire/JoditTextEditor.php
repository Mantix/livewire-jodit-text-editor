<?php

declare(strict_types=1);

namespace Mantix\LivewireJoditTextEditor\Http\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Modelable;
use Livewire\Component;

class JoditTextEditor extends Component {
    #[Modelable]
    public string | null $value = '';

    #[Locked]
    public string $joditId;

    public string $theme;

    public function mount(string $theme = 'snow'): void {
        $this->theme = $theme;
        $this->joditId = 'ql-editor-' . Str::uuid()->toString();
    }

    public function updatedValue($value): void {
        $this->value = $value;
    }

    public function render(): View {
        return view('livewire-jodit-text-editor::livewire.jodit-text-editor');
    }
}
