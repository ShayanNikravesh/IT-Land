
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
