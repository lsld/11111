@extends('layouts.master')

@section('content')

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper portal ">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">

        @include('partials.page_breadcrumb')

        <div class="wrap-ccf-form">
            <form action="" class="form-horizontal" method="POST">

                {{--{{ csrf_field() }}--}}
                <div class="portlet light bordered">
                    {{-- ================ PAGE HEADING ==================== --}}
                        <div class="wrap-ccf-page-title">
                           <h1 class="ccf-page-title">Add Location</h1>
                        </div>
                    {{-- ================ PAGE HEADING ==================== --}}

                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form action="#" class="form-horizontal">
                            <div class="form-body col-md-12 form-fileds-center">

                                @include('components.component-location')
                            </div>

                        </form>
                        <!-- END FORM-->
                    </div>
                </div>
            </form>
        </div>

    </div>
    <!-- END CONTENT BODY -->
</div>


@endsection