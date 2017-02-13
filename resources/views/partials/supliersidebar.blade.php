
<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler">
                    <span></span>
                </div>
            </li>
            <!-- END SIDEBAR TOGGLER BUTTON -->
            <li class="nav-item">
                <a href="{{ url('/dashboard/supplier') }}" class="nav-link {{isActiveUrl('/dashboard/supplier') }}">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="{{ route('job-request')}}" class="nav-link {{ isActiveRoute('job-request') }}">
                    <i class="icon-paper-clip"></i>
                    <span class="title">Job Requests</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="{{ route('supplier_quotes', uid(tenant())) }}" class="nav-link {{ isActiveRoute('supplier_quotes') }}" >
                    <i class="icon-question"></i>
                    <span class="title">My Quotes</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="{{ route('my-job-request')}}" class="nav-link {{ isActiveRoute(['my-job-request', 'hirer-portal-fill-edit', 'hirer-portal-material-edit', 'hirer-portal-services-edit', 'hirer-portal-plant-hire-edit', 'view-my-job-request']) }}">
                    <i class="icon-paper-plane"></i>
                    <span class="title">My Job Requests</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="{{ route('show_services', uid(tenant())) }}" class="nav-link {{ isActiveRoute('show_services') }}" >
                    <i class="icon-puzzle"></i>
                    <span class="title">My Services</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="{{ route('company.profile', uid(tenant())) }}" class="nav-link {{ isActiveRoute('company.profile') }}" >
                    <i class="icon-briefcase"></i>
                    <span class="title">Company Profile</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="{{ route('show_supplier_my_account', uid(tenant())) }}" class="nav-link {{ isActiveRoute('show_supplier_my_account') }}">
                    <i class="icon-settings"></i>
                    <span class="title">My Account</span>
                </a>
            </li>

            <li class="nav-item  ">
                <a href="{{ route('show_supplier_location', uid(tenant())) }}" class="nav-link {{ isActiveRoute('show_supplier_location') }}">
                    <i class="icon-settings"></i>
                    <span class="title">My Location</span>
                </a>
            </li>

            <li class="nav-item  ">
                <a href="{{ route('view_supplier_notifications', uid(tenant())) }}" class="nav-link {{ isActiveRoute('view_supplier_notifications') }}">
                    <i class="icon-bell"></i>
                    <span class="title">Notification settings</span>
                </a>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
