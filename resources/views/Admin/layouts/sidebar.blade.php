<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">

        </ul>

    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
                <div class="dropdown-header">Messages
                    <div class="float-right">
                        <a href="#">Mark All As Read</a>
                    </div>
                </div>
                <div class="dropdown-list-content dropdown-list-message">
                    <a href="#" class="dropdown-item dropdown-item-unread">
                        <div class="dropdown-item-avatar">
                            <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle">
                            <div class="is-online"></div>
                        </div>
                        <div class="dropdown-item-desc">
                            <b>Kusnaedi</b>
                            <p>Hello, Bro!</p>
                            <div class="time">10 Hours Ago</div>
                        </div>
                    </a>
                    <a href="#" class="dropdown-item dropdown-item-unread">
                        <div class="dropdown-item-avatar">
                            <img alt="image" src="assets/img/avatar/avatar-2.png" class="rounded-circle">
                        </div>
                        <div class="dropdown-item-desc">
                            <b>Dedik Sugiharto</b>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                            <div class="time">12 Hours Ago</div>
                        </div>
                    </a>
                    <a href="#" class="dropdown-item dropdown-item-unread">
                    </a>
                </div>
                <div class="dropdown-footer text-center">
                    <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </li>
        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
                <div class="dropdown-header">Notifications
                    <div class="float-right">
                        <a href="#">Mark All As Read</a>
                    </div>
                </div>
                <div class="dropdown-list-content dropdown-list-icons">
                    <a href="#" class="dropdown-item dropdown-item-unread">
                        <div class="dropdown-item-icon bg-primary text-white">
                            <i class="fas fa-code"></i>
                        </div>
                        <div class="dropdown-item-desc">
                            Template update is available now!
                            <div class="time text-primary">2 Min Ago</div>
                        </div>
                    </a>
                    <a href="#" class="dropdown-item">
                        <div class="dropdown-item-icon bg-info text-white">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="dropdown-item-desc">
                            <b>You</b> and <b>Dedik Sugiharto</b> are now friends
                            <div class="time">10 Hours Ago</div>
                        </div>
                    </a>
                    <a href="#" class="dropdown-item">
                        <div class="dropdown-item-icon bg-success text-white">
                            <i class="fas fa-check"></i>
                        </div>
                        <div class="dropdown-item-desc">
                            <b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
                            <div class="time">12 Hours Ago</div>
                        </div>
                    </a>
                    <a href="#" class="dropdown-item">
                        <div class="dropdown-item-icon bg-danger text-white">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <div class="dropdown-item-desc">
                            Low disk space. Let's clean it!
                            <div class="time">17 Hours Ago</div>
                        </div>
                    </a>
                    <a href="#" class="dropdown-item">
                        <div class="dropdown-item-icon bg-info text-white">
                            <i class="fas fa-bell"></i>
                        </div>
                        <div class="dropdown-item-desc">
                            Welcome to Stisla template!
                            <div class="time">Yesterday</div>
                        </div>
                    </a>
                </div>
                <div class="dropdown-footer text-center">
                    <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </li>
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{asset(auth()->user()->avatar)}}" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hi, {{auth()->user()->name }}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">Logged in 5 min ago</div>
                <a href="{{route('admin.profile')}}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a>
                <a href="features-activities.html" class="dropdown-item has-icon">
                    <i class="fas fa-bolt"></i> Activities
                </a>
                <a href="features-settings.html" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> Settings
                </a>
                <div class="dropdown-divider"></div>




                <form method="POST" action="{{ route('logout') }}" class="dropdown-item has-icon text-danger">
                    @csrf

                        <a href="route('logout')"
                           onclick="event.preventDefault();
                                                this.closest('form').submit();"
                           class="dropdown-item has-icon text-danger">

                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                </form>
            </div>
        </li>
    </ul>
