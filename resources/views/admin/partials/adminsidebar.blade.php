<div class="page-sidebar-wrapper admin-sidebar">
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
            <?php /* ?>
                <li class="nav-item  ">
                    <a href="{{ route('job-request')}}" class="nav-link {{ isActiveRoute('job-request') }}">
                        <i class="icon-paper-clip"></i>
                        <span class="title">Job Requests</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="{{ route('supplier_quotes', uid(tenant())) }}" class="nav-link {{ isActiveRoute('supplier_quotes') }}">
                        <i class="icon-question"></i>
                        <span class="title">My Quotes</span>
                    </a>
                </li>
            <?php */ ?>

            <li class="nav-item  ">
                <a href="{{ route('admin.user.list')}}" class="nav-link {{ isActiveRoute(['admin.user.list', 'admin.user.create', 'admin.user.view', 'admin.user.edit']) }}">
                   <i class="fa fa-users" aria-hidden="true"></i>
                    <span class="title">Manage Users</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="{{ route('admin.supplier.list')}}" class="nav-link {{ isActiveRoute(['admin.supplier.list']) }}">
                   <i class="fa fa-users" aria-hidden="true"></i>
                    <span class="title">Manage Suppliers</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="{{ route('admin.hirer.list')}}" class="nav-link {{ isActiveRoute(['admin.hirer.list']) }}">
                     <i class="fa fa-user" aria-hidden="true"></i>
                    <span class="title">Manage Hirer</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="{{ route('admin.dashboard')}}" class="nav-link {{ isActiveRoute([]) }}">
                    <i class="fa fa-usd" aria-hidden="true"></i>
                    <span class="title">Manage Subscriptions</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="{{ route('admin.code.list')}}" class="nav-link {{ isActiveRoute(['admin.code.list']) }}">
                    <i class="fa fa-barcode" aria-hidden="true"></i>
                    <span class="title">Manage Promo codes</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="{{ route('admin.quotes.list')}}" class="nav-link {{ isActiveRoute(['admin.quotes.list']) }}">
                    <i class="fa fa-file-excel-o" aria-hidden="true"></i>
                    <span class="title">Manage Quotes</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="{{ route('admin.jobRequest.list')}}" class="nav-link {{ isActiveRoute(['jobRequests']) }}">
                    <i class="fa fa-file-text-o" aria-hidden="true"></i>
                    <span class="title">Manage Job Requests</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="{{ route('admin.dashboard')}}" class="nav-link {{ isActiveRoute([]) }}">
                   <i class="fa fa-cogs" aria-hidden="true"></i>
                    <span class="title">Manage Account</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="{{ route('admin.dashboard')}}" class="nav-link {{ isActiveRoute([]) }}">
                    <i class="fa fa-file-text-o" aria-hidden="true"></i>
                    <span class="title">Reports</span>
                </a>
            </li>

        </ul>
        <!-- END SIDEBAR MENU -->
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
