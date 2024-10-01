function ChangeStatusProduct(id,status){

    $.ajax({
        url: route('change_Status_product',[id,status]),
        method: 'post',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            $('#' + id).load(document.URL + ' #' + id)
            $('#div' + id).load(document.URL + ' #div' + id)
        },
        error: function (error) {
            console.log(error)
        },
    });

}

function ChangeStatusCategory(id){

    $.ajax({
        url: route('change_Status_category',id),
        method: 'post',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            $('#' + id).load(document.URL + ' #' + id)
            $('#div' + id).load(document.URL + ' #div' + id)
        },
        error: function (error) {
            console.log(error)
        },
    });

}

function ChangeStatusArticle(id){

    $.ajax({
        url: route('change_Status_article',id),
        method: 'post',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            $('#' + id).load(document.URL + ' #' + id)
            $('#div' + id).load(document.URL + ' #div' + id)
        },
        error: function (error) {
            console.log(error)
        },
    });

}

// function AddManager(){

//     let first_name = $('input[name=first_name]').val();
//     let last_name = $('input[name=last_name]').val();
//     let mobile = $('input[name=mobile]').val();
//     let email = $('input[name=email]').val();
//     let password = $('input[name=password]').val();
//     let repassword = $('input[name=repassword]').val();
//     let gender = $('select[name=gender]').val();
//     let level = $('select[name=level]').val();

//     $.ajax({
//         url: 'requests/AddManagerRequest.php',
//         method: 'post',
//         dataType: 'json',
//         data: {
//             first_name,
//             last_name,
//             mobile,
//             email,
//             password,
//             repassword,
//             gender,
//             level,
//             action: 'create_manager'
//         },
//         success: function (response) {
//             if (response.status === 401) {
//                 Swal.fire({
//                     title: response.title,
//                     html: response.messages,
//                     icon: 'error',
//                     confirmButtonText: 'متوجه شدم!',
//                 })
//             }else {
//                 Swal.fire({
//                     title: response.title,
//                     text: response.text,
//                     icon: response.type,
//                     confirmButtonText: 'متوجه شدم!',
//                 })
//                 document.getElementById("form_insert_manager").reset();
//             }
//         },
//         error: function (error) {
//             console.log(error)
//         },
//     });

// }