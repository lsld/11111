@if($quotes->count())
    @foreach($quotes as $quote)
<div class="modal-body">

    {{--s- FORM FIELD--}}
    <div class="form-group">
        <label class="control-label col-md-4">
            Request :
        </label>
        <div class="col-md-8">
                <p>{{$quote->JobRequest->id}}</p>
        </div>
    </div>
    {{--e- FORM FIELD--}}

    {{--s- FORM FIELD--}}
    <div class="form-group">
        <label class="control-label col-md-4">
            Quote :
        </label>
        <div class="col-md-8">
            <p>{{$quote->code}}</p>
        </div>
    </div>
    {{--e- FORM FIELD--}}

    {{--s- FORM FIELD--}}
    <div class="form-group">
        <label class="control-label col-md-4">
            Quote Price :
        </label>
        <div class="col-md-8">
            <p>{{$quote->price}}</p>
        </div>
    </div>
    {{--e- FORM FIELD--}}


    {{--s- FORM FIELD--}}
    <div class="form-group">
        <label class="control-label col-md-4">
            Company Name :
        </label>
        <div class="col-md-8">
            <p> {{$quote->company->name}}</p>
        </div>
    </div>
    {{--e- FORM FIELD--}}


    {{--s- FORM FIELD--}}
    <div class="form-group">
        <label class="control-label col-md-4">
            Date Submitted :
        </label>
        <div class="col-md-8">
            <p>{{$quote->created_at}}</p>
        </div>
    </div>
    {{--e- FORM FIELD--}}

    {{--s- FORM FIELD--}}
    <div class="form-group">
        <label class="control-label col-md-4">
            Quote Expiration Date :
        </label>
        <div class="col-md-8">
            <p>{{$quote->expiry_date}}</p>
        </div>
    </div>
    {{--e- FORM FIELD--}}

    {{--s- FORM FIELD--}}
    <div class="form-group">
        <label class="control-label col-md-4">
            Request Expiration Date :
        </label>
        <div class="col-md-8">
            <p>{{$quote->JobRequest->expiry_date}}</p>
        </div>
    </div>
    {{--e- FORM FIELD--}}

    {{--s- FORM FIELD--}}
    <div class="form-group">
        <label class="control-label col-md-4">
            Status :
        </label>
        <div class="col-md-8">
            <p>{{$quote->status}}</p>
        </div>
    </div>
    {{--e- FORM FIELD--}}
</div>
    @endforeach
@endif
