@extends('user.layouts.master')

@section('content')

<!--Main:start-->
<main class="mt-xx-large">

    <!--FAQ Section:start-->
    <section class="faq">
        <!--Faq Header:start-->
        <div class="faq-header py-5">
            <div class="faq-header-content text-center">
                <div class="question-icon border-radius-circle d-inline-block">
                    <i class="fa fa-question text-info"></i>
                </div>
                <p class="fs-5 fw-bold">به صفحه راهنما خوش آمدید.</p>
            </div>
        </div>
        <!--Faq Header:end-->

        <!--Faq Content:start-->
        <div class="faq-content container mt-5">
            <div class="accordion accordion-flush" id="faqAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne">
                            چطور می توانم وارد سایت بشوم ؟
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse"
                         data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <p>
                                <span class="fw-bold">
                                    1. انتخاب گزینه ورود :
                                </span>
                                <br>
                                    در صفحه اصلی سایت، گزینه "ورود" یا "ثبت‌نام" را پیدا کرده و روی آن کلیک کنید.
                                <br>

                                <span class="fw-bold">
                                    2. وارد کردن اطلاعات کاربری :
                                </span>
                                <br>
                                    در صفحه ورود، معمولاً از شما خواسته می‌شود که شماره تلفن همراه خود را وارد کنید. این اطلاعات به عنوان شناسه کاربری شما عمل می‌کند.                                
                                <br>

                                <span class="fw-bold">
                                    3. درخواست کد یکبار مصرف :
                                </span>
                                <br>
                                    پس از وارد کردن اطلاعات کاربری، روی دکمه "ورود" کلیک کنید تا کد یکبار مصرف برای شما ارسال شود.                               
                                <br>

                                <span class="fw-bold">
                                    4. دریافت کد یکبار مصرف :
                                </span>
                                <br>
                                    پس از درخواست کد، یک پیامک حاوی کد یکبار مصرف به شماره تلفن شما ارسال می‌شود. (این کد معمولاً شامل چند عدد است و به مدت محدودی معتبر است.)                                
                                <br>

                                <span class="fw-bold">
                                    5. وارد کردن کد یکبار مصرف :
                                </span>
                                <br>
                                    کد دریافت‌ شده را در قسمت مربوطه وارد کنید و روی دکمه "ورود" کلیک کنید.                                
                                <br>

                                <span class="fw-bold">
                                    6. تأیید و ورود به حساب کاربری :
                                </span>
                                <br>
                                    اگر کد صحیح باشد، شما به حساب کاربری خود وارد خواهید شد. (اگر حساب کاربری نداشته باشید ، ایجاد خواهد شد.)                                
                                <br>

                                <span class="fw-bold">
                                    تذکر :
                                </span>
                                <br>
                                    اگر کد یکبار مصرف را دریافت نکردید یا کد اشتباه بود ، معمولاً گزینه‌ای برای ارسال مجدد کد پس از مدت زمانی وجود دارد.
                                <br>
                                    همچنین، مطمئن شوید که شماره تلفن شما صحیح است و در دسترس است.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo">
                            چطور می توانم از سایت خرید کنم ؟
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <p>
                                <span class="fw-bold">
                                    1. جستجوی محصول :
                                </span>
                                <br>
                                    از نوار جستجو یا دسته‌بندی‌ها و بنردهای موجود در سایت برای پیدا کردن محصول مورد نظر خود استفاده کنید.
                                <br>
                                
                                <span class="fw-bold">
                                    2. بررسی جزئیات محصول :
                                </span>
                                <br>
                                    پس از پیدا کردن محصول، توضیحات، مشخصات فنی، قیمت و نظرات خریداران قبلی را به دقت مطالعه کنید.
                                <br>

                                <span class="fw-bold">
                                    3. اضافه کردن به سبد خرید :
                                </span>
                                <br>
                                    اگر از محصول راضی بودید، آن را به سبد خرید خود اضافه کنید. (ممکن است بخواهید چند محصول را در سبد خرید خود داشته باشید.)                                
                                <br>
                                
                                <span class="fw-bold">
                                    4. بررسی سبد خرید :
                                </span>
                                <br>
                                    پس از انتخاب محصولات، سبد خرید خود را بررسی کنید تا مطمئن شوید همه چیز درست است و هیچ محصولی را فراموش نکرده‌اید.
                                <br>

                                <span class="fw-bold">
                                    5. ورود به حساب کاربری یا ثبت‌ نام :
                                </span>
                                <br>
                                    اگر قبلاً حساب کاربری دارید، وارد شوید در غیر این صورت، باید یک حساب کاربری جدید ایجاد کنید.
                                <br>

                                <span class="fw-bold">
                                    6. وارد کردن اطلاعات ارسال :
                                </span>
                                <br>
                                    آدرس محل تحویل و اطلاعات لازم برای ارسال را وارد کنید.
                                <br>

                                <span class="fw-bold">
                                    7.  تأیید سفارش :
                                </span>
                                <br>
                                    قبل از نهایی کردن خرید، تمامی اطلاعات شامل محصولات، قیمت‌ها و آدرس ارسال را دوباره بررسی کنید.
                                <br>

                                <span class="fw-bold">
                                    8.  پیگیری سفارش :
                                </span>
                                <br>
                                    پس از نهایی کردن خرید، معمولاً یک شماره پیگیری به شما داده می‌شود که می‌توانید با استفاده از آن وضعیت سفارش خود را پیگیری کنید.
                                <br>

                                <span class="fw-bold">
                                    9. دریافت و بررسی محصول :
                                </span>
                                <br>
                                    پس از دریافت محصول، آن را بررسی کنید تا مطمئن شوید که همان چیزی است که سفارش داده‌اید و در شرایط خوبی قرار دارد.
                                <br>

                                <span class="fw-bold">
                                    10. نظرسنجی و بازخورد :
                                </span>
                                <br>
                                    پس از خرید، می‌توانید نظرات خود را درباره محصول و تجربه خریدتان با دیگران به اشتراک بگذارید.
                                <br>

                                <span class="fw-bold">
                                    تذکر :
                                </span>
                                <br>
                                    درصورت عدم موجودی ، کالا به صورت خودکار حذف می شود.                                
                                <br>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree">
                            چطور ارسال محصولات انجام میشه ؟
                        </button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <p>
                                <span class="fw-bold">
                                    1. پردازش سفارش :
                                </span>
                                <br>
                                    سفارش شما پس از تأیید پرداخت، به سرعت پردازش می‌شود. معمولاً این فرآیند بین 1 تا 2 روز کاری طول می‌کشد. در این مرحله، ما محصول را بررسی کرده و بسته‌بندی آن را آماده می‌کنیم.
                                <br>
                                
                                <span class="fw-bold">
                                    2. هزینه ارسال :
                                </span>
                                <br>
                                    هزینه ارسال برای سفارش های بیشتر از 3,000,000 تومان رایگان است.
                                <br>

                                <span class="fw-bold">
                                    3. تحویل سفارش :
                                </span>
                                <br>
                                    سفارش شما در مدت سه روز تا یک هفته به آدرسی که در سایت ثبت کرده اید تحویل داده خواهد شد .
                                <br>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Faq Content:end-->
    </section>
    <!--FAQ Section:end-->

</main>
<!--Main:end-->

@endsection()