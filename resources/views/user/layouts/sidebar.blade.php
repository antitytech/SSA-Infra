<div class="left side-menu"><button type="button"
        class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect"><i
            class="ion-close"></i></button>
    <!-- LOGO -->
    <div class="topbar-left">
        <div class="text-center"><a href="index.html" class="logo"><i class="mdi mdi-assistant"></i> SSA
                INFRA</a>
        </div>
    </div>
    <div class="sidebar-inner slimscrollleft">
        <div id="sidebar-menu">
            <ul>
                <li class="menu-title">Main</li>
                <li><a href="{{ route('dashboard') }}" class="waves-effect"><i class="mdi mdi-airplay"></i>
                        <span>Dashboard</span></a></li>
                <li><a href="{{ route('company') }}" class="waves-effect"><i class="mdi mdi-lumx"></i> <span>My
                            Company</span></a></li>
                <li><a href="{{ route('platforms') }}" class="waves-effect"><i class="mdi mdi-poll-box"></i><span>My
                            Platforms</span></a></li>
                <li><a href="{{ route('projects') }}" class="waves-effect"><i class="mdi mdi-rename-box"></i>
                        <span>My Projects</span></a></li>
                <li><a href="{{ route('investments') }}" class="waves-effect"><i class="fa fa-dollar"></i><span>My
                            Investments</span></a></li>
                <li><a href="{{ route('transactions') }}" class="waves-effect"><i
                            class="fa fa-dollar"></i><span>Ongoing Transactions</span></a></li>
                <li><a href="{{ route('opportunities') }}" class="waves-effect"><i
                            class="mdi mdi-book-multiple"></i><span>Opportunities</span></a></li>
                <li><a href="{{ route('management') }}" class="waves-effect"><i
                            class="mdi mdi-book-multiple"></i><span>Request Management</span></a></li>
                <li><a href="{{ route('logout') }}" class="waves-effect"><i
                            class="mdi mdi-power"></i><span>Logout</span></a></li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- end sidebarinner -->
</div>
