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

    #[Locked]
    public string $identifier = '';

    public array $buttons = [
        'bold',
        'italic',
        'underline',
        'strikethrough',
        '|',
        'left',
        'ul',
        'ol',
        '|',
        'font',
        'fontsize',
        'paragraph',
        'brush',
        '|',
        'link',
        'image',
        'video',
        '|',
        'undo',
        'redo'
    ];

    public string $theme;

    public function mount(?string $identifier = null, array $buttons = [], ?string $theme = 'light'): void {
        $this->joditId = 'jodit-editor-' . Str::uuid()->toString();
        $this->identifier = $identifier ?: $this->joditId;

        if (!empty($buttons)) {
            $this->buttons = $buttons;
        }

        $this->theme = $theme;
    }

    public function updatedValue($value): void {
        $this->value = $value;
    }

    public function render(): View {
        return view('livewire-jodit-text-editor::livewire.jodit-text-editor');
    }
}
