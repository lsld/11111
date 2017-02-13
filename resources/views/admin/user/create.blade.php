@extends('layouts.master-admin')

@section('content')

    @php
        $readonly = '';
        $readonly_select = '';
            if($current_role=='view'){
                $readonly = ' readonly="readonly" ';
                $readonly_select = ' disabled="disabled" ';
            }
    @endphp
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper create-admin-user portal">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">

            @include('partials.page_breadcrumb')

            <div class="wrap-ccf-form">
                <!-- FORM -->

                <div class="portlet light">
                    <div class="wrap-ccf-page-title">
                        <!-- BEGIN PAGE TITLE-->
                        @if($current_role=='view')
                            <h1 id="ccf-page-title-user-view" class="ccf-page-title">View admin user</h1>
                            <h1 id="ccf-page-title-user-edit" class="ccf-page-title" style="display: none;">Edit admin user</h1>
                        @elseif($current_role=='edit')
                            <h1 id="ccf-page-title-user-edit" class="ccf-page-title">Edit admin user</h1>
                        @else
                            <h1 class="ccf-page-title">Create admin user</h1>
                    @endif
                    <!-- END PAGE TITLE-->
                        <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae consequuntur nostrum officiis quis quisquam repudiandae ut voluptatum! Ab, at dolorem dolores facere, nesciunt optio praesentium quas quasi quibusdam repellendus reprehenderit.</p>
                    </div>






                    <div class="portlet-body form">
                        <div class="form-body">
                            @if($current_role=='view' || $current_role=='edit')
                                <form onsubmit="return formValidationGeneral('admin_user_update', '{{route('admin.user.validate_edit')}}');" action="{{ route('admin.user.update', $id) }}" id="admin_user_update" method="post" class="form-horizontal fo">
                                    @else
                                        <form onsubmit="return formValidationGeneral('admin_user_store', '{{route('admin.user.validate')}}');" action="{{ route('admin.user.store') }}" id="admin_user_store" method="post" class="form-horizontal fo">
                                            @endif
                                            {{ csrf_field() }}

                                            <div class="row col-md-12 form-fileds-center">
                                                <div class="col-md-6">
                                                    {{--s- FORM FIELD--}}
                                                    <div class="form-group {{ $errors->has('first_name')?'has-error':'' }}">
                                                        <label class="control-label">
                                                            First Name<span class="required" aria-required="true"> * </span>
                                                        </label>
                                                        <div class="">
                                                            @php
                                                                $first_name = '';
                                                                if(isset($user_data)){
                                                                    $first_name = $user_data->first_name;
                                                                }
                                                            @endphp
                                                            <input {{$readonly}} type="text" class="form-control" placeholder="" name="first_name" value="{{ old("first_name", $first_name) }}">
                                                            @if($errors->has('first_name'))
                                                                <span class="help-block has-error"> {{ $errors->first('first_name') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    {{--e- FORM FIELD--}}

                                                    {{--S- FORM FIELD--}}
                                                    <div class="form-group {{ $errors->has('last_name')?'has-error':'' }}">
                                                        <label class="control-label">Last Name
                                                            <span class="required" aria-required="true"> * </span></label>
                                                        <div class="">
                                                            @php
                                                                $last_name = '';
                                                                if(isset($user_data)){
                                                                    $last_name = $user_data->last_name;
                                                                }
                                                            @endphp
                                                            <input {{$readonly}} type="text" class="form-control" placeholder="" name="last_name" value="{{ old("last_name", $last_name) }}">
                                                            @if($errors->has('last_name'))
                                                                <span class="help-block has-error"> {{ $errors->first('last_name') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    {{--e- FORM FIELD--}}

                                                    <div class="form-group {{ $errors->has('state_id')?'has-error':'' }}">
                                                        <label class="control-label">State<span class="required" aria-required="true"> * </span></label>
                                                        <div>
                                                            @php
                                                                $state_id = array();
                                                                if(isset($user_data['admin_states_list'])){
                                                                    $state_id = $user_data['admin_states_list'];
                                                                }

                                                                if($enabled_states_list){
                                                                    $states = $states->whereIn('id' , $enabled_states_list);
                                                                }

                                                            @endphp
                                                            @include('dynamic.state_drop_down', [ 'multiple' =>true, 'states'=> $states, 'selected_val' => old('state_id', $state_id) ])

                                                            @if($errors->has('state_id'))
                                                                <span class="help-block has-error"> {{ $errors->first('state_id') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    {{--s- FORM FIELD--}}
                                                    <div class="form-group {{ $errors->has('email')?'has-error':'' }}">
                                                        <label class="control-label ">Email<span class="required" aria-required="true"> * </span></label>
                                                        <div class="">
                                                            @php
                                                                $email = '';
                                                                if(isset($user_data)){
                                                                    $email = $user_data->email;
                                                                }
                                                            @endphp
                                                            <input {{$readonly}} type="text" class="form-control" placeholder="email@example.com" name="email" value="{{ old("email", $email) }}"  @if($current_role!='create') disabled="disabled" @endif >
                                                            @if($errors->has('email'))
                                                                <span class="help-block has-error"> {{ $errors->first('email') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    {{--e- FORM FIELD--}}

                                                    {{--s- FORM FIELD--}}
                                                    <div class="form-group {{ $errors->has('phone')?'has-error':'' }}">
                                                        <label class="control-label ">Phone Number<span class="required" aria-required="true"> * </span></label>
                                                        <div class="">
                                                            @php
                                                                $phone = '';
                                                                if(isset($user_data)){
                                                                    $phone = $user_data->phone;
                                                                }
                                                            @endphp
                                                            <input {{$readonly}} type="text" class="form-control" placeholder="+61 491 570 159" name="phone" value="{{ old("phone", $phone) }}">
                                                            @if($errors->has('phone'))
                                                                <span class="help-block has-error"> {{ $errors->first('phone') }}</span>
                                                            @endif</div>
                                                    </div>
                                                    {{--e- FORM FIELD--}}



                                                </div>
                                                <div class="col-md-6">

                                                    <div class="form-group {{ $errors->has('admin_user_role')?'has-error':'' }}">
                                                        <label class="control-label ">User Role<span class="required" aria-required="true"> * </span></label>
                                                        <div class="">
                                                            @php
                                                                $admin_role=null;
                                                               if(isset($user_data['admin_user_role'])){
                                                                   $admin_role = $user_data['admin_user_role'];
                                                               }
                                                            @endphp

                                                            <select {{$readonly}} class="admin_user_role form-control" name="admin_user_role" id="admin_user_role">
                                                                <option value="" >Select</option>
                                                                @foreach($admin_user_role as $key=>$role)
                                                                    <option value="{{$role->id}}" {{$readonly_select}}
                                                                    @if(old('admin_user_role', $admin_role))
                                                                    selected="selected"
                                                                            @endif
                                                                    >
                                                                        {{$role->label}}</option>
                                                                @endforeach
                                                            </select>

                                                            @if($errors->has('admin_user_role'))
                                                                <span class="help-block has-error"> {{ $errors->first('admin_user_role') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    {{--s- FORM FIELD--}}
                                                    <div class="form-group {{ $errors->has('username')?'has-error':'' }}">
                                                        <label class="control-label ">Username<span class="required" aria-required="true"> * </span></label>
                                                        <div class="">
                                                            @php
                                                                $username = '';
                                                                if(isset($user_data)){
                                                                    $username = $user_data->username;
                                                                }
                                                            @endphp
                                                            <input {{$readonly}} type="text" class="form-control" placeholder="" name="username" value="{{ old("username", $username) }}" @if($current_role!='create') disabled="disabled" @endif >
                                                            @if($errors->has('username'))
                                                                <span class="help-block has-error"> {{ $errors->first('username') }}</span>
                                                            @endif</div>
                                                    </div>
                                                    {{--e- FORM FIELD--}}

                                                    @if($current_role=='create')
                                                        <div class="form-group {{ $errors->has('password')?'has-error':'' }}">
                                                            <label class="control-label ">Password<span class="required" aria-required="true"> * </span></label>
                                                            <div class="">
                                                                <input type="password" class="form-control" placeholder="Minimum 6 Characters" name="password">
                                                                @if($errors->has('password'))
                                                                    <span class="help-block has-error"> {{ $errors->first('password') }}</span>
                                                                @endif</div>
                                                        </div>
                                                        {{--e- FORM FIELD--}}

                                                        {{--s- FORM FIELD--}}
                                                        <div class="form-group {{ $errors->has('password_confirmation')?'has-error':'' }}">
                                                            <label class="control-label ">Confirm Password<span class="required" aria-required="true"> * </span></label>
                                                            <div class="">
                                                                <input type="password" class="form-control" placeholder="Minimum 6 Characters" name="password_confirmation">
                                                                @if($errors->has('password_confirmation'))
                                                                    <span class="help-block has-error"> {{ $errors->first('password_confirmation') }}</span>
                                                                @endif</div>
                                                        </div>
                                                    @endif
                                                    {{--e- FORM FIELD--}}
                                                </div>
                                            </div>
                                            {{--e- FORM FIELD--}}
                                            <div class="form-actions col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12 txt-right clearfix">
                                                        <span id="validation_message_area" class="help-block has-error" style="display: none; "></span>
                                                        <a href="{{route('admin.user.list')}}" class="btn theme-btn " >Cancel</a>

                                                        @if($current_role=='view')
                                                            <button onclick="enableEditProcess();" id="edit_button" type="button" class="btn theme-btn">Edit</button>
                                                            <button type="reset" id="reset_button" class="btn theme-btn " style="display: none;">Reset</button>
                                                            <button type="submit" id="update_button" class="btn theme-btn " style="display: none;">Update</button>
                                                        @elseif($current_role=='edit')
                                                            <button type="reset" id="reset_button" class="btn theme-btn ">Reset</button>
                                                            <button type="submit" id="edit_button" class="btn theme-btn ">Update</button>
                                                        @else
                                                            <button type="submit" class="btn theme-btn">Create</button>
                                                        @endif


                                                        {{-- <button type="button" class="btn default">Cancel</button>--}}
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- END CONTENT BODY -->
    </div>

@endsection