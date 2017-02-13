<div class="modal-body">

    {{--s- FORM FIELD--}}
    <div class="form-group">
        <label class="control-label col-md-4">
            Request No :
        </label>
        <div class="col-md-8">
                <p>{{$jobRequest->id}}</p>
        </div>
    </div>
    {{--e- FORM FIELD--}}

    {{--s- FORM FIELD--}}
    <div class="form-group">
        <label class="control-label col-md-4">
            Required Date :
        </label>
        <div class="col-md-8">
                <p>{{$jobRequest->required_date}}</p>
        </div>
    </div>
    {{--e- FORM FIELD--}}

    {{--s- FORM FIELD--}}
    <div class="form-group">
        <label class="control-label col-md-4">
            Job Type :
        </label>
        <div class="col-md-8">
                <p>{{$jobRequest->jobType->name}}</p>
        </div>
    </div>
    {{--e- FORM FIELD--}}

    {{--s- FORM FIELD--}}
    <div class="form-group">
        <label class="control-label col-md-4">
            State :
        </label>
        <div class="col-md-8">
                <p>{{$jobRequest->state->name}}</p>
        </div>
    </div>
    {{--e- FORM FIELD--}}

    {{--s- FORM FIELD--}}
    <div class="form-group">
        <label class="control-label col-md-4">
            Region :
        </label>
        <div class="col-md-8">
                <p>{{$jobRequest->regions->name}}</p>
        </div>
    </div>
    {{--e- FORM FIELD--}}

    {{--s- FORM FIELD--}}
    <div class="form-group">
        <label class="control-label col-md-4">
            Created Date :
        </label>
        <div class="col-md-8">
                @if(isset($jobRequest->created_at))
                    <p>{{$jobRequest->created_at}}</p>
                @else
                    <p>Not Available.</p>
                @endif
        </div>
    </div>
    {{--e- FORM FIELD--}}

    {{--s- FORM FIELD--}}
    <div class="form-group">
        <label class="control-label col-md-4">
            Expiry Date :
        </label>
        <div class="col-md-8">
                <p>{{$jobRequest->expiry_date}}</p>
        </div>
    </div>
    {{--e- FORM FIELD--}}

    {{--s- FORM FIELD--}}
    <div class="form-group">
        <label class="control-label col-md-4">
            Status :
        </label>
        <div class="col-md-8">
                <p>{{$jobRequest->status}}</p>
        </div>
    </div>
    {{--e- FORM FIELD--}}

</div>