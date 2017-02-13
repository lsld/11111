@if($user->role_id==3)

    {{-- Supplier breadcrumb are --}}
    <div class="page-bar supplier-pages">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            </li>
        </ul>
    </div>
    <h1 class="page-title">
    </h1>
    @include('layouts.message')

@elseif($user->role_id==2 || $user->role_id==1)

    {{-- Admin/Super Admin breadcrumb are --}}
    <div class="page-bar admin-pages">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            </li>
        </ul>
    </div>
    <h1 class="page-title">
    </h1>
    @include('layouts.message')

@elseif($user->role_id==4)

    {{-- Hirer breadcrumb are --}}
    <h1 class="page-title">
    </h1>
    @include('layouts.message')

@else

    @include('layouts.message')

@endif