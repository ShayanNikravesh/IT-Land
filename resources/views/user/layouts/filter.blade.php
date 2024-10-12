<div class="search-filters border border-radius-xl py-2 px-3">
    <!--Search Filters Title:start-->
    <h3 class="fs-5 fw-bold mt-2">فیلتر ها</h3>
    <!--Search Filters Title:end-->
    <form action="{{ route('filter') }}" method="GET" id="filterForm">
        <div class="accordion accordion-flush mt-4" id="accordionFlushExample">
            <!--Search Filters Item:start-->
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        دسته بندی
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <ul>
                            @foreach ($categories as $category)
                                <li>
                                    {{$category->title}}
                                    <label>
                                        <input type="checkbox" name="category[]" class="form-check-input category-filter" value="{{ $category->id }}">
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!--Search Filters Item:end-->
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        برند
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <ul>
                            @foreach ($brands as $brand)
                                <li>
                                    <a href="">{{$brand->title}}</a>
                                    <label>
                                        <input type="checkbox" name="brand[]" class="form-check-input brand-filter" value="{{ $brand->id }}">
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                        محدوده قیمت
                    </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div class="price-range d-flex justify-content-between align-items-center">
                            <span>از</span>
                            <input type="number" id="min_price" name="min_price" class="form-control mx-3 fs-3 text-center">
                            <span>تومان</span>
                        </div>
                        <div class="price-range d-flex justify-content-between align-items-center">
                            <span>تا</span>
                            <input type="number" id="max_price" name="max_price" class="form-control mx-3 fs-3 text-center">
                            <span>تومان</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <!--Filter available Products:start-->
        <div class="form-check form-switch mt-2">
            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="available" value="1">
            <label class="form-check-label" for="flexSwitchCheckDefault">فقط کالاهای موجود</label>
        </div>
        <!--Filter Unavailable Products:end-->
    
        <!--Filter Button:start-->
        <div class="d-grid gap-2 mt-3">
            <button type="submit" class="btn custom-btn-primary">
                <i class="fa fa-filter"></i>
                فیلتر کن!
            </button>
        </div>
        <!--Filter Button:end-->
    </form>

</div>