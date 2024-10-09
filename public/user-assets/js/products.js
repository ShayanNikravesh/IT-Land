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


