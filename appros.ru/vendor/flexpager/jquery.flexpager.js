/**
* Flexpager v1.0
*/

(function( $ ){

    $.fn.flexpager = function(options) {

        var opt = {
            style: {},
            startContent: ''
        };
        
        if (options) { 
            $.extend(opt, options);
        }
        
        this.ajax = function(opts){
            $.ajax(opts);
        }

        var me = this;
        
        return this.each(function() {
            
            var el = this;
            
            $(el).css(opt.style);
            
            if (typeof opt.startContent == 'object') {
                me.ajax({
                    url: opt.startContent.url,
                    dataType: 'html',
                    success: function(data){
                        $($(el).children('.flexpager-page:first')[0]).html(data);
                    }
                })
                
                opt.startContent = '';
            }
            
            $(el).append('<div class="flexpager-page">' + opt.startContent + '</div>');
            
        });
    };

})( jQuery );