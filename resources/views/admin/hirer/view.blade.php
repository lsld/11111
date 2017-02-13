
@if($hirer_list->count())
    @foreach($hirer_list as $hirer)
<form role="form" class="form-horizontal">
    {{--s- FORM FIELD--}}
    <div class="form-group">
        <label class="col-md-4 control-label">
            First Name
        </label>
        <div class="col-md-8">
            <p>{{$hirer->first_name}}</p>
        </div>
    </div>
    {{--e- FORM FIELD--}}


    {{--s- FORM FIELD--}}
    <div class="form-group">
        <label class="col-md-4 control-label">
            Last Name
        </label>
        <div class="col-md-8">
            <p>{{$hirer->last_name}}</p>
        </div>
    </div>
    {{--e- FORM FIELD--}}


    {{--s- FORM FIELD--}}
    <div class="form-group">
        <label class="col-md-4 control-label">
            Company Name
        </label>
        <div class="col-md-8">
            <p>{{$hirer->companies->name}}</p>
        </div>
    </div>
    {{--e- FORM FIELD--}}

    {{--s- FORM FIELD--}}
    <div class="form-group">
        <label class="col-md-4 control-label">
            Email
        </label>
        <div class="col-md-8">
            <p>{{$hirer->email}}</p>
        </div>
    </div>
    {{--e- FORM FIELD--}}

    {{--s- FORM FIELD--}}
    <div class="form-group">
        <label class="col-md-4 control-label">
            Phone
        </label>
        <div class="col-md-8">
            <p> {{$hirer->phone}}</p>
        </div>
    </div>
    {{--e- FORM FIELD--}}

    {{--s- FORM FIELD--}}
    <div class="form-group">
        <label class="col-md-4 control-label">
            Username
        </label>
        <div class="col-md-8">
            <p>{{$hirer->username}}</p>
        </div>
    </div>
    {{--e- FORM FIELD--}}



    {{--s- FORM FIELD--}}
    <div class="form-group">
        <label class="col-md-4 control-label">
            Operating States
        </label>
        <div class="col-md-8">
            <p>
                @php
                    $locations = $hirer->companies->locations;
                    foreach($locations as $state){
                        echo $state->states->name .'<br>';
                    }
                @endphp
            </p>
        </div>
    </div>
    {{--e- FORM FIELD--}}


    {{--s- FORM FIELD--}}
    <div class="form-group">
        <label class="col-md-4 control-label">
            Status
        </label>
        <div class="col-md-8">
            <p>{{$hirer->status}}</p>
        </div>
    </div>
    {{--e- FORM FIELD--}}

    <div class="modal-footer">
        <span id="supplier_location_edit_validation_message_area" class="help-block has-error" style="display: none; "></span>
        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
    </div>
</form>
    @endforeach
@endif




