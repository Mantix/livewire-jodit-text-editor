<div wire:ignore>
    <textarea id="{{ $joditId }}">{!! $value !!}</textarea>
</div>

@script
    <script>
        // Fix from #13 Pull request:Remove cached editors due to wire:ignore and wire:navigation
        const textAreaElement = document.getElementById(@js($joditId));
        textAreaElement.parentNode.querySelectorAll('.jodit').forEach(el => el.remove());
        
        const buttons = @json($buttons);
        const customOptions = @json($options); 

        // New support custom options - Define base defaults
        const baseOptions = {
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
            "buttons": buttons,
            "theme": "{{ $theme }}"
        };

        // Merge defaults with custom options (customOptions will override baseOptions)
        const finalOptions = { ...baseOptions, ...customOptions };

        const editor = Jodit.make('#' + @js($joditId), finalOptions);

        textAreaElement.addEventListener('change', function() {
            @this.set('value', this.value);
        });

        window.addEventListener('update-jodit-content', (event) => {
            if (Array.isArray(event.detail) && event.detail.length > 0) {
                if (Array.isArray(event.detail[0]) && event.detail[0].length === 2) {
                    const [targetId, newContent] = event.detail[0];
                    if (targetId === @js($identifier)) {
                        editor.value = newContent;
                    }
                } else {
                    editor.value = event.detail[0];
                }
            } else {
                console.warn('Invalid event detail format:', event.detail);
            }
        });
    </script>
@endscript