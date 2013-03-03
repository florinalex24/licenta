//login form function
(function($){
$.fn.loginForm = function(options) {
  var this_form = $(this);
  $(this).submit(function(){
    //check_credentials
    var credentials = $(this).serializeArray();
    $.post('jq_php/check_user_login.php',{credentials:credentials},function(data){
      var response = jQuery.parseJSON(data);
      if(response.err==0){
        window.location="main.php";
      }
      else{
        addErrorForm(errorMessage.wrong_credentials,this_form);
      }
    });
    return false; 
  })
}            
}(jQuery));

(function($){
$.fn.recoverForm = function(options) {
  var this_form = $(this);
  $(this).submit(function(){
    //check_credentials
    var credentials = $(this).serializeArray();
    $.post('jq_php/recover_password.php',{credentials:credentials},function(data){
      var response = jQuery.parseJSON(data);
      if(response.err==0){
        $(".recover_hash a").attr("href","index.php?recover="+response.hash);
        $(".recover_hash").show("slow");
      }
      else{
        addErrorForm(errorMessage.wrong_credentials,this_form);
      }
    });
    return false; 
  })
}            
}(jQuery));


//validation form on blur
(function($){
$.fn.validateUserForm = function(options) {
    var defaults = {
      type: ''
    }
    var options = $.extend(defaultStatus, options);
    var inputs = $(this).find('input');
    
    jQuery.each(inputs, function() {
        var inputName = $(this).attr('name');
        var validateType = $(this).attr('rel');
        var type=options.type;
        
        $(this).blur(function(){
            if($(this).hasClass('required')){
                if($(this).val() == ''){
                    addError(errorMessage.empty,inputName);
                }
                else{
                    removeError(errorMessage.empty,inputName);
                    if($(this).hasClass('name')){
                        var input = /^[a-zA-z0-9_]+$/;
                        if(!$(this).val().match(input)){
                            addError(errorMessage.email,inputName);
                        }
                        else{
                            var response ='';
                            $.ajaxSetup({async: false});              
                            $.post('jq_php/check_unique_field.php',{type:"uname",uname:$(this).val()},function(data){
                                response = jQuery.parseJSON(data);
                            })
                            $.ajaxSetup({async: true});
                            if(response.err==1){
                               addError(errorMessage.doubles_name,inputName);
                            }
                            else if(response.err=='ok'){
                              removeError(errorMessage.doubles_name,inputName);
                            }
                        }
                    }
                    if($(this).hasClass('email')){
                        var input = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                        if(!$(this).val().match(input)){
                            addError(errorMessage.email,inputName);
                        }
                        else{
                            var response ='';
                            $.ajaxSetup({async: false});              
                            $.post('jq_php/check_unique_field.php',{type:"uemail",uemail:$(this).val()},function(data){
                                response = jQuery.parseJSON(data);
                            })
                            $.ajaxSetup({async: true});
                            if(response.err==1){
                               addError(errorMessage.doubles_email,inputName);
                            }
                            else if(response.err=='ok'){
                              removeError(errorMessage.doubles_email,inputName);
                            }
                        }
                    }
                    if($(this).hasClass('password')){
                        var pass = $(this).val();
                        if(pass.length<6){
                            addError(errorMessage.short_pass,inputName);
                        }
                        else{
                            removeError(errorMessage.short_pass,inputName);
                        }
                    }
                }
            }
        })
    });
        }
}(jQuery));

(function($){
$.fn.submitRegisterForm = function() {
    var thisForm = $(this);
    $(this).submit(function(){
      var inputs = $(this).find('input');
      var error = 0;
      jQuery.each(inputs,function(){
        var inputName = $(this).attr('name');
        if($(this).hasClass('required')){
            if($(this).val() == ''){
                addError(errorMessage.empty,inputName);
                error=1;
            }
            else{
                removeError(errorMessage.empty,inputName);
                if($(this).hasClass('name')){
                    var input = /^[a-zA-z0-9_]+$/;
                    if(!$(this).val().match(input)){
                        addError(errorMessage.email,inputName);
                        error=1;
                    }
                    else{
                        var response ='';
                        $.ajaxSetup({async: false});              
                        $.post('jq_php/check_unique_field.php',{type:"uname",uname:$(this).val()},function(data){
                            response = jQuery.parseJSON(data);
                        })
                        $.ajaxSetup({async: true});
                        if(response.err==1){
                           addError(errorMessage.doubles_name,inputName);
                           error=1;
                        }
                        else if(response.err=='ok'){
                          removeError(errorMessage.doubles_name,inputName);
                        }
                    }
                }
                if($(this).hasClass('email')){
                    var input = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                    if(!$(this).val().match(input)){
                        addError(errorMessage.email,inputName);
                        error=1;
                    }
                    else{
                        var response ='';
                        $.ajaxSetup({async: false});              
                        $.post('jq_php/check_unique_field.php',{type:"uemail",uemail:$(this).val()},function(data){
                            response = jQuery.parseJSON(data);
                        })
                        $.ajaxSetup({async: true});
                        if(response.err==1){
                           addError(errorMessage.doubles_email,inputName);
                           error=1;
                        }
                        else if(response.err=='ok'){
                          removeError(errorMessage.doubles_email,inputName);
                        }
                    }
                }
                if($(this).hasClass('password')){
                    var pass = $(this).val();
                    if(pass.length<6){
                        addError(errorMessage.short_pass,inputName);
                        error=1;
                    }
                    else{
                        removeError(errorMessage.short_pass,inputName);
                    }
                }
            }
        }
      })
      if(error==1){
        addErrorForm(errorMessage.end_form,thisForm);
        return false;
      }
      else{
        return true;
      }
      return false;
    })
}}(jQuery));



(function($){
$.fn.showCreateAccountForm = function() {
  $(this).click(function(){
    $("#login_form").slideUp("slow",function(){
      $("#creeaza_cont").slideDown("slow");
    })
  })
}            
}(jQuery));


function addError(errorMessage,inputName){
    var err = errorMessage.split('|||');
    var theError = err[0]+'<br><br><span class="smaller">'+err[1]+'</span>';
    $("label[for="+inputName+"]").addClass('error_'+inputName);
    $("label[for="+inputName+"]").addClass('error');
    $("label[for="+inputName+"]").attr('title',theError);
    $("label[for="+inputName+"]").children().attr('title',theError);
    $('.error_'+inputName).tooltip({
        track: true, 
        delay: 0, 
        showURL: false, 
        showBody: " - ",
        extraClass: "pretty", 
        fixPNG: true, 
        opacity: 0.95, 
        left: -120
    });
}

function removeError(errorMessage,inputName){
    if($("label[for="+inputName+"]").hasClass('error')){
        $("label[for="+inputName+"]").removeClass('error');
        $("label[for="+inputName+"]").removeClass('error_'+inputName);
    }
    $("label[for="+inputName+"]").attr('title','');
    $("label[for="+inputName+"]").children().attr('title','');
}

function addErrorForm(errorMessage,this_form){
  this_form.find('.error_form').each(function(){
    $(this).html(errorMessage);
    $(this).show("slow");
  })
}
//test function
(function($){
$.fn.test = function(options) {
    var defaults = {
        type: '' //tipurile de backup
    }
    var options = $.extend(defaults, options);
}            
}(jQuery));
