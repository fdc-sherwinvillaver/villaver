$(document).ready(function(){

	function readURL(input) {
    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	            $('#profile').attr('src', e.target.result);
	        }
	        reader.readAsDataURL(input.files[0]);
	    }
	}

	$('#upload:hidden').on('change',function(e){
		e.preventDefault();
		readURL(this);
	});

    $("#file_upload").on('click', function(e){
    	e.preventDefault();
        $("#upload:hidden").trigger('click');
    });

    $('#birthday').attr('type', 'date');


	$('#loginUser').on('submit',function(e){
		e.preventDefault();
		$.ajax({
			type:"POST",
			url:"/users/login",
			data:$('#loginUser').serialize(),
			success: function(data){
				var json = JSON.parse(data);
				if(json.message == "success"){
					if(json.lack_info == true){
						window.location = '/users/update_profile';
					}
					else{
						window.location = '/chat/chatbox';
					}
				}
				else{
					$('.message').show('fast').addClass('alert alert-danger').html(json.form_validation);
				}
			}
		});
	});

	$('#registerInfo').on('submit',function(e){
		e.preventDefault();
		var formData = new FormData(this);

		var files = $('#upload:hidden').get(0).files;
		for(var i=0; i<files.length; i++){
			formData.append('data[UserInformation][file]',files[i]);
		}

		$.ajax({
			type:"POST",
			url:"/users/registerInfo",
			data:formData,
			cache: false,
	        contentType: false,
	        processData: false,
			success: function(data){
				var json = JSON.parse(data);
				if(json.message == "success"){
					window.location = '/chat/chatbox';
				}
				else{
					var selector;
					$.each(json.form_validation,function(key,value){
						selector = '#'+key;
						$('<div id="validate_'+key+'">').insertAfter(selector);
						$('#validate_'+key+'').addClass('text-center').css('color','red').html(value);
						$('#validate_'+key+'').parent().addClass('alert alert-danger');
					});
				}
			}
		});
	});




});