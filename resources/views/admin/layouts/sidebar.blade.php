<div class="left side-menu"><button type="button"
        class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect"><i
            class="ion-close"></i></button>
            <div class="topbar-left">
                <div class="text-center"><a href="/" class="logo"><img src="{{ asset('images/ssa.png') }}"
                            style="height: 100px; " alt=""></a>
                </div>
            </div>
    <div class="sidebar-inner slimscrollleft">
        <div id="sidebar-menu">
            <ul>
                <li><a href="{{ route('admin.dashboard') }}" class="waves-effect"><i class="mdi mdi-airplay"></i>
                        <span>Dashboard</span></a></li>
                <li><a href="{{ route('admin.users') }}" class="waves-effect"><i class="mdi mdi-lumx"></i>
                        <span>All Users</span></a></li>
                <li><a href="{{ route('admin.individual.users') }}" class="waves-effect"><i
                            class="mdi mdi-lumx"></i> <span>Individual Users</span></a></li>
                <li><a href="{{ route('admin.company.users') }}" class="waves-effect"><i class="mdi mdi-lumx"></i>
                        <span>Company Users</span></a></li>
                <li><a href="{{ route('admin.management') }}" class="waves-effect"><i class="mdi mdi-lumx"></i>
                        <span>Request Management</span></a></li>
                <li><a href="{{ route('admin.logout') }}" class="waves-effect"><i
                            class="mdi mdi-power"></i><span>Logout</span></a></li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- end sidebarinner -->
</div>
