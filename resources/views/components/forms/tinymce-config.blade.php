<div>
    <script src="{{ asset('assets/js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script>
        // Definir el manejador de subida de imágenes
        const imageUploadHandler = (blobInfo) => {
            return new Promise((resolve, reject) => {
                try {
                    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;

                    if (!csrfToken) {
                        reject('No se encontró el token CSRF');
                        return;
                    }

                    const formData = new FormData();
                    formData.append('file', blobInfo.blob(), blobInfo.filename());

                    fetch('/dashboard/posts/uploads', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': csrfToken,
                                'Accept': 'application/json'
                            },
                            body: formData
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error(`HTTP error! status: ${response.status}`);
                            }
                            return response.json();
                        })
                        .then(data => {
                            if (!data || typeof data.location !== 'string') {
                                throw new Error('Formato de respuesta inválido');
                            }
                            resolve(data.location);
                        })
                        .catch(error => {
                            console.error('Error al subir imagen:', error);
                            reject(`Error al subir la imagen: ${error.message}`);
                        });

                } catch (error) {
                    console.error('Error al subir imagen:', error);
                    reject(`Error al subir la imagen: ${error.message}`);
                }
            });
        };

        // Configuración principal de TinyMCE
        tinymce.init({
            selector: 'textarea#content',
            plugins: [
                'code',
                'table',
                'advlist',
                'lists',
                'emoticons',
                'anchor',
                'link',
                'image',
                'autolink',
                'charmap',
                'preview',
                'anchor',
                'pagebreak',
                'searchreplace',
                'wordcount',
                'visualblocks',
                'visualchars',
                'insertdatetime',
                'media',
                'table',
                'emoticons',
                'help'
            ],
            toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | ' +
                'bullist numlist outdent indent | link image codehighlight | print preview media fullscreen | ' +
                'forecolor backcolor emoticons | help',
            menu: {
                favs: {
                    title: 'My Favorites',
                    items: 'code visualaid | searchreplace | emoticons'
                }
            },
            menubar: 'favs file edit view insert format tools table help',
            height: '100vh',
            language: 'es_MX',
            browser_spellcheck: true,
            directionality: 'ltr',

            // Configuración mejorada para subida de imágenes
            images_upload_handler: imageUploadHandler,
            images_file_types: 'jpeg,jpg,png,gif',
            images_upload_max_file_size: '2mb',

            // Otras configuraciones opcionales recomendadas
            relative_urls: false,
            remove_script_host: false,
            convert_urls: true,

            // Configuración de caché para mejorar el rendimiento
            cache_suffix: '?v=' + (new Date()).getTime(),

            // setup:function(editor) {
            //     editor.ui.registry.addButton('codehighlight', {
            //         text: 'Resaltar código',
            //         icon: 'sourcecode',
            //         onAction: function () {
            //             // Obtén el código seleccionado en el editor
            //             const selectedText = editor.selection.getContent({ format: 'text' });

            //             // Envía el código a tu backend para resaltarlo
            //             fetch('/highlight-code', {
            //                 method: 'POST',
            //                 headers: {
            //                     'Content-Type': 'application/json',
            //                     'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            //                 },
            //                 body: JSON.stringify({ code: selectedText, language: 'php' }) // Cambia el lenguaje según sea necesario
            //             })
            //             .then(response => response.json())
            //             .then(data => {
            //                 // Inserta el código resaltado en el editor
            //                 editor.insertContent(data.highlightedCode);
            //             });
            //         }
            //     });
            // }

            setup: function(editor) {
                editor.ui.registry.addButton('codehighlight', {
                    text: 'Resaltar código',
                    onAction: function() {
                        // Abre un modal para seleccionar el lenguaje
                        editor.windowManager.open({
                            title: 'Resaltar código',
                            body: {
                                type: 'panel',
                                items: [{
                                    type: 'selectbox', // Menú desplegable
                                    name: 'language',
                                    label: 'Selecciona el lenguaje',
                                    items: [
                                        { value: 'php', text: 'PHP' },
                                        { value: 'javascript', text: 'JavaScript' },
                                        { value: 'python', text: 'Python' },
                                        { value: 'html', text: 'HTML' },
                                        { value: 'css', text: 'CSS' },
                                        { value: 'java', text: 'Java' },
                                        { value: 'bash', text: 'Bash' },
                                        { value: 'json', text: 'JSON' },
                                        { value: 'yaml', text: 'YAML' },
                                        { value: 'sql', text: 'SQL' },
                                        { value: 'git', text: 'GIT' },
                                        // Agrega más lenguajes según sea necesario
                                    ]
                                }]
                            },
                            buttons: [{
                                    type: 'cancel',
                                    text: 'Cancelar'
                                },
                                {
                                    type: 'submit',
                                    text: 'Resaltar',
                                    primary: true
                                }
                            ],
                            onSubmit: function(api) {
                                // Obtén el lenguaje seleccionado
                                const language = api.getData().language;

                                // Obtén el código seleccionado en el editor
                                const selectedText = editor.selection.getContent({
                                    format: 'text'
                                });

                                // Envía el código y el lenguaje a tu backend para resaltarlo
                                fetch('/highlight-code', {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': document.querySelector(
                                                    'meta[name="csrf-token"]')
                                                .content
                                        },
                                        body: JSON.stringify({
                                            code: selectedText,
                                            language: language
                                        })
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        // Inserta el código resaltado en el editor
                                        editor.insertContent(data.highlightedCode);
                                    });

                                // Cierra el modal
                                api.close();
                            }
                        });
                    }
                });
            }

        });
    </script>
</div>
