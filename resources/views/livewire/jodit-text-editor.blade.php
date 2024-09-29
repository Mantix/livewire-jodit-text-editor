<div wire:ignore>
    <textarea id="{{ $joditId }}">{!! $value !!}</textarea>
</div>

@script
    <script>
        const buttons = @json($buttons);

        const editor = Jodit.make('#' + @js($joditId), {
            "autofocus": true,
            "toolbarSticky": true,
            "uploader": {
                "insertImageAsBase64URI": true
            },
            "toolbarButtonSize": "large",
            "showCharsCounter": false,
            "showWordsCounter": false,
            "showXPathInStatusbar": false,
            "defaultActionOnPaste": "insert_clear_html",
            "buttons": buttons
        });
        document.getElementById(@js($joditId)).addEventListener('change', function() {
            @this.set('value', this.value);
        });

        window.addEventListener('update-jodit-content', (event) => {
            editor.value = event.detail[0];
        });
    </script>
@endscript
