<div wire:ignore>
    <textarea id="{{ $joditId }}">{!! $value !!}</textarea>
</div>

@script
    <script>
        (function() {
            const joditId = @js($joditId);
            const identifier = @js($identifier);
            const buttons = @json($buttons);
            const theme = @js($theme);
            
            // Wait for the element to be available in the DOM
            function initializeEditor() {
                const textareaElement = document.getElementById(joditId);
                
                if (!textareaElement) {
                    // If element doesn't exist yet, wait a bit and try again
                    setTimeout(initializeEditor, 50);
                    return;
                }
                
                // Check if Jodit is already initialized on this element
                if (textareaElement.jodit) {
                    return;
                }
                
                const editor = Jodit.make('#' + joditId, {
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
                    "theme": theme
                });

                textareaElement.addEventListener('change', function() {
                    @this.set('value', this.value);
                });

                window.addEventListener('update-jodit-content', (event) => {
                    if (Array.isArray(event.detail) && event.detail.length > 0) {
                        // Check if this is an array with [editorId, content]
                        if (Array.isArray(event.detail[0]) && event.detail[0].length === 2) {
                            const [targetId, newContent] = event.detail[0];

                            // Only update if the editor ID matches this instance
                            if (targetId === identifier) {
                                editor.value = newContent;
                            }
                        } else {
                            // Original behavior: update all editors (backward compatibility)
                            editor.value = event.detail[0];
                        }
                    } else {
                        console.warn('Invalid event detail format:', event.detail);
                    }
                });
            }
            
            // Initialize when DOM is ready
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', initializeEditor);
            } else {
                // Use a small delay to ensure Livewire has finished rendering
                setTimeout(initializeEditor, 0);
            }
        })();
    </script>
@endscript
