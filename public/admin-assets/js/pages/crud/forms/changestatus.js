function ChangeStatus($id,$status){

    $.ajax({
        url: route('changeStatus'),
        method: 'post',
        dataType: 'json',
        data: {
            product_id: $id,
            status: $status,
        },
        success: function (response) {
            if (response.status === 200) {
                document.getElementById('photo'+$id).remove();
                Swal.fire({
                    title: response.title,
                    text: response.text,
                    icon: response.type,
                    confirmButtonText: 'متوجه شدم!',
                })
            } else {
                Swal.fire({
                    title: response.title,
                    html: response.messages,
                    icon: response.type,
                    confirmButtonText: 'متوجه شدم!',
                })
            }
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