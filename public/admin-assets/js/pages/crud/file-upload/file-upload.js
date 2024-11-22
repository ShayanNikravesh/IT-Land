
$('div#upload_banner').dropzone({
    url: route('banner.store'),
    paramName: "photo_banner",
    maxFiles: 5,
    maxFilesize: 1, // MB
    addRemoveLinks: true,
    acceptedFiles: "image/*",
    params: {
        banner_id: $('#input_banner_id').val(),
            _token: $('meta[name="csrf-token"]').attr('content') // اضافه کردن CSRF token
        },        
    accept: function(file, done) {
        done();
    },
    error: function (file, res) {
        let response;
        try {
            response = JSON.parse(res);
        } catch (e) {
            response = res;
        }
        if (file.previewElement) {
            file.previewElement.classList.add("dz-error");
            if (typeof response !== "string" && response.error) {
                response = message.error;
            } else if (typeof response !== "string" && response.message) {
                response = response.message;
            }
            for (let node of file.previewElement.querySelectorAll(
                "[data-dz-errormessage]"
            )) {
                node.textContent = response;
            }
        }
    },
});

$('div#upload_product_photo').dropzone({
    url: route('photo.store'),
    paramName: "product_photo",
    maxFiles: 5,
    maxFilesize: 1, // MB
    addRemoveLinks: true,
    acceptedFiles: "image/*",
    params: {
        product_id: $('#input_product_id').val(),
        _token: $('meta[name="csrf-token"]').attr('content') // اضافه کردن CSRF token
    },        
    accept: function(file, done) {
        // var product_id = $('#input_product_id').val(); // مقداردهی product_id
        // $('#' + product_id).load(document.URL + ' #' + product_id);
        done();
    },
    error: function (file, res) {
        let response;
        try {
            response = JSON.parse(res);
        } catch (e) {
            response = res;
        }
        if (file.previewElement) {
            file.previewElement.classList.add("dz-error");
            if (typeof response !== "string" && response.error) {
                response = message.error;
            } else if (typeof response !== "string" && response.message) {
                response = response.message;
            }
            for (let node of file.previewElement.querySelectorAll(
                "[data-dz-errormessage]"
            )) {
                node.textContent = response;
            }
        }
    },
});

$('div#upload_article_photo').dropzone({
    url: route('store_article_photo'),
    paramName: "article_photo",
    maxFiles: 1,
    maxFilesize: 1, // MB
    addRemoveLinks: true,
    acceptedFiles: "image/*",
    params: {
        article_id: $('#input_article_id').val(),
            _token: $('meta[name="csrf-token"]').attr('content') // اضافه کردن CSRF token
    },        
    accept: function(file, done) {
        done();
    },
    error: function (file, res) {
        let response;
        try {
            response = JSON.parse(res);
        } catch (e) {
            response = res;
        }
        if (file.previewElement) {
            file.previewElement.classList.add("dz-error");
            if (typeof response !== "string" && response.error) {
                response = message.error;
            } else if (typeof response !== "string" && response.message) {
                response = response.message;
            }
            for (let node of file.previewElement.querySelectorAll(
                "[data-dz-errormessage]"
            )) {
                node.textContent = response;
            }
        }
    },
});

$('div#upload_info_photo').dropzone({
    url: route('store_info_photo'),
    paramName: "info_photo",
    maxFiles: 1,
    maxFilesize: 1, // MB
    addRemoveLinks: true,
    acceptedFiles: "image/*",
    params: {
        info_id: $('#input_info_id').val(),
            _token: $('meta[name="csrf-token"]').attr('content') // اضافه کردن CSRF token
    },        
    accept: function(file, done) {
        done();
    },
    error: function (file, res) {
        let response;
        try {
            response = JSON.parse(res);
        } catch (e) {
            response = res;
        }
        if (file.previewElement) {
            file.previewElement.classList.add("dz-error");
            if (typeof response !== "string" && response.error) {
                response = message.error;
            } else if (typeof response !== "string" && response.message) {
                response = response.message;
            }
            for (let node of file.previewElement.querySelectorAll(
                "[data-dz-errormessage]"
            )) {
                node.textContent = response;
            }
        }
    },
});