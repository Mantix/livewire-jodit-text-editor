<div wire:ignore>
    <textarea id="{{ $joditId }}">{!! $value !!}</div>
</div>

@script
    <script>
        const editor = Jodit.make('#' + @js($joditId));
        document.getElementById(@js($joditId)).addEventListener('change', function() {
            @this.set('value', this.value);
        });
    </script>
@endscript
