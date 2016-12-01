
$(function () {
	$('[data-toggle="popover"]').popover();
	//$(document).ajaxStart(function() { Pace.restart(); });
	var base_url = $("#base_url").val();
	
	
	//global.avisos();
	
	
	
	
});


	

global = {

	avisos: function () {
		$( ".avisos-geral:visible" ).delay(50000).animate({
			left: "+=800px"
		}, 5000 );

		$( ".avisos-geral" ).click(function () {
			$(this).hide();
		});
	},
	
	temas: function () {
		// muda tema
		$('.lista-temas li a').click(function () {
			tema =$(this).attr('data-skin')
			$('body').removeClass();
			$('body').addClass('sidebar-mini');
			$('body').addClass(tema);
			
			$.get( "tema/"+tema );
		});	
	},
	
	gera_link:function () {
		token = $("#token").val();
		$('#gerar-link').click(function () {
			$.post( base_url+'/cadastro/token/', { token_cadastro_externo:token, id_user: $("#user_id").val() })
			  .done(function( data ) {
				  $('#copy').val(base_url+'/cadastro/externo/'+token);
			  });
			
			
		});
	},
	
	preview_upload:function () {
			$("#file-1").on('change', function () {
			if (typeof (FileReader) != "undefined") {
	
				var image_holder = $("#image-holder");
				image_holder.empty();
	
				var reader = new FileReader();
				reader.onload = function (e) {
					$("<img />", {
						"src": e.target.result,
						"class": "thumb-image profile-user-img img-responsive img-circle"
					}).appendTo(image_holder);
				}
				image_holder.show();
				reader.readAsDataURL($(this)[0].files[0]);
			} else{
				alert("Este navegador nao suporta FileReader.");
			}
		});
		},
	
	auto_completre_cep:function(){
			$(".get-cep_js").focusout(function () {
				cep = $(this).val();
				$.ajax({
					url: 'http://viacep.com.br/ws/'+cep+'/json/',
					success: function(data) {
						$(" input[name='mem_cidade_endereco'] ").val(data.localidade); //cidade
						$(" input[name='mem_estado_endereco'] ").val(data.uf); //UF
						$(" input[name='mem_endereco'] ").val(data.logradouro); // Rua
						//$(" input[name='cad_cep_endereco'] ").val(data.bairro); //bairo
					}
				});
			});
		},
	
	input_mask:function () {
			//$(" input[input-mask='data'] ").inputmask({"mask": "99-99-9999"});
			$(" input[input-mask='tel'] ").inputmask({"mask": "(99) 9 9999-9999"});
			$(" input[input-mask='cep'] ").inputmask({"mask": "99999-999"});
			$(" input[input-mask='cpf'] ").inputmask({"mask": "999-999-999-99"});
		
			// Dar focus no input
			$("input,select, textarea").focusin(function () {
				//$(this).css( "border", "1px solid red" );
				$(this).css( "box-shadow", "0px 0px 3px  #3c8dbc" );
			});
		
			// Tira focus no input
			$("input,select,textarea").focusout(function () {
				//$(this).css( "border", "1px solid red" );
				$(this).css( "box-shadow", "none" );
			});
		},
	
	plugin_clipboard:function(){
			var clipboard = new Clipboard('.btn');
	
			clipboard.on('success', function(e) {
				console.info('Action:', e.action);
				console.info('Text:', e.text);
				console.info('Trigger:', e.trigger);
	
				e.clearSelection();
			});
	
			clipboard.on('error', function(e) {
				console.error('Action:', e.action);
				console.error('Trigger:', e.trigger);
			});
		},
	
	input_file_custom:function () {
			var inputs = document.querySelectorAll( '.inputfile-custom' );
			Array.prototype.forEach.call( inputs, function( input ){
				var label	 = input.nextElementSibling,
					labelVal = label.innerHTML;
	
				input.addEventListener( 'change', function( e ){
					var fileName = '';
					if( this.files && this.files.length > 1 )
						fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
					else
						fileName = e.target.value.split( '\\' ).pop();
	
					if( fileName )
						label.querySelector( 'span' ).innerHTML = fileName;
					else
						label.innerHTML = labelVal;
				});
			});
		},
}// fim global
