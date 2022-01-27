<div class="topbar">
    <nav class="navbar-custom">
        <ul class="list-inline float-right mb-0">
            <li class="list-inline-item dropdown notification-list"><a
                    class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#"
                    role="button" aria-haspopup="false" aria-expanded="false"><i class="ti-bell noti-icon"></i> <span
                        class="badge badge-success noti-icon-badge">23</span></a>
                <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg">

                    <div class="dropdown-item noti-title">
                        <h5><span class="badge badge-danger float-right">87</span>Notification</h5>
                    </div>

                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon bg-primary"><i class="mdi mdi-cart-outline"></i></div>
                        <p class="notify-details"><b>Your order is placed</b><small class="text-muted">Dummy text of
                                the printing and typesetting industry.</small></p>
                    </a>

                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon bg-success"><i class="mdi mdi-message"></i></div>
                        <p class="notify-details"><b>New Message received</b><small class="text-muted">You have 87
                                unread messages</small></p>
                    </a>

                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon bg-warning"><i class="mdi mdi-martini"></i></div>
                        <p class="notify-details"><b>Your item is shipped</b><small class="text-muted">It is a long
                                established fact that a reader will</small></p>
                    </a>
                    <a href="javascript:void(0);" class="dropdown-item notify-item">View All</a>
                </div>
            </li>
            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#"
                    role="button" aria-haspopup="false" aria-expanded="false">

                    @if (Auth::guard('web')->user()->url)
                        <img src="{{ asset('images/' . Auth::guard('web')->user()->url) }}" class="rounded-circle" />
                    @else
                        <img src="https://zrsgaming.eu/zrs.png" class="rounded-circle" />
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown">

                    <div class="dropdown-item noti-title">
                        <h5>Welcome</h5>
                    </div><a class="dropdown-item" href="/user/profile"><i
                            class="mdi mdi-account-circle m-r-5 text-muted"></i> {{ Auth::guard('web')->user()->name }}</a>
                            <a class="dropdown-item" href="{{ route('change') }}"><i
                                class="mdi mdi-key-change m-r-5 text-muted"></i> Change Password</a>
                    <div class="dropdown-divider"></div><a class="dropdown-item" href="/user/logout"><i
                            class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
                </div>
            </li>
        </ul>
        <ul class="list-inline menu-left mb-0">
            <li class="float-left"><button class="button-menu-mobile open-left waves-light waves-effect"><i
                        class="mdi mdi-menu"></i></button></li>
            <li class="hide-phone app-search">
                <form role="search" class=""><input type="text" placeholder="Search..."
                        class="form-control"> <a href="#"><i class="fa fa-search"></i></a></form>
            </li>
        </ul>
        <div class="clearfix"></div>
    </nav>
</div>
