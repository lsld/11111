$(document).ready(function () {

    var y=0;
    $('.subscription-plan').each(function(){
        var xx =$(this).width()+35;
        console.log(xx);
        y = y + xx;
    })
    //console.log(y);
    $('.wrap-subscription-plans-scroller').css('width',y+"px");

    $('#machinetype').on("change",function(){
       if(this.value=="skidsteer"){
           $('.rollerself').hide();
           $('.skidsteer').hide();
           $('.skidsteer').toggle();
       }
        else{
           $('.rollerself').hide();
           $('.skidsteer').hide();
           $('.rollerself').toggle();
       }
    });
    $('.toggle-credit-card').on("click",function(){
        $('.wrap-credit-card-details').slideToggle();
    });

    $('#forgotpassword').on('submit',function(e){
        $.ajaxSetup({
            header:$('meta[name="_token"]').attr('content')
        })
        e.preventDefault(e);
        var button = $('#send');
        button.prop('disabled', true);

        $.post("/password/email", $('#forgotpassword').serialize(), function(data){
            console.log(data.status);

            var x = document.forms["forgotpassword"]["email"].value;
            var atpos = x.indexOf("@");
            var dotpos = x.lastIndexOf(".");
            if(x == ""){
                $("#resetpassword .has-error span.help-block").remove();
                $("#email").after("<span class='help-block '>The email field is required.</span>");
                $("#email").parent('div').addClass("has-error");
                button.prop('disabled', false);
                return false;
            }
            if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
                $("#resetpassword .has-error span.help-block").remove();
                $("#email").parent('div').addClass("has-error");
                $("#email").after("<span class='help-block '>The email must be a valid email address.</span>");
                button.prop('disabled', false);
                return false;
            }
            if(data.status == "SUCCESS")
            {
                $('#email').val("");
                $("#resetpassword .has-error span.help-block").remove();
                button.prop('disabled', false);
                $("#email").after("<span class='help-block message-box alert alert-success'>Reset link has been sent to you email address.</span>");
                setTimeout(function() { $('#resetpassword').modal('hide'); }, 3000);
            }else {
                $("#resetpassword .has-error span.help-block").remove();
                $("#email").parent('div').addClass("has-error");
                $("#email").after("<span class='help-block'>We can't find a user with that e-mail address.</span>");
                button.prop('disabled', false);
                $('#resetpassword').modal('show');
            }
        });

    });

    $('.edit-carousel').on('click',function(){
        $(this).parent().find('.gallery').slideToggle();
    })

    // Instantiate the Bootstrap carousel
    /*$('.multi-item-carousel').carousel({
        interval: true
    });*/

// for every slide in carousel, copy the next slide's item in the slide.
// Do the same for the next, next item.
    $('.multi-item-carousel .item').each(function(){
        var next = $(this).next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));

        if (next.next().length>0) {
            next.next().children(':first-child').clone().appendTo($(this));
        } else {
            $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
        }
    });

    $(".services input").on("click",function(){
        $(this).parents(".wrap-checkbox").toggleClass("select-category","");
    })


    $('.states input').each(function(){
        var state = $(this).attr('state');
        var jobtype = $(this).attr('jobtype');
        console.log("STATE "+state+" "+"JOBTYPE "+jobtype);
        $("."+state+'-regions-'+jobtype).slideToggle();
        //console.log("parent "+$(this).attr('type'))
        if($(this).parents(".wrap-checkbox").hasClass("select-"+state)){
            var x=($("."+state+'-regions-'+jobtype).find('.notification-section').children().size()-1)*52+10+"px";
            $(".select-"+state).animate({
                marginBottom:x
            });
            //console.log('x'+x)
            //$(".select-"+state).css("marginBottom",($("."+state+'-regions-'+jobtype).find('.notification-section').children().size()-1)*52+10+"px");
            //console.log("Pass "+state+" "+jobtype);
            //console.log("Child "+$("."+state+'-regions-'+jobtype).find('.notification-section').children().size());
        }else{
            $("."+state+'-regions-'+jobtype).hide();
        }

    })

    $('.states input').on("click",function(){
        var state = $(this).attr('state');
        var jobtype = $(this).attr('jobtype');
        //console.log(state+" "+jobtype);


        $("."+state+'-regions-'+jobtype).slideToggle(function(){
           // setStateHeight(state,jobtype);
            //console.log("state: "+state);
        });
        //$("."+state+'-regions-'+jobtype).parent().toggleClass('reduce-min-height',"");
        //console.log("THIS "+$(this).attr('type'));

        $(this).parents(".wrap-checkbox").toggleClass("select-"+state,"").promise().done(function(){
            //console.log("has class "+$(this).hasClass("select-"+state));
            console.log("xx+xx ");
            if($(this).hasClass("select-"+state)){
                console.log("xxxxxxxxxxxx")
                var x=($("."+state+'-regions-'+jobtype).find('.notification-section').children().size()-1)*52+10+"px";
                $(this).animate({
                    marginBottom:x
                });
                //console.log('x'+x)
                //$(".select-"+state).css("marginBottom",($("."+state+'-regions-'+jobtype).find('.notification-section').children().size()-1)*52+10+"px");
                //console.log("Pass "+state+" "+jobtype);
                //console.log("Child "+$("."+state+'-regions-'+jobtype).find('.notification-section').children().size());
            }else{
                var x=10+"px";
                $(this).animate({
                    marginBottom:x
                });
                //console.log("Fail");
            }
            //console.log($("."+state+'-regions-'+jobtype).children().size());
        });
        //console.log("this parent: "+$(this).parents(".wrap-checkbox").attr('class'))
        //console.log("State"+" : "+state);
    })



    $('.regions-in-state input').on("click",function(){
        var state = $(this).attr('state')

        $(this).parents(".wrap-checkbox").toggleClass("select-"+state,"");
        //console.log("State"+" : "+state);
    })


    function setStateHeight(state,jobtype){
        console.log($("."+state+'-regions-'+jobtype).height());
    }

    // Instantiate the Bootstrap carousel
    $('.multi-item-carousel').carousel({
        interval: false
    });

