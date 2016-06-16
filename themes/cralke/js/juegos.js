/* JUEGOS BY KMARIO19 */
function showError(obj, str) {
	$(obj).parent('li').addClass('error').children('span.errormsg').html(str).show(); // TODO QUE ONDA
	$.scrollTo($(obj).parent('li'), 500);
}
//
function hideError(obj) {
	$(obj).parent('li').removeClass('error').children('span.errormsg').html('').hide();
}
var juegos = {
	validaUrl: function(obj, url){
      var regex = /^(ht|f)tps?:\/\/\w+([\.\-\w]+)?\.([a-z]{2,3}|info|mobi|aero|asia|name)(:\d{2,5})?(\/)?((\/).+)?$/i;
      var ext = url.substr(-3);
      // URL VALIDA
      if(regex.test(url) == false){
        showError(obj, 'No es una direcci&oacute;n v&aacute;lida');
        return false;
      } else if(ext != 'swf'){
        showError(obj, 'Ingresa una url del juego que termine en .swf');
        return false; 
      } else return true;
    },
    agregar: function(){
        var error = false;
        $('.required').each(function(){
        	if (!$.trim($(this).val())) {
        		showError(this, 'Este campo es obligatorio');
        		$(this).parent('li').addClass('error');
        		error = true;
        		return false;
        	} else if($(this).attr('name') == 'url'){
        	   var rimg = juegos.validaUrl(this, $(this).val());
                if(rimg != true) {
                    error = true;
                    return false;
                } else error = false;
        	}
        });
        //
        if (error) {
			return false;
		} 
        //
        if ($('textarea[name=desc]').val().length > 1500) {
			showError($('textarea[name=desc]').get(0), 'La descripci&oacute;n no debe exeder los 1500 caracteres.');
			return false;
		}
        // ENVIAMOS
        $('#sevaxD').fadeOut("slow",function(){
            $('.loader').fadeIn();  
        })
        //
        $('form[name=add_juego]').submit();
    },
    comentar: function(jid){
        // EVITAR FLOOD
        $('#btnComment').attr({'disabled':'disabled'});
        //
        // CHECAMOS....
        var textarea = $('#mensaje');
    	var text = textarea.val();
    	if(text == ''){
    		textarea.focus();
            $('#btnComment').attr({'disabled':''});
    		return;
    	}else if(text.length > 1000){
    		alert("Tu comentario no puede ser mayor a 1000 caracteres.");
    		textarea.focus();
            $('#btnComment').attr({'disabled':''});
    		return;
    	}
        // ENVIAMOS
        $('#loading').fadeIn(250); 
       	$.ajax({
    		type: 'POST',
    		url: global_data.url + '/juegos-new_coment.php',
    		data: 'comentario=' + encodeURIComponent(text) + '&juegoid=' + jid + '&auser=' + global_data.user_key,
    		success: function(h){
    			switch(h.charAt(0)){
    				case '0': //Error
    					$('.error').html(h.substring(3)).show('slow');
                        $('#btnComment').attr({'disabled':''});
    					break;
    				case '1': //OK
                            $('.form').html('<div class="mensajes ok">Tu comentario fu&eacute; agregado correctamente.</div>');
							$('#mensajes').append(h.substring(3)).slideDown('fast', function () {
								$('#no-comments').hide();
								$('.form').html('<div class="mensajes ok">Tu comentario fu&eacute; agregado correctamente.</div>');
							});
    						// SUMAMOS
    						var ncomments = parseInt($('#total_com').text());
    						$('#total_com').text(ncomments + 1);
                            $('#btnComment').attr({'disabled':''});
                            // NO HAY COMMENTS REMOVE
                            $('#noComments').remove();
    					break;
    			}
                $('#loading').fadeOut(250); 
    		}
      });
        
    },
    // VOTAR JUEGO
    votar: function(voto, id){
        //
        voto = (voto == 'pos') ? 'pos' : 'neg';
        // VARS
    	var total_votos = parseInt($('.votos_total').text());
        total_votos = (isNaN(total_votos)) ? 0 : total_votos;
        //
        $('#loading').fadeIn(250); 
    	$.ajax({
    		type: 'POST',
    		url: global_data.url + '/juegos-votar.php',
    		data: 'voto=' + voto + '&juegoid=' + id,
    		success: function(h){
    			switch(h.charAt(0)){
    				case '0': //Error
                        mydialog.alert('Votar Juego', h.substring(3));
    					break;
    				case '1': //OK
    					total_votos = total_votos + 1;
                        //
    					$('.votos_total').text(total_votos);
    					//
    					break;
    			}
                $('#loading').fadeOut(250); 
    		}
        });
    },
    // BORRAR COMENTARIO/ JUEGO
    borrar:function(id, type){
        //
        var txt_type = (type == 'com') ? 'comentario' : 'juego';
        var txt_aux = (type == 'com') ? 'este ' : 'este ';
        //
        mydialog.mask_close = false;
        mydialog.show(true);
		mydialog.title('Eliminar ' + txt_type);
		mydialog.body('&iquest;Seguro que quieres eliminar ' + txt_aux + txt_type + '?');
		mydialog.buttons(true, true, 'Eliminar', 'juegos.del_' + txt_type + '(' + id + ')', true, true, true, 'Cancelar', 'close', true, false);
		mydialog.center();
    },
    // ELIMINAR COMENTARIO
    del_comentario: function(cid){
		mydialog.procesando_inicio();
        $('#loading').fadeIn(250); 
    	$.ajax({
    		type: 'POST',
    		url: global_data.url + '/juegos-borrar_com.php',
    		data: 'cid=' + cid,
    		success: function(h){
    			switch(h.charAt(0)){
    				case '0': //Error
						mydialog.procesando_fin();
                        mydialog.alert('Error:', h.substring(3));
    					break;
    				case '1': //OK
						var ncomments = parseInt($('#total_com').text());
						$('#total_com').text(ncomments - 1);
                        //
						$('#div_cmnt_' + cid).slideUp( 1500, 'easeInOutElastic');
						$('#div_cmnt_' + cid).remove();
    					//
                        mydialog.close();
                        //
    					break;
    			}
                $('#loading').fadeOut(250); 
    		}
        });
    },
    // ELIMINAR JUEGOS
    del_juego: function(jid){
		mydialog.procesando_inicio();
        $('#loading').fadeIn(250); 
    	$.ajax({
    		type: 'POST',
    		url: global_data.url + '/juegos-borrar_juego.php',
    		data: 'jid=' + jid,
    		success: function(h){
    			switch(h.charAt(0)){
    				case '0': //Error
                        mydialog.alert('Error:', h.substring(3));
    					break;
    				case '1': //OK
                        mydialog.close();
                        location.href = global_data.url + '/juegos/';
                        //
    					break;
    			}
                $('#loading').fadeOut(250); 
    		}
        });
    }

}

/* Agregar juego a favoritos */
function add_juego_fav(id) {
    $('#loading').fadeIn(250);
	$.ajax({		
		type: 'POST',
		url: global_data.url + '/juegos-add_juego_fav.php',
		data: 'juegoid='+id,
		success: function(h){
			switch(h.charAt(0)){
				case '0': //Error
					mydialog.alert('Error', h.substring(3));
					break;
				case '1':
					$('.btn_favorit').toggle();
					var favs = parseInt($('#Favs').text());
					$('#Favs').text(favs + 1);
					break;
			}
            $('#loading').fadeOut(350);
		}
	});
}

/* Borrar favorito */
function del_juego_fav(id){
    $('#loading').fadeIn(250);
	$.ajax({		
		type: 'POST',
		url: global_data.url + '/juegos-del_juego_fav.php',
		data: 'favid='+id,
		success: function(h){
			switch(h.charAt(0)){
				case '0': //Error
					mydialog.alert('Error', h.substring(3));
					break;
				case '1':
					$('.btn_favorit').toggle();
					var favs = parseInt($('#Favs').text());
					$('#Favs').text(favs - 1);
					break;
			}
            $('#loading').fadeOut(350);
		}
	});
}
