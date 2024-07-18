<h1 align="center">Livewire Jodit Text Editor (WYSIWYG)</h1>

<p align="center">
    <a href="https://github.com/mantix/livewire-jodit-text-editor/actions"><img src="https://github.com/mantix/livewire-jodit-text-editor/actions/workflows/tests.yml/badge.svg" alt="Build Status"></a>
    <a href="https://packagist.org/packages/mantix/livewire-jodit-text-editor"><img src="https://img.shields.io/packagist/dt/mantix/livewire-jodit-text-editor" alt="Total Downloads"></a>
    <a href="https://packagist.org/packages/mantix/livewire-jodit-text-editor"><img src="https://img.shields.io/packagist/v/mantix/livewire-jodit-text-editor" alt="Latest Stable Version"></a>
    <a href="https://packagist.org/packages/mantix/livewire-jodit-text-editor"><img src="https://img.shields.io/packagist/l/mantix/livewire-jodit-text-editor" alt="License"></a>
</p>

## ✨ Introduction
A powerful Livewire rich text editor (WYSIWYG) component that build top of Jodit Editor.

> To use this package, you must have [Livewire 3](https://livewire.laravel.com/) installed.

## 📦 Installation
Seconds install this package via Composer:
```bash
composer require mantix/livewire-jodit-text-editor
```

Include the Jodit Editor theme and the library in your layout or specific view.
```html
<!-- Include Jodit CSS Styling -->
<link rel="stylesheet" href="//unpkg.com/jodit@4.1.16/es2021/jodit.min.css">

<!-- Include the Jodit JS Library -->
<script src="//unpkg.com/jodit@4.1.16/es2021/jodit.min.js"></script>
```

Or you can use NPM to install the Jodit Editor directly in your project:
```bash
npm install jodit
```

Import it in your app.js like:
```javascript
// Jodit Editor
import 'jodit/esm/plugins/resizer/resizer'; // Resizer plugin is used when inserting images
import 'jodit/esm/plugins/video/video'; // Video plugin is used to insert videos
// Feel free to add extra plugins here...
import { Jodit } from 'jodit';
window.Jodit = Jodit;
```

And in your app.scss like:
```scss
// Jodit Editor
@import 'jodit/es2021/jodit';
```

For additional information, kindly refer to the [Jodit Editor documentation](https://xdsoft.net/jodit/docs/).

## 🎬 Showcase
Now you can use the text editor component as you like.
```html
<livewire:jodit-text-editor wire:model.live="content" />
```

Or add the "buttons" attribute to define buttons dynamically.
```html
<livewire:jodit-text-editor wire:model.live="content" :buttons="['bold', 'italic', 'underline', 'strikeThrough', '|', 'left', 'center', 'right', '|', 'link', 'image']" />
```

## 🎨 Tailor UI
The text editor component is entirely customizable. Just publish the view file and make it your own.
```bash
php artisan vendor:publish --tag=livewire-jodit-text-editor-views
```

## 🔄 Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## 🤝 Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## ❤️ Support Me

Is this plugin helpful to you? Let me know by connecting <a href='https://linkedin.com/in/pieternaber' target='_blank'>on LinkedIn</a> or <a href='https://x.com/pieternaber' target='_blank'>on X</a>.
