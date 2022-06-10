<header id="header" class="header left-aligned-navbar" data-hs-header-options='{
    "fixMoment": 1000,
    "fixEffect": "slide"
}'>
    <div class="header-section header-white-nav-links bg-dark-1">
        <div id="logoAndNav" class="container px-md-5">

            <nav class="js-mega-menu navbar navbar-expand-xl py-0 position-static justify-content-start">

                <button type="button" class="navbar-toggler btn btn-icon btn-sm rounded-circle mr-2d"
                    aria-label="Toggle navigation" aria-expanded="false" aria-controls="navBar" data-toggle="collapse"
                    data-target="#navBar">
                    <span class="navbar-toggler-default">
                        <svg width="14" height="14" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                            <path fill="currentColor"
                                d="M17.4,6.2H0.6C0.3,6.2,0,5.9,0,5.5V4.1c0-0.4,0.3-0.7,0.6-0.7h16.9c0.3,0,0.6,0.3,0.6,0.7v1.4C18,5.9,17.7,6.2,17.4,6.2z M17.4,14.1H0.6c-0.3,0-0.6-0.3-0.6-0.7V12c0-0.4,0.3-0.7,0.6-0.7h16.9c0.3,0,0.6,0.3,0.6,0.7v1.4C18,13.7,17.7,14.1,17.4,14.1z" />
                        </svg>
                    </span>
                    <span class="navbar-toggler-toggled">
                        <svg width="14" height="14" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                            <path fill="currentColor"
                                d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z" />
                        </svg>
                    </span>
                </button>

                <a class="navbar-brand w-auto mr-xl-5 mr-wd-8" href="{{ route('pages.index') }}" aria-label="Vodi">
                    <img src="{{ asset('logo/agadult.png') }}" class="img-fluid" alt="">
                </a>


                <div id="navBar" class="collapse navbar-collapse order-1 order-xl-0">
                    <div class="navbar-body header-abs-top-inner">
                        <ul class="navbar-nav">

                            <li class="hs-has-mega-menu navbar-nav-item">
                                <a id="homeMegaMenu"
                                    class="hs-mega-menu-invoker py-xl-3d line-height-lg nav-link font-secondary"
                                    href="{{ route('pages.index') }}" aria-haspopup="true"
                                    aria-expanded="false">Home</a>

                                <div class="hs-mega-menu w-100" aria-labelledby="homeMegaMenu">
                                </div>

                            </li>

                            @if (Auth::check() !== true)
                                <li class="hs-has-mega-menu navbar-nav-item">
                                    <a id="homeMegaMenu"
                                        class="hs-mega-menu-invoker py-xl-3d line-height-lg nav-link font-primary"
                                        href="{{ route('pages.plan') }}" aria-haspopup="true"
                                        aria-expanded="false">Plans</a>

                                    <div class="hs-mega-menu w-100" aria-labelledby="homeMegaMenu">
                                    </div>

                                </li>
                                <li class="hs-has-mega-menu navbar-nav-item">
                                    <a id="homeMegaMenu"
                                        class="hs-mega-menu-invoker py-xl-3d line-height-lg nav-link font-primary"
                                        data-toggle="modal" data-target="#loginModal">Login</a>

                                    <div class="hs-mega-menu w-100" aria-labelledby="homeMegaMenu">
                                    </div>

                                </li>
                            @endif

                            <li class="hs-has-mega-menu navbar-nav-item">
                                <a id="homeMegaMenu"
                                    class="hs-mega-menu-invoker py-xl-3d line-height-lg nav-link font-secondary"
                                    href="{{ route('pages.search', 'myanmar') }}" aria-haspopup="true"
                                    aria-expanded="false">Myanmar</a>

                                <div class="hs-mega-menu w-100" aria-labelledby="homeMegaMenu">
                                </div>

                            </li>

                            <li class="hs-has-mega-menu navbar-nav-item">
                                <a id="homeMegaMenu"
                                    class="hs-mega-menu-invoker py-xl-3d line-height-lg nav-link font-secondary"
                                    href="{{ route('pages.search', 'exantria') }}" aria-haspopup="true"
                                    aria-expanded="false">Exantria</a>

                                <div class="hs-mega-menu w-100" aria-labelledby="homeMegaMenu">
                                </div>

                            </li>

                            <li class="hs-has-mega-menu navbar-nav-item">
                                <a id="homeMegaMenu"
                                    class="hs-mega-menu-invoker py-xl-3d line-height-lg nav-link font-secondary"
                                    href="{{ route('pages.search', 'onlyfan') }}" aria-haspopup="true"
                                    aria-expanded="false">Onlyfan</a>

                                <div class="hs-mega-menu w-100" aria-labelledby="homeMegaMenu">
                                </div>

                            </li>

                            <li class="hs-has-mega-menu navbar-nav-item">
                                <a id="homeMegaMenu"
                                    class="hs-mega-menu-invoker py-xl-3d line-height-lg nav-link font-secondary"
                                    href="{{ route('pages.search', 'hentai') }}" aria-haspopup="true"
                                    aria-expanded="false">Hentai</a>

                                <div class="hs-mega-menu w-100" aria-labelledby="homeMegaMenu">
                                </div>

                            </li>

                            <li class="hs-has-mega-menu navbar-nav-item">
                                <a id="homeMegaMenu"
                                    class="hs-mega-menu-invoker py-xl-3d line-height-lg nav-link font-secondary"
                                    href="{{ route('pages.search', 'manga') }}" aria-haspopup="true"
                                    aria-expanded="false">Manga</a>

                                <div class="hs-mega-menu w-100" aria-labelledby="homeMegaMenu">
                                </div>

                            </li>
                        </ul>
                    </div>
                </div>

                <div class="d-flex align-items-center ml-auto">
                    <form class="d-none d-xl-block" action="{{ route('pages.searchInput') }}" method="POST">
                        @csrf
                        <label class="sr-only">Search</label>
                        <div class="input-group">
                            <input type="text"
                                class="search-form-control form-control py-2 pl-4 rounded-pill bg-transparent border-gray-5400"
                                name="search" id="searchproduct-item" placeholder="Search..." aria-label="Search..."
                                aria-describedby="searchProduct1" required="">
                            <div class="input-group-append position-absolute top-0 bottom-0 right-0  z-index-4">
                                <button class="d-flex py-2 px-3 border-0 bg-transparent align-items-center"
                                    type="button" id="searchProduct1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        style="fill: #4e5567;">
                                        <path
                                            d="M7 0C11-0.1 13.4 2.1 14.6 4.9 15.5 7.1 14.9 9.8 13.9 11.4 13.7 11.7 13.6 12 13.3 12.2 13.4 12.5 14.2 13.1 14.4 13.4 15.4 14.3 16.3 15.2 17.2 16.1 17.5 16.4 18.2 16.9 18 17.5 17.9 17.6 17.9 17.7 17.8 17.8 17.2 18.3 16.7 17.8 16.4 17.4 15.4 16.4 14.3 15.4 13.3 14.3 13 14.1 12.8 13.8 12.5 13.6 12.4 13.5 12.3 13.3 12.2 13.3 12 13.4 11.5 13.8 11.3 14 10.7 14.4 9.9 14.6 9.2 14.8 8.9 14.9 8.6 14.9 8.3 14.9 8 15 7.4 15.1 7.1 15 6.3 14.8 5.6 14.8 4.9 14.5 2.7 13.6 1.1 12.1 0.4 9.7 0 8.7-0.2 7.1 0.2 6 0.3 5.3 0.5 4.6 0.9 4 1.8 2.4 3 1.3 4.7 0.5 5.2 0.3 5.7 0.2 6.3 0.1 6.5 0 6.8 0.1 7 0ZM7.3 1.5C7.1 1.6 6.8 1.5 6.7 1.5 6.2 1.6 5.8 1.7 5.4 1.9 3.7 2.5 2.6 3.7 1.9 5.4 1.7 5.8 1.7 6.2 1.6 6.6 1.4 7.4 1.6 8.5 1.8 9.1 2.4 11.1 3.5 12.3 5.3 13 5.9 13.3 6.6 13.5 7.5 13.5 7.7 13.5 7.9 13.5 8.1 13.5 8.6 13.4 9.1 13.3 9.6 13.1 11.2 12.5 12.4 11.4 13.1 9.8 13.6 8.5 13.6 6.6 13.1 5.3 12.2 3.1 10.4 1.5 7.3 1.5Z">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="d-inline-flex ml-md-5">
                        <ul class="d-flex list-unstyled mb-0 align-items-center">
                            <li class="col d-xl-none position-static px-2">

                                <div class="hs-unfold mr-2 position-static">
                                    <a class="js-hs-unfold-invoker btn btn-icon btn-ghost-secondary nav-link"
                                        href="javascript:;" data-hs-unfold-options='{
                                        "target": "#searchClassic",
                                        "type": "css-animation",
                                        "animationIn": "slideInUp"
                                    }'>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            style="fill: #ffffff;">
                                            <path
                                                d="M7 0C11-0.1 13.4 2.1 14.6 4.9 15.5 7.1 14.9 9.8 13.9 11.4 13.7 11.7 13.6 12 13.3 12.2 13.4 12.5 14.2 13.1 14.4 13.4 15.4 14.3 16.3 15.2 17.2 16.1 17.5 16.4 18.2 16.9 18 17.5 17.9 17.6 17.9 17.7 17.8 17.8 17.2 18.3 16.7 17.8 16.4 17.4 15.4 16.4 14.3 15.4 13.3 14.3 13 14.1 12.8 13.8 12.5 13.6 12.4 13.5 12.3 13.3 12.2 13.3 12 13.4 11.5 13.8 11.3 14 10.7 14.4 9.9 14.6 9.2 14.8 8.9 14.9 8.6 14.9 8.3 14.9 8 15 7.4 15.1 7.1 15 6.3 14.8 5.6 14.8 4.9 14.5 2.7 13.6 1.1 12.1 0.4 9.7 0 8.7-0.2 7.1 0.2 6 0.3 5.3 0.5 4.6 0.9 4 1.8 2.4 3 1.3 4.7 0.5 5.2 0.3 5.7 0.2 6.3 0.1 6.5 0 6.8 0.1 7 0ZM7.3 1.5C7.1 1.6 6.8 1.5 6.7 1.5 6.2 1.6 5.8 1.7 5.4 1.9 3.7 2.5 2.6 3.7 1.9 5.4 1.7 5.8 1.7 6.2 1.6 6.6 1.4 7.4 1.6 8.5 1.8 9.1 2.4 11.1 3.5 12.3 5.3 13 5.9 13.3 6.6 13.5 7.5 13.5 7.7 13.5 7.9 13.5 8.1 13.5 8.6 13.4 9.1 13.3 9.6 13.1 11.2 12.5 12.4 11.4 13.1 9.8 13.6 8.5 13.6 6.6 13.1 5.3 12.2 3.1 10.4 1.5 7.3 1.5Z">
                                            </path>
                                        </svg>
                                    </a>
                                    <div id="searchClassic"
                                        class="hs-unfold-content dropdown-menu w-100 border-0 rounded-0 px-3 mt-0 right-0 left-0 mt-n2">
                                        <form action="{{ route('pages.searchInput') }}"
                                            class="input-group input-group-sm input-group-merge" method="POST">
                                            @csrf
                                            <input type="text" name="search"
                                                class="form-control search-form-control rounded-pill"
                                                placeholder="Search..." aria-label="Search...">
                                            <div class="input-group-append">
                                                <button type="button" class="btn" type="submit">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </li>
                            <li class="col pr-xl-0 px-2 px-sm-3">

                                <div class="hs-unfold">
                                    <a class="js-hs-unfold-invoker dropdown-nav-link dropdown-toggle py-4 position-relative d-flex align-items-center"
                                        href="javascript:;" data-hs-unfold-options='{
                                        "target": "#basicDropdownHover",
                                        "type": "css-animation",
                                        "event": "click"
                                    }'>
                                        <svg width="32px" height="32px">
                                            <image x="0px" y="0px" width="32px" height="32px"
                                                xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAMAAABEpIrGAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAACB1BMVEW7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu7vLu3t7eys7KztLO4uLi6u7q0tbSxsrG2t7awsrC7vLu8vLy1trW8vby1tbWysrK6urq3uLe5urm9vr24ubitrq2wsbCsrazV1dXs7Oz29vb39/fw8PDe3t6vsK/v7+/////5+vnLy8urrKuxsbHGx8aur67k5OT4+Pizs7P9/f3R0tGurq7Oz87j4+OsrqzU1NTo6OiusK7+/v7k5eT4+fjGyMa7u7v6+vrMzMyrq6u+vr7Ky8ri4uLt7e3u7u7m5+bT1NOwsLC+v77Q0NDe397f39/T09O/v7/FxsX5+fn09PS9vb37+/v09fTNzs3g4ODh4uHX2Nf8/PzY2djIyMjIycjU1dTl5uXx8fHm5ubV1tVi3+TsAAAAUnRSTlMADleWxOHwxphZESftmiuDiBvN0iAq8TAW9xzX340dI5ymCPj9VV+lydDl5/P05srRnqdjCvr+EKCqipTd5Pb7IfI31NmLkAQvojIVn+PLoWIYYNJBTgAAAAFiS0dEca8HXOIAAAAHdElNRQfjBQECDwMxTbKCAAACG0lEQVQ4y21T90PTQBQ+RKpY3FisExcuEHEvFPdeXLikJLnakjbVgjESSEutqIiKIo66R90L/SNtbzTp+H66e9/37r17A4ACqqZUT63xeGqmTa+dAcrhra7rhEIXQl2iFPDMnFXKz0bdoqzIBIosdqM5RfTceYKKZRdwUJhf7/AL6iD35lAU6Gvg/ELfJe4eCgd62FGT/IuYYDGkPI5E9RASYiK9anAJyw8yFx1evhLv7buKYwoJqMCleX4ZUskVG+iaSXC936ICFS3PCRoHyItKUOw1OQZtYsMDKwBYuUqgEaxEgTeTQxFiE1dXgTWdlFdxyhGYN9LM2gQaJVoB46aLN4ctWg19LVjH/nDrtltwJ42IFa4HG8JUMFLpBTm8ETSHeA53K+SAmkELE8jWqMPfY7/ICzYFWHfcdbhv40KIVok3Z+RBH6XHHj7ivYWbQZvOL+N6+vHEk6fPnoejCh8dfQuo5SHkjB158fLV6zdvg3aGj4e6FWzbTkqtida74SQN8T4xGBM0UuodOwHYlW+WZosT7jok1HROgfXduW7WI1HRoviDWYT4eEzLtdubH4g98GOmZ8wsQVY2NLiXjtQ+Q/pkliE+ZLTzod/fb1bA5wMdfKwbDn4p57/6DzmL0XH42/diOvXjiLdot47+TLgkqdFfx46XLOeJtpbffyaT2Wxy8u8//8lTFfb7dNOZ1rMeX/u58xcuOtb/keQ/CDzeyUsAAAAASUVORK5CYII=">
                                            </image>
                                        </svg>
                                    </a>
                                    <div id="basicDropdownHover"
                                        class="hs-unfold-content dropdown-menu my-account-dropdown">

                                        @if (Auth::check())
                                            <span class="dropdown-item text-danger font-extrabold">{{ str_replace('from now','left',\Carbon\Carbon::parse(auth()->user()->expiry_date)->diffForHumans()) }}</span>
                                            <a class="dropdown-item" href="{{ route('pages.profile') }}">Profile
                                            </a>
                                            <form action="{{ route('logout') }}" method="POST">
                                                @csrf
                                                <button class="dropdown-item" type="submit">Logout</button>
                                            </form>
                                        @else
                                            <a class="dropdown-item" href="javascript:;" data-toggle="modal"
                                                data-target="#loginModal">Sign in</a>
                                            <a class="dropdown-item" href="{{ route('pages.plan') }}">Plans</a>
                                        @endif

                                    </div>
                                </div>

                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

        </div>
    </div>
</header>
