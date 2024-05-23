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
                        <a href="{{route('admin.marksAsRead')}}">Mark All As Read</a>
                    </div>
                </div>
                <div class="dropdown-header" id="notification_count">
                    Unraed Notification ( {{auth()->user()->unreadNotifications->count()}} )

                </div>
                <div class="dropdown-list-content dropdown-list-icons" id="notification_task">
                    @if(auth()->user()->unreadNotifications->count() > 0)

                    @foreach(auth()->user()->unreadNotifications as $notification)
                        <a href="{{ route($notification->data['route'] ?? 'admin.dashboard') }}" class="dropdown-item">
                            <div class="dropdown-item-icon bg-info text-white">
                                <i class="fas fa-bell"></i>
                            </div>
                            <div class="dropdown-item-desc">
                                {{ $notification->data['message'] ?? 'No message available' }}
                                <div class="time">{{ $notification->created_at->format('Y-m-d H:i:s') }}</div>
                            </div>
                        </a>
                    @endforeach
@endif

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
            <a href="{{route('admin.dashboard')}}">Restaurant</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{route('admin.dashboard')}}">St</a>
        </div>
        <ul class="sidebar-menu">

            @can('Daily Offer-list')

            <li>
                <a href="{{route('admin.dailyoffer.index')}}" class="nav-link"><i class="fas fa-fire"></i><span>DailyOffer</span></a>
            </li>
            @endcan
            @can('Slider Home-list')

            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>SlideHome</span></a>
                <ul class="dropdown-menu">
                    <li class="nav-link"><a class="nav-link" href="{{route('admin.slider.index')}}">Slide Dashboard</a></li>
                </ul>
            </li>
            @endcan
            @can('Section-show')

            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Section</span></a>
                <ul class="dropdown-menu">
                @can('why-choose-us-list')
                    <li class="nav-link"><a class="nav-link" href="{{route('admin.why-choose-us.index')}}">Why choose us</a></li>

                    @endcan

                    @can('Bunner Slider-list')
                        <li class="nav-link"><a class="nav-link" href="{{route('admin.banner-slider.index')}}">Banner Slider</a></li>

                        @endcan

                    @can('Chef-list')
                        <li class="nav-link"><a class="nav-link" href="{{route('admin.chef.index')}}">Chef</a></li>

                        @endcan

                    @can('App Download-list')
                        <li class="nav-link"><a class="nav-link" href="{{route('admin.appdownlaod.index')}}">App Download</a></li>

                        @endcan

                    @can('Testimonial-list')
                        <li class="nav-link"><a class="nav-link" href="{{route('admin.Testimonial.index')}}">Testimonial</a></li>

                        @endcan

                    @can('Counter-list')
                        <li class="nav-link"><a class="nav-link" href="{{route('admin.counter.index')}}">Counter</a></li>

                        @endcan

                    @can('Social Link-list')
                        <li class="nav-link"><a class="nav-link" href="{{route('admin.socail-link.index')}}">Social Link</a></li>

                        @endcan

                    @can('Footer Information-list')
                        <li class="nav-link"><a class="nav-link" href="{{route('admin.footer-info.index')}}">Footer Info</a></li>

                        @endcan
                </ul>
            </li>
            @endcan
            @can('Page-show')

            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Pages</span></a>
                <ul class="dropdown-menu">
                    @can('Custom Page-list')
                        <li class="nav-link"><a class="nav-link" href="{{route('admin.custom-page.index')}}">Custom Page</a></li>

                    @endcan

                    @can('Terms Condition-list')
                            <li class="nav-link"><a class="nav-link" href="{{route('admin.termsCondition.index')}}">Terms Condition</a></li>

                        @endcan

                    @can('Privacy Policy-list')
                            <li class="nav-link"><a class="nav-link" href="{{route('admin.privacyPolicy.index')}}">Privacy Policy</a></li>

                        @endcan

                    @can('About-list')
                            <li class="nav-link"><a class="nav-link" href="{{route('admin.about.index')}}">About</a></li>

                        @endcan

                    @can('Contact Us-list')
                            <li class="nav-link"><a class="nav-link" href="{{route('admin.contact.index')}}">Contact</a></li>

                        @endcan
                </ul>
            </li>
            @endcan
            @can('Order-show')
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Orders</span></a>
                <ul class="dropdown-menu">
                    @can('All Order-list')
                        <li class="nav-link"><a class="nav-link" href="{{route('admin.order.index')}}">Show Orders</a></li>

                    @endcan

                    @can('Pending Order-list')
                            <li class="nav-link"><a class="nav-link" href="{{route('admin.pending-order.index')}}">Pending</a></li>

                        @endcan

                    @can('Declined Order-list')
                            <li class="nav-link"><a class="nav-link" href="{{route('admin.declined-order.index')}}">Decline</a></li>

                        @endcan

                    @can('Delivered Order-list')
                            <li class="nav-link"><a class="nav-link" href="{{route('admin.delivered-order.index')}}">Delivered</a></li>

                        @endcan

                    @can('In Process Order-list')
                            <li class="nav-link"><a class="nav-link" href="{{route('admin.in_proccess-order.index')}}">In Proccess</a></li>

                        @endcan
                </ul>
            </li>
            @endcan
            @can('Manage Restaurant-show')

            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Manage Restaurant</span></a>
                <ul class="dropdown-menu">
                    @can('Category-list')
                        <li class="nav-link"><a href="{{route('admin.category.index')}}">Categories</a></li>

                    @endcan

                    @can('product-list')
                            <li class="nav-link"><a href="{{route('admin.product.index')}}">Products</a></li>

                        @endcan

                    @can('Product Review-list')
                            <li class="nav-link"><a href="{{route('admin.product-review.index')}}">Product - Reviews</a></li>

                        @endcan

                    @can('Coupon-list')
                            <li class="nav-link"><a href="{{route('admin.coupon.index')}}">Coupon</a></li>

                        @endcan

                    @can('Delivery-list')
                            <li class="nav-link"><a href="{{route('admin.delivery.index')}}">Delivery</a></li>

                        @endcan

                    @can('Payment Getway-list')
                            <li class="nav-link"><a href="{{route('admin.payment-getway.index')}}">Payment</a></li>

                        @endcan
                </ul>
            </li>
            @endcan
            @can('Chat-show')
            <li>
                <a href="{{route('admin.chat.index')}}" class="nav-link"><i class="fas fa-fire"></i><span>Chating</span></a>
            </li>
            @endcan
            @can('Setting-show')
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Settings</span></a>
                <ul class="dropdown-menu">
                    @can('Global Setting-list')
                        <li class="nav-link"><a href="{{route('admin.global_setting.index')}}">Global Setting</a></li>

                    @endcan

                    @can('Logo Setting-list')
                            <li class="nav-link"><a href="{{route('admin.logo.index')}}">Logo</a></li>

                        @endcan

                    @can('Email Setting-list')
                            <li class="nav-link"><a href="{{route('admin.email.index')}}">Email Setting</a></li>

                        @endcan

                    @can('Appearance Setting-list')
                            <li class="nav-link"><a href="{{route('admin.appearance.index')}}">Appearance</a></li>

                        @endcan

                    @can('Seo Setting-list')
                            <li class="nav-link"><a href="{{route('admin.seo_setting.index')}}">Seo Setting</a></li>

                        @endcan

                    @can('Notification Setting-list')
                            <li class="nav-link"><a href="{{route('admin.notify-pusher.index')}}">Notification Settings</a></li>

                        @endcan
                </ul>
            </li>
            @endcan
            @can('News Letter-list')
            <li>
                <a href="{{route('admin.news-letter.index')}}" class="nav-link"><i class="fas fa-fire"></i><span>News Letter</span></a>
            </li>
            @endcan
            @can('Menu Builder-show')
            <li>
                <a href="{{route('admin.menu-builder.index')}}" class="nav-link"><i class="fas fa-fire"></i><span>Menu Builder</span></a>
            </li>
            @endcan
            @can('Account Management-list')
             <li>
                <a href="{{route('admin.AccountManagement.index')}}" class="nav-link"><i class="fas fa-fire"></i><span>Account Management</span></a>
            </li>
            @endcan
            @can('role-list')
            <li>
                <a href="{{route('admin.roles.index')}}" class="nav-link"><i class="fas fa-fire"></i><span>Role and Permission</span></a>
            </li>
            @endcan
                <li>
                    <a href="{{route('admin.wipeDatabase.index')}}" class="nav-link"><i class="fas fa-fire"></i><span>DataBase Settings</span></a>
                </li>
        </ul>
    </aside>
</div>
