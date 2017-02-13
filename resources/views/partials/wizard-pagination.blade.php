<div class="row">
    <div class="wrap-registration-steps col-md-10 center-align">
        <ul class="registration-steps clearfix">
                @foreach(Session::get('registrationData') as $key=>$regData)
                        <li class="{{$key}}
                                @if(Request::route()->getName() == $key)
                                        {{"current-step"}}
                                @elseif($regData=='added')
                                        {{"completed-step"}}
                                @elseif($regData=='skipped')
                                        {{"skipped-step"}}
                                @else

                                @endif step-">
                                <h5>{{\App\Constants\RegistrationSteps::registrationSteps[$key]}}</h5>
                        </li>
                @endforeach
        </ul>
        <div id="bar" class="progress progress-striped @foreach(Session::get('progessPoints') as $key2 => $value2) {{$value2}} @endforeach " role="progressbar">
            <div class="progress-bar progress-bar-success"></div>
        </div>
    </div>
</div>
