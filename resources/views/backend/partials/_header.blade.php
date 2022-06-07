<!-- main-header -->
<div class="main-header side-header sticky nav nav-item">
    <div class=" main-container container-fluid">
        <div class="main-header-left ">
            <div class="responsive-logo">
                <a href="index.html" class="header-logo">
                <img src="{{ asset('backend/assets/img/brand/agadult.png') }}" class="mobile-logo logo-1" alt="logo" height="30px">
                    <img src="{{ asset('backend/assets/img/brand/agadult.png') }}" class="mobile-logo dark-logo-1" alt="logo">
                </a>
            </div>
            <div class="app-sidebar__toggle" data-bs-toggle="sidebar">
                <a class="open-toggle" href="javascript:void(0);"><i class="header-icon fe fe-align-left"></i></a>
                <a class="close-toggle" href="javascript:void(0);"><i class="header-icon fe fe-x"></i></a>
            </div>
            <div class="logo-horizontal">
                <a href="index.html" class="header-logo">
                    <img src="{{ asset('backend/assets/img/brand/agadult.png') }}" class="mobile-logo logo-1" alt="logo">
                    <img src="{{ asset('backend/assets/img/brand/agadult.png') }}" class="mobile-logo dark-logo-1" alt="logo">
                </a>
            </div>
            <div class="main-header-center ms-4 d-sm-none d-md-none d-lg-block form-group">
                <input class="form-control" placeholder="Search..." type="search">
                <button class="btn"><i class="fas fa-search"></i></button>
            </div>
        </div>
        <div class="main-header-right">
            <button class="navbar-toggler navresponsive-toggler d-md-none ms-auto" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
                aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon fe fe-more-vertical "></span>
            </button>
            <div class="mb-0 navbar navbar-expand-lg navbar-nav-right responsive-navbar navbar-dark p-0">
                <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                    <ul class="nav nav-item header-icons navbar-nav-right ms-auto">
                        <li class="dropdown nav-item">
                            <a class="new nav-link theme-layout nav-link-bg layout-setting">
                                <span class="dark-layout"><svg xmlns="http://www.w3.org/2000/svg"
                                        class="header-icon-svgs" width="24" height="24" viewBox="0 0 24 24">
                                        <path
                                            d="M20.742 13.045a8.088 8.088 0 0 1-2.077.271c-2.135 0-4.14-.83-5.646-2.336a8.025 8.025 0 0 1-2.064-7.723A1 1 0 0 0 9.73 2.034a10.014 10.014 0 0 0-4.489 2.582c-3.898 3.898-3.898 10.243 0 14.143a9.937 9.937 0 0 0 7.072 2.93 9.93 9.93 0 0 0 7.07-2.929 10.007 10.007 0 0 0 2.583-4.491 1.001 1.001 0 0 0-1.224-1.224zm-2.772 4.301a7.947 7.947 0 0 1-5.656 2.343 7.953 7.953 0 0 1-5.658-2.344c-3.118-3.119-3.118-8.195 0-11.314a7.923 7.923 0 0 1 2.06-1.483 10.027 10.027 0 0 0 2.89 7.848 9.972 9.972 0 0 0 7.848 2.891 8.036 8.036 0 0 1-1.484 2.059z" />
                                    </svg></span>
                                <span class="light-layout"><svg xmlns="http://www.w3.org/2000/svg"
                                        class="header-icon-svgs" width="24" height="24" viewBox="0 0 24 24">
                                        <path
                                            d="M6.993 12c0 2.761 2.246 5.007 5.007 5.007s5.007-2.246 5.007-5.007S14.761 6.993 12 6.993 6.993 9.239 6.993 12zM12 8.993c1.658 0 3.007 1.349 3.007 3.007S13.658 15.007 12 15.007 8.993 13.658 8.993 12 10.342 8.993 12 8.993zM10.998 19h2v3h-2zm0-17h2v3h-2zm-9 9h3v2h-3zm17 0h3v2h-3zM4.219 18.363l2.12-2.122 1.415 1.414-2.12 2.122zM16.24 6.344l2.122-2.122 1.414 1.414-2.122 2.122zM6.342 7.759 4.22 5.637l1.415-1.414 2.12 2.122zm13.434 10.605-1.414 1.414-2.122-2.122 1.414-1.414z" />
                                    </svg></span>
                            </a>
                        </li>
                        <li class="dropdown nav-item main-header-notification d-flex">
                            <a class="new nav-link" data-bs-toggle="dropdown" href="javascript:void(0);">
                                <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" width="24" height="24"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M19 13.586V10c0-3.217-2.185-5.927-5.145-6.742C13.562 2.52 12.846 2 12 2s-1.562.52-1.855 1.258C7.185 4.074 5 6.783 5 10v3.586l-1.707 1.707A.996.996 0 0 0 3 16v2a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-2a.996.996 0 0 0-.293-.707L19 13.586zM19 17H5v-.586l1.707-1.707A.996.996 0 0 0 7 14v-4c0-2.757 2.243-5 5-5s5 2.243 5 5v4c0 .266.105.52.293.707L19 16.414V17zm-7 5a2.98 2.98 0 0 0 2.818-2H9.182A2.98 2.98 0 0 0 12 22z" />
                                </svg><span class=" pulse"></span>
                            </a>
                            <div class="dropdown-menu">
                                <div class="menu-header-content text-start border-bottom">
                                    <div class="d-flex">
                                        <h6 class="dropdown-title mb-1 tx-15 font-weight-semibold">
                                            Notifications</h6>
                                        <span class="badge badge-pill badge-warning ms-auto my-auto float-end">Mark
                                            All Read</span>
                                    </div>
                                    <p class="dropdown-title-text subtext mb-0 op-6 pb-0 tx-12 ">You have 4
                                        unread Notifications</p>
                                </div>
                                <div class="main-notification-list Notification-scroll">
                                    <a class="d-flex p-3 border-bottom" href="mail.html">
                                        <div class="notifyimg bg-pink">
                                            <i class="far fa-folder-open text-white"></i>
                                        </div>
                                        <div class="ms-3">
                                            <h5 class="notification-label mb-1">New files available</h5>
                                            <div class="notification-subtext">10 hour ago</div>
                                        </div>
                                        <div class="ms-auto">
                                            <i class="las la-angle-right text-end text-muted"></i>
                                        </div>
                                    </a>
                                    <a class="d-flex p-3  border-bottom" href="mail.html">
                                        <div class="notifyimg bg-purple">
                                            <i class="fab fa-delicious text-white"></i>
                                        </div>
                                        <div class="ms-3">
                                            <h5 class="notification-label mb-1">Updates Available</h5>
                                            <div class="notification-subtext">2 days ago</div>
                                        </div>
                                        <div class="ms-auto">
                                            <i class="las la-angle-right text-end text-muted"></i>
                                        </div>
                                    </a>
                                    <a class="d-flex p-3 border-bottom" href="mail.html">
                                        <div class="notifyimg bg-success">
                                            <i class="fa fa-cart-plus text-white"></i>
                                        </div>
                                        <div class="ms-3">
                                            <h5 class="notification-label mb-1">New Order Received</h5>
                                            <div class="notification-subtext">1 hour ago</div>
                                        </div>
                                        <div class="ms-auto">
                                            <i class="las la-angle-right text-end text-muted"></i>
                                        </div>
                                    </a>
                                    <a class="d-flex p-3 border-bottom" href="mail.html">
                                        <div class="notifyimg bg-warning">
                                            <i class="far fa-envelope-open text-white"></i>
                                        </div>
                                        <div class="ms-3">
                                            <h5 class="notification-label mb-1">New review received</h5>
                                            <div class="notification-subtext">1 day ago</div>
                                        </div>
                                        <div class="ms-auto">
                                            <i class="las la-angle-right text-end text-muted"></i>
                                        </div>
                                    </a>
                                    <a class="d-flex p-3 border-bottom" href="mail.html">
                                        <div class="notifyimg bg-danger">
                                            <i class="fab fa-wpforms text-white"></i>
                                        </div>
                                        <div class="ms-3">
                                            <h5 class="notification-label mb-1">22 verified registrations
                                            </h5>
                                            <div class="notification-subtext">2 hour ago</div>
                                        </div>
                                        <div class="ms-auto">
                                            <i class="las la-angle-right text-end text-muted"></i>
                                        </div>
                                    </a>
                                    <a class="d-flex p-3 border-bottom" href="mail.html">
                                        <div class="">
                                            <i class="far fa-check-square text-white notifyimg bg-primary"></i>
                                        </div>
                                        <div class="ms-3">
                                            <h5 class="notification-label mb-1">Project has been approved
                                            </h5>
                                            <span class="notification-subtext">4 hour ago</span>
                                        </div>
                                        <div class="ms-auto">
                                            <i class="las la-angle-right text-end text-muted"></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="dropdown-footer">
                                    <a class="btn btn-primary btn-sm btn-block" href="mail.html">VIEW
                                        ALL</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item full-screen fullscreen-button">
                            <a class="new nav-link full-screen-link" href="javascript:void(0);"><svg
                                    xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" width="24" height="24"
                                    viewBox="0 0 24 24">
                                    <path d="M5 5h5V3H3v7h2zm5 14H5v-5H3v7h7zm11-5h-2v5h-5v2h7zm-2-4h2V3h-7v2h5z" />
                                </svg></a>
                        </li>
                        <li class="nav-link search-icon d-lg-none d-block">
                            <form class="navbar-form" role="search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <span class="input-group-btn">
                                        <button type="reset" class="btn btn-default">
                                            <i class="fas fa-times"></i>
                                        </button>
                                        <button type="submit" class="btn btn-default nav-link resp-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                                class="header-icon-svgs" viewBox="0 0 24 24" width="24px"
                                                fill="#000000">
                                                <path d="M0 0h24v24H0V0z" fill="none" />
                                                <path
                                                    d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
                                            </svg>
                                        </button>
                                    </span>
                                </div>
                            </form>
                        </li>
                        <li class="dropdown main-profile-menu nav nav-item nav-link ps-lg-2">
                            <a class="new nav-link profile-user d-flex" href="#" data-bs-toggle="dropdown"><img alt=""
                                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTv9pNGckkhtfLaW1IQD_3pbSUB43mB5_SmyQ&usqp=CAU" class=""></a>
                            <div class="dropdown-menu">
                                <div class="menu-header-content p-3 border-bottom">
                                    <div class="d-flex wd-100p">
                                        <div class="main-img-user"><img alt="" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTv9pNGckkhtfLaW1IQD_3pbSUB43mB5_SmyQ&usqp=CAU"
                                                class=""></div>
                                        <div class="ms-3 my-auto">
                                            <h6 class="tx-15 font-weight-semibold mb-0">{{ auth()->user()->name }}</h6>
                                            <span class="dropdown-title-text subtext op-6  tx-12">Admin</span>
                                        </div>
                                    </div>
                                </div>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="dropdown-item" type="submit"><i
                                            class="far fa-arrow-alt-circle-left"></i> Sign Out</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /main-header -->
