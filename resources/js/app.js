import './bootstrap';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

// Selecciona el textarea donde deseas usar CKEditor
ClassicEditor
    .create(document.querySelector('#content'),)
    .then(editor => {
        console.log(editor);
    })
    .catch(error => {
        console.error(error);
    });
