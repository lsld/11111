@foreach($QuotesTableData as $quote)
        <div class="modal-body">
            <div class="form-group">
                <label class="control-label col-md-4">Quote Id:</label>
                <div class="col-md-8">
                    <p> {{$quote->id}}</p>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-4">Price :</label>
                <div class="col-md-8">
                    <p>{{$quote->price}}</p>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-4">Quote Description:</label>
                <div class="col-md-8">
                    <p>{{$quote->description}}</p>
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-md-4">Quote Expiry Date:</label>
                <div class="col-md-8">
                    <p>{{$quote->expiry_date}}</p>
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-md-4">Quote Submitted Date:</label>
                <div class="col-md-8">
                    <p>{{$quote->created_at}}</p>
                </div>
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close
            </button>
        </div>
@endforeach
