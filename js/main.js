function bs_input_file() {
	$(".input-file").before(
		function() {
			if ( ! $(this).prev().hasClass('input-ghost') ) {
				var element = $("<input type='file' class='input-ghost' style='visibility:hidden; height:0'>");
				element.attr("name",$(this).attr("name"));
				element.change(function(){
					element.next(element).find('input').val((element.val()).split('\\').pop());
				});
				$(this).find("button.btn-choose").click(function(){
					element.click();
				});
				$(this).find("button.btn-reset").click(function(){
					element.val(null);
					$(this).parents(".input-file").find('input').val('');
				});
				$(this).find('input').css("cursor","pointer");
				$(this).find('input').mousedown(function() {
					$(this).parents('.input-file').prev().click();
					return false;
				});
				return element;
			}
		}
	);
}
$(function() {
	bs_input_file();
});
(function ($) {
    "use strict";

    
    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    $('.validate-form').on('submit',function(){
        var check = true;

        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                check=false;
            }
        }

        return check;
    });


    $('.validate-form .input100').each(function(){
        $(this).focus(function(){
           hideValidate(this);
        });
    });

    function validate (input) {
        if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }
    // validacion ticket
    var input1 = $('.validate-input .input800');
    

    $('.validate-form').on('submit',function(){
        var check = true;

        for(var i=0; i<input1.length; i++) {
            if(validate(input1[i]) == false){
                showValidate(input1[i]);
                check=false;
            }
        }

        return check;
    });


    $('.validate-form .input800').each(function(){
        $(this).focus(function(){
           hideValidate(this);
        });
    });

    function validate (input1) {
        if($(input1).attr('type') == 'asunto' || $(input1).attr('descripcion') == 'descripcion') {
            if($(input1).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        }
        else {
            if($(input1).val().trim() == ''){
                return false;
            }
        }
    }

    function showValidate(input1) {
        var thisAlert = $(input1).parent();
        

        
        
        Push.create("¡Error!", { //Titulo de la notificación
			body: "Uno o más campos están vacíos.", //Texto del cuerpo de la notificación
			icon: 'images/icons/Error.png', //Icono de la notificación
			timeout: 6000, //Tiempo de duración de la notificación
			onClick: function () {//Función que se cumple al realizar clic cobre la notificación
				
				this.close(); //Cierra la notificación
			}
        });
        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input1) {
        var thisAlert = $(input1).parent();

        $(thisAlert).removeClass('alert-validate');
    }

    
    
    
    

})(jQuery);