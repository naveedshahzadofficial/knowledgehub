<textarea {{ isset($attributes)?$attributes:'' }} id="{{ $id }}"  type="text" class="form-control" placeholder="{{ isset($placeholder)?$placeholder:'' }}">
</textarea>

@push('post-scripts')
    <script>
        $(function (){
            ClassicEditor.create(document.querySelector('#{{ $id }}'),{
                link: {
                    decorators: {
                        addTargetToExternalLinks: {
                            mode: 'automatic',
                            callback: url => /^(https?:)?\/\//.test( url ),
                            attributes: {
                                target: '_blank',
                                rel: 'noopener noreferrer'
                            }
                        }
                    }
                }
            })
                .then(editor => {
                    editors['#{{ $id }}'] = editor;
                   // editor.ui.view.editable.element.style.height = '10px';
                    editor.model.document.on('change:data', () => {
                   // setTimeout(function () { }, 5000);
                    @this.set('{{ $setFieldName }}', editor.getData());
                    })
                })
                .catch(error => {
                    console.error(error);
                });
        });
    </script>

@endpush