// for every slide in carousel, copy the next slide's item in the slide.
// Do the same for the next, next item.
    $('.multi-item-carousel .item').each(function(){
        var next = $(this).next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));

        if (next.next().length>0) {
            next.next().children(':first-child').clone().appendTo($(this));
        } else {
            $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
        }
    });

    $('#state_id').change(function(){

        $('#regions_id').val("");
        $('.region_list_options').hide();
        var id = $('#state_id').val();
        $('.region_list_option_state_'+id).show();
    });



    $('input').focus(function () {
        $(this).parent().parent().removeClass('has-error');
        $(this).parent().parent().parent().parent().removeClass('has-error');
        $(this).next("span.has-error").remove();
    });
    $('select').focus(function () {
        $(this).parent().parent().removeClass('has-error');
        $(this).next("span.has-error").remove();
    });
    $('textarea').focus(function () {
        $(this).parent().parent().removeClass('has-error');
        $(this).next("span.has-error").remove();
    });
    $('.select2-selection__rendered').focus(function(){
        $(this).parent().parent().parent().parent().parent().removeClass('has-error');
    });

    $('.get-select-state').change(function(){
        console.log($(this).find('option:selected').text()+" "+$(this).find('option:selected').index());
        $('.set-select-state label').remove();
        $('.set-select-state').append('<label><i>'+ $(this).find('option:selected').text()+'</i></label>')
        if($(this).find('option:selected').index()!=0){
            $('.up-close').show();
        }else{
            $('.up-close').hide();
        }
    });

    $('.jc-reload').on("click",function(){
        setTimeout(function() {
            window.reloadjCarousel();
        }, 100);
    })

});



/* end of document.ready */

function formValidationGeneral( formId, url){

    $('#validation_message_area').html('Please wait...').show();
    $('button[type=submit]').prop("disabled", true);

    $.ajax({
        type : 'POST',
        dataType: 'json',
        url : url,
        data : $('#'+formId).serialize(),
        success:function(result){

            $('#validation_message_area').html('Validation complete');

            $('#'+formId).removeAttr('onsubmit').submit();

        },
        error: function(result) {

            $("#response").html(result);

            var data = result.responseJSON;

            setErrorMessageToFields(data);

            $('button[type=submit]').prop("disabled", false);
            $('#validation_message_area').hide();

            return false;
        }
    });
    return false;
}

function modalSave(url){
    $.ajax({
        type: 'post',
        url: url,
        data : $('#my_account_edit').serialize(),
        success: function(){
           // console.log(data);
            alert('form was submitted');
        },
        error: function(){
            alert("in");
            location.reload(true);
        }
    });
}

function modalMyAccountFormValidationAndSave(formId, url){
     var  _token = $('input[name=_token]').val();
     var first_name = $('input[name=first_name]').val();
     var last_name = $('input[name=last_name]').val();
     var phone = $('input[name=phone]').val();
     var company_name = $('input[name=company_name]').val();
     var street_address = $('input[name=street_address]').val();
     var suburb = $('input[name=suburb]').val();
     var post_code = $('input[name=post_code]').val();

     var states_id = $("#states_id").val();
     var regions_id = $("#regions_id").val();

     var data = "_token="+_token+"&first_name="+first_name+"&last_name="+last_name+"&phone="+phone+"&company_name="+company_name+"&street_address="+street_address+"&suburb="+suburb+"&post_code="+post_code+"&states_id="+states_id+"&regions_id="+regions_id;


    $('#'+formId+'_validation_message_area').html('Please wait...').show();
    $('button[type=submit]').prop("disabled", true);

    $.ajax({
        type : 'POST',
        dataType: 'json',
        url : url,
        data :data,

        success:function(result){
            $('#'+formId+'_validation_message_area').html('Successfully Inserted.');
            $('button[type=submit]').prop("disabled", false);

            location.reload(true);
        },
        error: function(result){

            $("#response").html(result);

            var data = result.responseJSON;

            setErrorMessageToFields(data);

            $('button[type=submit]').prop("disabled", false);
            $('#'+formId+'_validation_message_area').hide();

            return false;
        }
    });
    return false;
}


