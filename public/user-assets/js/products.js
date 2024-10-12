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
            if (data.price) {
                document.getElementById('selectedColor').innerText =  data.color_name;
                document.getElementById('price').innerText =  `${data.price.toLocaleString('fa-IR')} تومان`;
                if (data.price_discounted) {
                    document.getElementById('price_discounted').innerText = `${data.price_discounted.toLocaleString('fa-IR')} تومان`;
                }else {
                    document.getElementById('price_discounted').innerText = 'بدون تخفیف';
                }
            } else {
                console.error(data.error);
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








