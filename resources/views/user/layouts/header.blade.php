<div class="topbar">
    <nav class="navbar-custom">
        @php
        $id = Auth::guard('web')->user()->id;
        $cout = \App\Models\RequestProject::where('project_user_id', $id)->count();
        @endphp
        <ul class="list-inline float-right mb-0">
            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    @if(Auth::guard('web')->user()->Image)
                    <img src="{{ asset('/images/' . Auth::guard('web')->user()->Image) }}" width="40" height="40" class="rounded-circle" />
                    @else
                    @if (Auth::guard('web')->user()->avatar)
                    <img src="{{ Auth::guard('web')->user()->avatar }}" class="rounded-circle img-radius" height="300px" width="300px" alt="User-Profile-Image" />
                    @else
                    <img src="https://zrsgaming.eu/zrs.png" class="rounded-circle img-radius" height="300px" width="300px" alt="User-Profile-Image" />
                    @endif
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown">

                    <div class="dropdown-item noti-title">
                        <h5>Welcome</h5>
                    </div><a class="dropdown-item" href="/user/profile"><i class="mdi mdi-account-circle m-r-5 text-muted"></i>
                        {{ Auth::guard('web')->user()->name ?? '' }}</a>
                    @if (Auth::guard('web')->user()->role == 'Company')
                    <a class="dropdown-item" href="{{ route('editprofilecompany') }}"><i class="mdi mdi-key-change m-r-5 text-muted"></i> Edit Profile</a>
                    @endif
                    @if (Auth::guard('web')->user()->role == 'Individual')
                    <a class="dropdown-item" href="{{ route('editprofileindividual') }}"><i class="mdi mdi-key-change m-r-5 text-muted"></i> Edit Profile</a>
                    @endif
                    <a class="dropdown-item" href="{{ route('change') }}"><i class="mdi mdi-key-change m-r-5 text-muted"></i> Change Password</a>
                    <div class="dropdown-divider"></div><a class="dropdown-item" href="/user/logout"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
                </div>
            </li>
        </ul>
        <ul class="list-inline menu-left mb-0">
            <li class="float-left"><button class="button-menu-mobile open-left waves-light waves-effect"><i class="mdi mdi-menu"></i></button></li>
            <li class="hide-phone app-search">
                <form role="search" class=""><input type="text" placeholder="Search..." class="form-control"> <a href="#"><i class="fa fa-search"></i></a></form>
            </li>
        </ul>
        <div class="clearfix"></div>
    </nav>
</div>