function modalFormValidationAndSave(formId, url){

    $('#'+formId+'_validation_message_area').html('Please wait...').show();
    $('button[type=submit]').prop("disabled", true);

    $.ajax({
        type : 'POST',
        dataType: 'json',
        url : url,
        data : $('#'+formId).serialize(),


        success:function(result){
            $('#'+formId+'_validation_message_area').html('Successfully Inserted.');
            $('button[type=submit]').prop("disabled", false);

            location.reload(true);
        },
        error: function(result){

            $("#response").html(result);

            var data = result.responseJSON;

            setErrorMessageToFields(data);

            $('button[type=submit]').prop("disabled", false);
            $('#'+formId+'_validation_message_area').hide();

            return false;
        }
    });
    return false;
}


/* Save and continue */
function modalFormValidationAndSaveAndCnt( formId, url){

    $('#'+formId+'_validation_message_area').html('Please wait...').show();
    $('button[type=submit]').prop("disabled", true);

    $.ajax({
        type : 'POST',
        dataType: 'json',
        url : url,
        data : $('#'+formId).serialize(),
        success:function(result){

            //show success message after successfull save
            $('#'+formId+'_validation_message_area').html('Successfully Inserted.');
            $('button[type=submit]').prop("disabled", false);

            $('#location').find('form')[0].reset();
            $('#regions_id').html('');


            //hide the message area
            $('#'+formId+'_validation_message_area').hide();

        },
        error: function(result) {

            $("#response").html(result);

            var data = result.responseJSON;
            setErrorMessageToFields(data);

            $('button[type=submit]').prop("disabled", false);
            $('#'+formId+'_validation_message_area').hide();

            return false;
        }
    });
    return false;
}

function modalFormEdit(formId,url){
    /* show message */
    $('#editFormContent').html('Please wait...').show();

    /* load edit view */
        $.ajax({
            type:'GET',
            url: url,

            success:function(html){

                $('#'+formId).html(html);
            }
        });
}

function modalFormView(formId,url){
    /* show message */
    $('#viewFormContent').html('Please wait...').show();

    /* load edit view */
    $.ajax({
        type:'GET',
        url: url,

        success:function(html){

            $('#'+formId).html(html);
        }
    });
}


function setErrorMessageToFields(data){
    $.each(data, function(key, value){

        var error_text = "";
        $.each(value, function(key2, value2){
            console.log(key, value2);
            if(error_text.trim()){
                error_text = error_text + '<br>';
            }
            error_text = error_text + value2;
        });

        var type = $('input[name='+key+']').attr('type');

        if(type=='text'){

            $('input[name='+key+']').parent().parent().addClass('has-error');
            $('input[name='+key+']').next("span.has-error").remove();
            $('input[name='+key+']').after('<span class="help-block has-error">'+error_text+'</span>');

        }else if(type=='radio'){

            $('input[name='+key+']').parent().parent().parent().parent().addClass('has-error');
           /// $('.mt-radio-list').next("span.has-error").remove();
            $('.mt-radio-list').append('<span class="help-block has-error">'+error_text+'</span>');

        }

        $('select[id='+key+']').parent().parent().addClass('has-error');

        $('select[name='+key+']').parent().parent().addClass('has-error');
        $('select[name='+key+']').next("span.has-error").remove();
        $('select[name='+key+']').after('<span class="help-block has-error">'+error_text+'</span>');

        $('textarea[name='+key+']').parent().parent().addClass('has-error');
        $('textarea[name='+key+']').next("span.has-error").remove();
        $('textarea[name='+key+']').after('<span class="help-block has-error">'+error_text+'</span>');

    });
}


function enableEditProcess() {
    $('#edit_button').hide();
    $('input').attr("readonly", false);
    $('select').attr("readonly", false);
    $('select option').attr('disabled', false);
    $('#reset_button').show();
    $('#update_button').show();
    $(".select2-multiple").select2();
}


/*accordion behave*/
$('.accordion-item-header').on('click',function(){
    var parent=$(this).parent().hasClass('active');

    console.log(!parent);
    if(!parent) {
        $(this).parent().parent().find('.active').find($('.accordion-item-body')).slideToggle();
        $(this).parent().parent().find('.active').removeClass('active');
    }

    $(this).parent().toggleClass('active');

    $(this).next().slideToggle();

})
function view_location_modal(id){
    
}