$(document).ready(function () {
    $(".xzoom, .xzoom-gallery").xzoom({
        position: 'left',
    });

    var swiper7 = new Swiper('.productAttr', {
        slidesPerView: 7,
        spaceBetween: 3,
        breakpoints: {
            120: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 3,
            },
            1399: {
                slidesPerView: 4,
            },
            1400: {
                slidesPerView: 5,
            },
        },
    })

    var swiper8 = new Swiper('.similarSlider', {
        slidesPerView: 7,
        spaceBetween: 3,
        breakpoints: {
            120: {
                slidesPerView: 1,
            },
            310: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 3,
            },
            1024: {
                slidesPerView: 4,
            },
            1399: {
                slidesPerView: 5,
            },
            1400: {
                slidesPerView: 6,
            },
        }, navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        }
    })

})


document.querySelectorAll('.color-radio').forEach(radio => {
    radio.addEventListener('change', function() {
        const colorId = this.value; // ID رنگ انتخاب شده
        const productId = document.getElementById('product-id').value; // ID محصول
        const url = route('color_price');
        const addToCartLink = document.getElementById('add_to_cart');
        const div = document.getElementById('div');

        fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            body: JSON.stringify({color_id: colorId , product_id: productId })
        })
        .then(response => response.json())
        .then(data => {
            if(data.stock > 0){
                if (data.price) {
                    document.getElementById('stock').innerText =  'موجود در انبار آیتی لند.';
                    document.getElementById('selectedColor').innerText =  data.color_name;
                    document.getElementById('price').innerText =  `${data.price.toLocaleString('fa-IR')} تومان`;
                    if (data.price_discounted) {
                        document.getElementById('price_discounted').innerText = `${data.price_discounted.toLocaleString('fa-IR')} تومان`;
                    }else {
                        document.getElementById('price_discounted').innerText = 'بدون تخفیف';
                    }
    
                    div.style.display = "block";
                    const newUrl = route('add_to_cart',[ productId , colorId]);
                    addToCartLink.href = newUrl;
    
                } else {
                    console.error(data.error);
                }
            }else{
                document.getElementById('stock').innerText =  'این رنگ ناموجود است.';
                div.style.display = "none";
            }
        })
        .catch(error => console.error('Error:', error));
    });
});

$(document).ready(function() {
    $('#mainSearchInput').on('input', function() {
        let query = $(this).val();

        if (query.length > 0) {
            $.ajax({
                url: route('search'),
                method: "GET",
                data: { search: query },
                success: function(data) {
                    $('.search-results').empty(); // پاک کردن نتایج قبلی
                    $('.search-results').append('<span class="py-2 px-3 d-block fs-7">نتایج جست و جو :</span>');

                    if (data.length > 0) {
                        $.each(data, function(index, product) {
                            let productUrl = route('Product.show',product.id)
                            $('.search-results').append(
                                `<div class="search-result-item position-relative border-bottom p-3">
                                    <i class="fab fa-sistrix fw-md fs-5 gray-500 d-inline-block"></i>
                                    <div class="d-inline-block ms-2">
                                        <span class="d-inline-block fw-bold ms-1">${product.title}</span>
                                        <span class="d-inline-block fw-bold ms-1">${product.english_title}</span>
                                    </div>
                                    <a href="${productUrl}" class="stretched-link"></a>
                                </div>`
                            );
                        });
                    } else {
                        $('.search-results').append('<div class="p-3">نتیجه‌ای یافت نشد.</div>');
                    }

                    // نمایش نتایج
                    $('.search-results').show();
                }
            });
        } else {
            $('.search-results').empty(); // اگر ورودی خالی است، نتایج را پاک کنید
            $('.search-results').hide(); // پنهان کردن نتایج
        }
    });
});

function ProductQuantity(id,status) {
    $.ajax({
        url: route('cart-Quantity',[id,status]),
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success:function (re){
            if (re.is_plus) {
                $('#product_minus_' + id).load(document.URL + ' #product_minus_' + id);
                $('#cart_quantity_' + id).load(document.URL + ' #cart_quantity_' + id);
                $('#cart_attribute').load(document.URL + ' #cart_attribute');
                let timerInterval;
                Swal.fire({
                    title: "درحال انجام عملیات",
                    html: "لطفا صبور باشید عملیات در حال انجام است.",
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading();
                        const timer = Swal.getPopup().querySelector("b");
                        timerInterval = setInterval(() => {
                            // timer.textContent = `${Swal.getTimerLeft()}`;
                        }, 100);
                    },
                    willClose: () => {
                        clearInterval(timerInterval);
                    }
                }).then((result) => {
                    if (result.dismiss === Swal.DismissReason.timer) {
                    }
                });
            }
            if (re.is_remove){
                $('#cart_item_'+id).remove();
                document.location.reload();
                Swal.fire({
                    title: "موفق!",
                    text: "محصول از سبد حذف شد!",
                    icon: "success",
                    timer: 2000,
                });
            }
            if (re.is_minus){ 
                $('#product_minus_' + id).load(document.URL + ' #product_minus_' + id);
                $('#cart_quantity_' + id).load(document.URL + ' #cart_quantity_' + id);
                $('#cart_attribute').load(document.URL + ' #cart_attribute'); 
                let timerInterval;
                Swal.fire({
                    title: "درحال انجام عملیات",
                    html: "لطفا صبور باشید عملیات در حال انجام است.",
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading();
                        const timer = Swal.getPopup().querySelector("b");
                        timerInterval = setInterval(() => {
                            // timer.textContent = `${Swal.getTimerLeft()}`;
                        }, 100);
                    },
                    willClose: () => {
                        clearInterval(timerInterval);
                    }
                }).then((result) => {
                    if (result.dismiss === Swal.DismissReason.timer) {
                    }
                });
            }
            if (re.status===400) {
                Swal.fire({
                    title: "ناموفق!",
                    text: "تعداد سفارش از تعداد محصول بیشتر است!",
                    icon: "warning",
                });
            }
        },
        error: function (re){
            Swal.fire({
                title: "خطا!",
                text: "خطای داخلی رخ داده است",
                icon: "warning",
            });
        }
    })
}

$(document).ready(function() {
    $('#province').change(function() {
        const selected_option = $(this).find('option:selected').val()

        $.ajax({
            url: route('get-cities'),
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                province: selected_option,
            },
            success: function (response) {
                const city_select = $(document).find('select[name=city]')
                city_select.html("<option value='0'>-----</option>")
                
                response.forEach(function (item) {
                    city_select.append(`<option value='${item.id}'>${item.name}</option>`)
                })
                // city_select.niceSelect('update');
            },
            error: function (error) {
                console.log(error)
            },
        });
    })
})

$(document).ready(function() {
    $('#editprovince').change(function() {
        const selected_option = $(this).find('option:selected').val()

        $.ajax({
            url: route('get-cities'),
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                province: selected_option,
            },
            success: function (response) {
                const city_select = $(document).find('select[name=city]')
                city_select.html("<option value='0'>-----</option>")
                
                response.forEach(function (item) {
                    city_select.append(`<option value='${item.id}'>${item.name}</option>`)
                })
                // city_select.niceSelect('update');
            },
            error: function (error) {
                console.log(error)
            },
        });
    })
})






