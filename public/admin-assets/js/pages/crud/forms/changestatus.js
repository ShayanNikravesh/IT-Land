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

function ChangeStatusBrand(id){

    $.ajax({
        url: route('change_Status_brand',id),
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

function ChangeStatusManager(id){

    $.ajax({
        url: route('change_Status_manager',id),
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

function ChangeLevelManager(id){

    $.ajax({
        url: route('change_Level_manager',id),
        method: 'post',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            $('#1' + id).load(document.URL + ' #1' + id)
            $('#div2' + id).load(document.URL + ' #div2' + id)
        },
        error: function (error) {
            console.log(error)
        },
    });

}

function ChangeStatusComment(id){

    $.ajax({
        url: route('change_Status_comment',id),
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