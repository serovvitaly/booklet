

var alertWindow = function(params){
    alert(params.message);
}

var modalWindow = function(params){
    //
}

var ajaxer = function(params){
    $.ajax({
        url: params.url,
        data: params.data,
        type: 'POST',
        dataType: 'json',
        success: function(data){
            if (!data.success) {
                //if (!data.handler) data.handler = 'alertWindow';
                //var callback = [];
                //callback.push(data.handler);
                //callback[0](data);
                
                if (params.failure) {
                    params.failure(data);
                } else {
                    alertWindow(data);
                }
                
                //data.handler(data);
                //return;
                //callbacks.add(['alertWindow']);
                //console.log(callbacks);
                //callbacks.fire(data);
                //callbacks.remove(data.handler);
                
            }
            params.success(data);
        }
    });    
}

var ajaxController = function(params){
    if (!params.controller) params.controller = 'ajax';
    if (!params.action) params.action = 'default';
    if (!params.data) params.data = {};
    
    ajaxer({
        url: '/' + params.controller + '/' + params.action,
        data: params.data,
        failure: function(data){
            if (params.failure) params.failure(data);
            else return false;
        },
        success: function(data){
            if (params.success) params.success(data);
        }
    });
    
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