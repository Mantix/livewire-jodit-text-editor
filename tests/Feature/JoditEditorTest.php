<?php

use Mantix\LivewireJoditTextEditor\Http\Livewire\JoditTextEditor;

it('renders successfully', function () {
    Livewire\Livewire::test(JoditTextEditor::class)
        ->assertOk();
});

it('display correct editor value', function () {
    Livewire\Livewire::test(JoditTextEditor::class)
        ->set('value', 'foo')
        ->assertSet('value', 'foo');
});
