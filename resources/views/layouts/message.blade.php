@if (count($errors) > 0 || session('message'))

        @if(session('message.info'))
            <div class="message-box alert alert-info">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <i class="fa fa-info-circle" aria-hidden="true"></i> {{session('message.info')}}
            </div>
        @endif

        @if(session('message.warning'))
            <div class="message-box alert alert-warning">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> {{session('message.warning')}}
            </div>
        @endif

        @if(session('message.success'))
            <div class="message-box alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <i class="fa fa-check" aria-hidden="true"></i> {{session('message.success')}}
            </div>
        @endif

        @if(session('message.error'))
            <div class="message-box alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <i class="fa fa-times" aria-hidden="true"></i> {{session('message.error')}}
            </div>
        @endif

@endif
