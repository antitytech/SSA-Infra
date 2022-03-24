<div class="topbar">
    <nav class="navbar-custom">
        @php
        $cout = \App\Models\RequestProject::count();
        @endphp
        <ul class="list-inline float-right mb-0">
            <li class="list-inline-item dropdown notification-list"><a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false"><i class="ti-bell noti-icon"></i> <span class="badge badge-success noti-icon-badge">{{ $cout }}</span></a>
                <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg" style="height: 300px; overflow: auto;">
                    <div class="dropdown-item noti-title">
                        <h5><span class="badge badge-danger float-right">{{ $cout }}</span>Notification</h5>
                    </div>
                    @php
                    $proje = \App\Models\RequestProject::get();
                    @endphp
                    @isset($proje)
                    @foreach ($proje as $projectre)
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon bg-primary"><img src="{{ asset('/images/' . $projectre->Image) }}" alt="" height="20px"></div>
                        <p class="notify-details"><b>{{ $projectre->name ?? '' }} Want to Access Your Project</b>
                            @if ($projectre->request_status == 1)
                            <td class="text-center"><span class="badge badge-success">Active</span></td>
                            @endif
                            @if ($projectre->request_status == 0)
                            <td class="text-center"><span class="badge badge-danger">Blocked</span></td>
                            @endif
                            <p class="text-center"><a href="/user-project-active/{{ $projectre->id }}" class="badge badge-success text-white" style="cursor: pointer;">Active</a>
                                <a href="/user-project-block/{{ $projectre->id }}" class="badge badge-danger text-white" style="cursor: pointer;">Block</a>
                            </p>
                        </p>
                    </a>
                    @endforeach
                    @endisset
                </div>
            </li>
            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#"
                    role="button" aria-haspopup="false" aria-expanded="false">

                        <img src="https://zrsgaming.eu/zrs.png" class="rounded-circle" />

                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown">

                    <div class="dropdown-item noti-title">
                        <h5>Welcome</h5>
                    </div><a class="dropdown-item"><i
                            class="mdi mdi-account-circle m-r-5 text-muted"></i> {{ Auth::guard('web')->user()->name }}</a>
                    <div class="dropdown-divider"></div><a class="dropdown-item" href="/admin/logout"><i
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
