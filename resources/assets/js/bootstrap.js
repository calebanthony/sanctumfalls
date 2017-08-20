/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/**
 * Look for the guide edit element and make it a WYSIWYG editor
 */

var editor_config = {
    path_absolute: "{{ URL::to('/') }}/",
    theme: 'inlite',
    inline: true,
    selector: "#guideContents",
    plugins: 'link advlist lists paste contextmenu textpattern autolink',
    insert_toolbar: '',
    selection_toolbar: 'bold italic | quicklink h2 h3 | alignleft aligncenter alignright alignjustify | bullist numlist',
    relative_urls: false,
    file_browser_callback: function(field_name, url, type, win) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementByTagName('body')[0].clientWidth;
        var y = window.innerHeight|| document.documentElement.clientHeight|| document.grtElementByTagName('body')[0].clientHeight;
        var cmsURL = editor_config.path_absolute+'laravel-filemanaget?field_name'+field_name;
        if (type = 'image') {
            cmsURL = cmsURL+'&type=Images';
        } else {
            cmsUrl = cmsURL+'&type=Files';
        }

        tinyMCE.activeEditor.windowManager.open({
            file: cmsURL,
            title: 'Filemanager',
            width: x * 0.8,
            height: y * 0.8,
            resizeble: 'yes',
            close_previous: 'no'
        });
    }
};

tinymce.init(editor_config);
