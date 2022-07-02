<!-- main-sidebar -->
<div class="sticky">
    <aside class="app-sidebar">
        <div class="main-sidebar-header active">
            <a class="header-logo active" href="{{ route('admin.index') }}">
                <img src="{{ asset('backend/assets/img/brand/agadult.png') }}""
                    class="
                            main-logo  desktop-logo" alt="logo">
                <img src="{{ asset('backend/assets/img/brand/agadult.png') }}""
                    class="
                            main-logo  desktop-dark" alt="logo">
                <img src="{{ asset('backend/assets/img/brand/favicon.png') }}""
                    class="         main-logo  mobile-logo" alt="logo">
                <img src="assets/img/brand/favicon-white.png" class="main-logo  mobile-dark" alt="logo">
            </a>
        </div>
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg></div>
            <ul class="side-menu">
                <li class="side-item side-item-category">Main</li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('admin.index') }}"><svg
                            xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24"
                            viewBox="0 0 24 24">
                            <path
                                d="M3 13h1v7c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2v-7h1a1 1 0 0 0 .707-1.707l-9-9a.999.999 0 0 0-1.414 0l-9 9A1 1 0 0 0 3 13zm7 7v-5h4v5h-4zm2-15.586 6 6V15l.001 5H16v-5c0-1.103-.897-2-2-2h-4c-1.103 0-2 .897-2 2v5H6v-9.586l6-6z" />
                        </svg><span class="side-menu__label">Dashboards</span></a>
                </li>
                @if (auth()->user()->isAdmin())
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="{{ backpack_url('backup') }}"><svg
                                xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" height="24px"
                                viewBox="0 0 24 24" width="24px" fill="#000000">
                                <path d="M0 0h24v24H0V0z" fill="none" />
                                <path
                                    d="M14 12c0-1.1-.9-2-2-2s-2 .9-2 2 .9 2 2 2 2-.9 2-2zm-2-9c-4.97 0-9 4.03-9 9H0l4 4 4-4H5c0-3.87 3.13-7 7-7s7 3.13 7 7-3.13 7-7 7c-1.51 0-2.91-.49-4.06-1.3l-1.42 1.44C8.04 20.3 9.94 21 12 21c4.97 0 9-4.03 9-9s-4.03-9-9-9z" />
                            </svg><span class="side-menu__label">Backup</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('reports.index') }}"><svg
                                xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" height="24px"
                                viewBox="0 0 24 24" width="24px" fill="#000000">
                                <path d="M0 0h24v24H0V0z" fill="none" />
                                <path
                                    d="M12 5.99L19.53 19H4.47L12 5.99M12 2L1 21h22L12 2zm1 14h-2v2h2v-2zm0-6h-2v4h2v-4z" />
                            </svg><span class="side-menu__label">Reports</span></a>
                    </li>
                @endif
                <li class="side-item side-item-category">Post</li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><svg
                            xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" enable-background="new 0 0 24 24"
                            height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                            <g>
                                <rect fill="none" height="24" width="24" />
                            </g>
                            <g>
                                <g />
                                <g>
                                    <path
                                        d="M17,19.22H5V7h7V5H5C3.9,5,3,5.9,3,7v12c0,1.1,0.9,2,2,2h12c1.1,0,2-0.9,2-2v-7h-2V19.22z" />
                                    <path d="M19,2h-2v3h-3c0.01,0.01,0,2,0,2h3v2.99c0.01,0.01,2,0,2,0V7h3V5h-3V2z" />
                                    <rect height="2" width="8" x="7" y="9" />
                                    <polygon points="7,12 7,14 15,14 15,12 12,12" />
                                    <rect height="2" width="8" x="7" y="15" />
                                </g>
                            </g>
                        </svg> <span class="side-menu__label">Post</span><i class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li class="side-menu__label1"><a href="javascript:void(0);">Post</a></li>
                        <li><a class="slide-item" href="{{ route('videos.index') }}">View All</a></li>
                        <li><a class="slide-item" href="{{ route('videos.create') }}">Create Post</a></li>
                    </ul>
                </li>
                @can('create', User::class)
                    <li class="side-item side-item-category">Users</li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><svg
                                xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" height="24px"
                                viewBox="0 0 24 24" width="24px" fill="#000000">
                                <path d="M0 0h24v24H0V0z" fill="none" />
                                <path
                                    d="M12 6c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2m0 10c2.7 0 5.8 1.29 6 2H6c.23-.72 3.31-2 6-2m0-12C9.79 4 8 5.79 8 8s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm0 10c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                            </svg><span class="side-menu__label">Users</span><i class="angle fe fe-chevron-right"></i></a>
                        <ul class="slide-menu">
                            <li class="side-menu__label1"><a href="javascript:void(0);">Users</a></li>
                            <li><a class="slide-item" href="{{ route('users.index') }}">View All</a></li>
                            <li><a class="slide-item" href="{{ route('users.create') }}">Create User</a></li>
                        </ul>
                    </li>
                @endcan
                <li class="side-item side-item-category">Manga</li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><svg
                            xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" height="24px"
                            viewBox="0 0 24 24" width="24px" fill="#000000">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path
                                d="M18 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM9 4h2v5l-1-.75L9 9V4zm9 16H6V4h1v9l3-2.25L13 13V4h5v16z" />
                        </svg> <span class="side-menu__label">Manga</span><i
                            class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li class="side-menu__label1"><a href="javascript:void(0);">Manga</a></li>
                        <li><a class="slide-item" href="{{ route('manga.index') }}">View All</a></li>
                        <li><a class="slide-item" href="{{ route('manga.create') }}">Create Manga</a></li>
                    </ul>
                </li>
                <li class="side-item side-item-category">Categories</li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><svg
                            xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" height="24px"
                            viewBox="0 0 24 24" width="24px" fill="#000000">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path
                                d="M12 2l-5.5 9h11L12 2zm0 3.84L13.93 9h-3.87L12 5.84zM17.5 13c-2.49 0-4.5 2.01-4.5 4.5s2.01 4.5 4.5 4.5 4.5-2.01 4.5-4.5-2.01-4.5-4.5-4.5zm0 7c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5zM3 21.5h8v-8H3v8zm2-6h4v4H5v-4z" />
                        </svg> <span class="side-menu__label">Categories</span><i
                            class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li class="side-menu__label1"><a href="javascript:void(0);">Categories</a></li>
                        <li><a class="slide-item" href="{{ route('categories.index') }}">View All</a></li>
                        <li><a class="slide-item" href="{{ route('categories.create') }}">Create Category</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg></div>
        </div>
    </aside>
</div>
<!-- main-sidebar -->
