$(function(){

	default_js.init();
	
})

var default_js = {
	
        init:function(){

            $.get('pyga/product', function(o){

                $.each(o, function(key, val){
                    console.log(val);
                });

            },'json');


            /*$.ajax({

                url     :   default_js.url,
                type    :   'POST',
                data    :   data = {'something':''},
                success :   function(r){
                    var j = $.parseJSON(r);

                        $('#product_title').append(j.one);

                }

            })*/
            
            $('.container').delegate('.product_label','click',function(){
                var label = $(this).attr("label");
                $("#product_title").append(label);
            });
                
        },
        
        url : 'http://triad-cycles.com/pyga/ajax'
                
    }