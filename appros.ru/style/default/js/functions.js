

var alertFailure = function(params){
    //
}

var modalWindow = function(params){
    //
}

var ajaxer = function(params){
    
    var options = $.extend({
        type: 'POST',
        dataType: 'json',
        success: function(data){
            if (!data.success) {
                if (params.failure) {
                    params.failure(data);
                } else {
                    alertFailure(data);
                }                
            }
            params.success(data);
        }
    }, params);
    
    $.ajax(options);   
}

var ajaxController = function(params){
    
    if (!params.controller) params.controller = 'ajax';
    if (!params.action)     params.action     = 'default';
    
    var options = $.extend({
        url : '/' + params.controller + '/' + params.action,
        data: {},
        timeout: 30000
    }, params);
    
    ajaxer(options);    
}


function likeButton(id, element){
    if (id < 1) {
        return false;
    }
    
    ajaxController({
        action: 'like_button',
        data: {
            id: id
        },
        success: function(data){
            if (data.success && data.result == 'like_button_ok') {
                $(element).attr('onclick','return false;').attr('style', 'background-position: 0 -100px');
                
                $('#rating-box-'+id).html($('#rating-box-'+id).html()*1 + 1);
            }
            else {
                //
            }
        }
    });
    
    return false;
}


function sendEmail(){
    
    this.emial_field = $('#popup .confirm-field-email');
    
    this.email = this.emial_field.val();
    
    this.emial_field.css('border-color','#EFEFEF');
    
    this.email_pattern = /^\w+([\.-]?\w+)*@(((([a-z0-9а-я]{2,})|([a-z0-9а-я][-][a-z0-9а-я]+))[\.][a-z0-9а-я])|([a-z0-9а-я]+[-]?))+[a-z0-9а-я]+\.([a-zа-я]{2,})$/i;
    
    
    if (this.email == 'E-mail' || !this.email_pattern.test(this.email)) {
        this.emial_field.css('border-color','red');
        return false;
    }
    
    ajaxController({
        action: 'confirm_email',
        data: {
            email: this.email
        },
        success: function(data){
            if (data.success && data.result == 'confirm_email_ok') {
                window.location = window.location;
            }
            else {
                //
            }
        }
    });
    
    return false;
}