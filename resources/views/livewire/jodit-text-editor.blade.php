<div wire:ignore>
    <textarea id="{{ $joditId }}">{!! $value !!}</textarea>
</div>

@script
    <script>
        const editor = Jodit.make('#' + @js($joditId), {
            "autofocus": true,
            "uploader": {
                "insertImageAsBase64URI": true
            },
            "toolbarButtonSize": "large",
            "showCharsCounter": false,
            "showWordsCounter": false,
            "showXPathInStatusbar": false,
            "defaultActionOnPaste": "insert_clear_html",
            "buttons": [
                "bold",
                "italic",
                "underline",
                "strikethrough",
                "|",
                "left",
                "ul",
                "ol",
                "|",
                "font",
                "fontsize",
                "paragraph",
                "brush",
                "|",
                "link",
                "image",
                "video",
                "|",
                "undo",
                "redo"
            ]
        });
        document.getElementById(@js($joditId)).addEventListener('change', function() {
            @this.set('value', this.value);
        });
    </script>
@endscript
