<div class="col-sm-12 col-md-12 col-lg-4 col-xl-3">
    <!--User Panel Aside:start-->
    <aside class="user-panel-aside border border-radius-xl py-3">
        <!--User Panel Header:start-->
        <div class="user-panel-aside-header text-center border-bottom-gray-200 pb-2">
            <!--User Picture:start-->
            <i class="fa fa-user-circle cfs-1 gray-300"></i>
            <!--User Picture:end-->

            <!--User Name:start-->
            <p class="fw-bold mt-2">
                <a href="{{route('User.edit',Auth::guard('web')->user()->id)}}" class="ps-2">
                    <i class="fa fa-pen cyan-300 fa-md"></i>
                </a>
                @if (Auth::guard('web')->user()->first_name && Auth::guard('web')->user()->last_name)
                    {{Auth::guard('web')->user()->first_name.' '.Auth::guard('web')->user()->last_name}}
                @endif
            </p>
            <p class="gray-500">{{Auth::guard('web')->user()->mobile}}</p>
            <!--User Name:end-->
        </div>
        <!--User Panel Header:end-->

        <!--User Panel Aside Menu:start-->
        <div class="user-panel-aside-menu">
            <ul>
                <li>
                    <a href="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-cart-check" viewBox="0 0 16 16">
                            <path d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                            <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                        </svg>
                        <span class="ps-2">
                            سفارش ها
                        </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('show-favorites')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-heart" viewBox="0 0 16 16">
                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                        </svg>
                        <span class="ps-2">
                            علاقه مندی ها
                        </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('Comment.index')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-chat" viewBox="0 0 16 16">
                            <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"/>
                        </svg>
                        <span class="ps-2">
                            دیدگاه ها
                        </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('Address.index')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-pin-map" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8l3-4z"/>
                            <path fill-rule="evenodd" d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6zM4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z"/>
                        </svg>
                        <span class="ps-2">
                            آدرس ها
                        </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('user-logout')}}">
                        <i class="fa fa-sign-out-alt"></i>
                        <span class="ps-2">
                            خروج
                        </span>
                    </a>
                </li>
            </ul>
        </div>
        <!--User Panel Aside Menu:end-->
    </aside>
    <!--User Panel Aside:end-->
</div>