</nav>
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown active">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li>
                <a href="{{route('admin.dailyoffer.index')}}" class="nav-link"><i class="fas fa-fire"></i><span>DailyOffer</span></a>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>SlideHome</span></a>
                <ul class="dropdown-menu">
                    <li class="nav-link"><a class="nav-link" href="{{route('admin.slider.index')}}">Slide Dashboard</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Section</span></a>
                <ul class="dropdown-menu">
                    <li class="nav-link"><a class="nav-link" href="{{route('admin.why-choose-us.index')}}">Why choose us</a></li>
                    <li class="nav-link"><a class="nav-link" href="{{route('admin.banner-slider.index')}}">Banner Slider</a></li>
                    <li class="nav-link"><a class="nav-link" href="{{route('admin.chef.index')}}">Chef</a></li>
                    <li class="nav-link"><a class="nav-link" href="{{route('admin.appdownlaod.index')}}">App Download</a></li>
                    <li class="nav-link"><a class="nav-link" href="{{route('admin.Testimonial.index')}}">Testimonial</a></li>
                    <li class="nav-link"><a class="nav-link" href="{{route('admin.counter.index')}}">Counter</a></li>
                    <li class="nav-link"><a class="nav-link" href="{{route('admin.socail-link.index')}}">Social Link</a></li>
                    <li class="nav-link"><a class="nav-link" href="{{route('admin.footer-info.index')}}">Footer Info</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Pages</span></a>
                <ul class="dropdown-menu">
                    <li class="nav-link"><a class="nav-link" href="{{route('admin.custom-page.index')}}">Custom Page</a></li>
                    <li class="nav-link"><a class="nav-link" href="{{route('admin.termsCondition.index')}}">Terms Condition</a></li>
                    <li class="nav-link"><a class="nav-link" href="{{route('admin.privacyPolicy.index')}}">Privacy Policy</a></li>
                    <li class="nav-link"><a class="nav-link" href="{{route('admin.about.index')}}">About</a></li>
                    <li class="nav-link"><a class="nav-link" href="{{route('admin.contact.index')}}">Contact</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Orders</span></a>
                <ul class="dropdown-menu">
                    <li class="nav-link"><a class="nav-link" href="{{route('admin.order.index')}}">Show Orders</a></li>
                    <li class="nav-link"><a class="nav-link" href="{{route('admin.pending-order.index')}}">Pending</a></li>
                    <li class="nav-link"><a class="nav-link" href="{{route('admin.declined-order.index')}}">Decline</a></li>
                    <li class="nav-link"><a class="nav-link" href="{{route('admin.delivered-order.index')}}">Delivered</a></li>
                    <li class="nav-link"><a class="nav-link" href="{{route('admin.in_proccess-order.index')}}">In Proccess</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Manage Restaurant</span></a>
                <ul class="dropdown-menu">
                    <li class="nav-link"><a href="{{route('admin.category.index')}}">Categories</a></li>
                    <li class="nav-link"><a href="{{route('admin.product.index')}}">Products</a></li>
                    <li class="nav-link"><a href="{{route('admin.product-review.index')}}">Product - Reviews</a></li>
                    <li class="nav-link"><a href="{{route('admin.coupon.index')}}">Coupon</a></li>
                    <li class="nav-link"><a href="{{route('admin.delivery.index')}}">Delivery</a></li>
                    <li class="nav-link"><a href="{{route('admin.payment-getway.index')}}">Payment</a></li>
                </ul>
            </li>
            <li>
                <a href="{{route('admin.chat.index')}}" class="nav-link"><i class="fas fa-fire"></i><span>Chating</span></a>
            </li>

            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Settings</span></a>
                <ul class="dropdown-menu">
                    <li class="nav-link"><a href="{{route('admin.global_setting.index')}}">Global Setting</a></li>
                    <li class="nav-link"><a href="{{route('admin.logo.index')}}">Logo</a></li>
                    <li class="nav-link"><a href="{{route('admin.email.index')}}">Email Setting</a></li>
                    <li class="nav-link"><a href="{{route('admin.appearance.index')}}">Appearance</a></li>
                    <li class="nav-link"><a href="{{route('admin.seo_setting.index')}}">Seo Setting</a></li>
                </ul>
            </li>
            <li>
                <a href="{{route('admin.news-letter.index')}}" class="nav-link"><i class="fas fa-fire"></i><span>News Letter</span></a>
            </li>
            <li>
                <a href="{{route('admin.menu-builder.index')}}" class="nav-link"><i class="fas fa-fire"></i><span>Menu Builder</span></a>
            </li>
             <li>
                <a href="{{route('admin.AccountManagement.index')}}" class="nav-link"><i class="fas fa-fire"></i><span>Account Management</span></a>
            </li>
        </ul>
    </aside>
</div>
