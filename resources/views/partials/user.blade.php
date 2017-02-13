<!-- BEGIN USER LOGIN DROPDOWN -->
<li class="dropdown dropdown-user">
    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
        <img alt="" class="img-circle" src="/assets/layouts/layout/img/silhouette.jpg" />
<!--        <img alt="" class="img-circle" src="/uploads/avatar/{{ user()->avatar}}" />-->
        <span class="username username-hide-on-mobile"> {{ user()->first_name}} {{ user()->last_name}} </span>
        <i class="fa fa-angle-down"></i>
    </a>
    <ul class="dropdown-menu dropdown-menu-default">
        <li>
            <a href="page_user_profile_1.html">
                <i class="icon-user"></i> My Profile </a>
        </li>
        {{--<li>
            <a href="app_calendar.html">
                <i class="icon-calendar"></i> My Calendar </a>
        </li>
        <li>
            <a href="app_inbox.html">
                <i class="icon-envelope-open"></i> My Inbox
                <span class="badge badge-danger"> 3 </span>
            </a>
        </li>
        <li>
            <a href="app_todo.html">
                <i class="icon-rocket"></i> My Tasks
                <span class="badge badge-success"> 7 </span>
            </a>
        </li>--}}
        <li class="divider"> </li>
        {{--<li>
            <a href="page_user_lock_1.html">
                <i class="icon-lock"></i> Lock Screen </a>
        </li>--}}
        <li>
            <a href="{{url('/logout')}}">
                <i class="icon-key"></i> Log Out </a>
        </li>
    </ul>
</li>
<!-- END USER LOGIN DROPDOWN -->