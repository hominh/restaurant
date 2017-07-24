$("div.alert").delay(3000).slideUp();


function confirmDelete(msg) {
	if(window.confirm(msg)) {
		return true;
	}
	return false;
}


$(document).ready(function() {
	$("#addImages").click(function() {
		$("#insert").append('<div class="form-group"><label>Image</label><input type="file" name="fEditDetail[]"></div>');
	});
});


$(document).ready(function() {
	$("a#delImagePost").click(function(){
		var url = "http://localhost:8000/admin/post/delImg/";
		var _token = $("form[name='frmEditPost']").find("input[name='_token']").val();
		//Get src img
		var idPost = $(this).parent().find("img").attr("idHinh");
		var srcImage = $(this).parent().find("img").attr("src");

		var id = $(this).parent().find("img").attr("id");
		$.ajax({
			url: url+idPost,
			type: 'GET',
			cache: false,
			data: {"_token":_token,"idPost":idPost,"urlImage":srcImage},
			success: function (data) {
				if(data == "ok") {
					$("#"+id).remove();
                    $("#currentImage").css('display', 'hide');
                    $("#newImage").css('display', 'block');
				}
				else {
					//alert('Error');
                    console.log(data);
				}
			}
		});
	});

	$("a#delImageFood").click(function(){
		//alert('Xoa hinh food');
		var url = "http://localhost:8000/admin/food/delImg/";
		var _token = $("form[name='frmEditFood']").find("input[name='_token']").val();
		//Get src img
		var idFood = $(this).parent().find("img").attr("idHinh");
		var srcImage = $(this).parent().find("img").attr("src");

		var id = $(this).parent().find("img").attr("id");
		$.ajax({
			url: url+idFood,
			type: 'GET',
			cache: false,
			data: {"_token":_token,"idFood":idFood,"urlImage":srcImage},
			success: function (data) {
				if(data == "ok") {
					$("#"+id).remove();
                    $("#currentImage").css('display', 'hide');
                    $("#newImage").css('display', 'block');
				}
				else {
					//alert('Error');
                    console.log(data);
				}
			}
		});
	});

	$("a#delImageService").click(function(){
		//alert('Xoa hinh food');
		var url = "http://localhost:8000/admin/service/delImg/";
		var _token = $("form[name='frmEditService']").find("input[name='_token']").val();
		//Get src img
		var idService = $(this).parent().find("img").attr("idHinh");
		var srcImage = $(this).parent().find("img").attr("src");

		var id = $(this).parent().find("img").attr("id");
		$.ajax({
			url: url+idService,
			type: 'GET',
			cache: false,
			data: {"_token":_token,"idService":idService,"urlImage":srcImage},
			success: function (data) {
				if(data == "ok") {
					$("#"+id).remove();
				}
				else {
					//alert('Error');
                    console.log(data);
				}
			}
		});
	});

	$("a#delImageEvent").click(function(){
		var url = "http://localhost:8000/admin/event/delImg/";
		var _token = $("form[name='frmEditEvent']").find("input[name='_token']").val();
		//Get src img
		var idEvent = $(this).parent().find("img").attr("idHinh");
		var srcImage = $(this).parent().find("img").attr("src");

		var id = $(this).parent().find("img").attr("id");
		$.ajax({
			url: url+idEvent,
			type: 'GET',
			cache: false,
			data: {"_token":_token,"idEvent":idEvent,"urlImage":srcImage},
			success: function (data) {
				if(data == "ok") {
					$("#"+id).remove();
				}
				else {
					//alert('Error');
                    console.log(data);
				}
			}
		});
	});

	$("a#delPhotoEmployee").click(function(){
		//alert('delimg');
		var url = "http://localhost:8000/admin/employee/delImg/";
		var _token = $("form[name='frmEditEmployee']").find("input[name='_token']").val();
		//Get src img
		var idEmployee = $(this).parent().find("img").attr("idHinh");
		var srcImage = $(this).parent().find("img").attr("src");

		var id = $(this).parent().find("img").attr("id");
		$.ajax({
			url: url+idEmployee,
			type: 'GET',
			cache: false,
			data: {"_token":_token,"idEmployee":idEmployee,"urlImage":srcImage},
			success: function (data) {
				if(data == "ok") {
					$("#"+id).remove();
				}
				else {
					//alert('Error');
                    console.log(data);
				}
			}
		});
	});

	$("a#delImageHistory").click(function(){
		//alert('delimg');
		var url = "http://localhost:8000/admin/history/delImg/";
		var _token = $("form[name='frmEditHistory']").find("input[name='_token']").val();
		//Get src img
		var idHistory = $(this).parent().find("img").attr("idHinh");
		var srcImage = $(this).parent().find("img").attr("src");

		var id = $(this).parent().find("img").attr("id");
		$.ajax({
			url: url+idHistory,
			type: 'GET',
			cache: false,
			data: {"_token":_token,"idHistory":idHistory,"urlImage":srcImage},
			success: function (data) {
				if(data == "ok") {
					$("#"+id).remove();
				}
				else {
					//alert('Error');
                    console.log(data);
				}
			}
		});
	});

	$("a#delImgSlide").click(function(){
		ar url = "http://localhost:8000/admin/slide/delImg/";
		var _token = $("form[name='frmEditSlide']").find("input[name='_token']").val();
		//Get src img
		var idSlide = $(this).parent().find("img").attr("idHinh");
		var srcImage = $(this).parent().find("img").attr("src");

		var id = $(this).parent().find("img").attr("id");
		$.ajax({
			url: url+idSlide,
			type: 'GET',
			cache: false,
			data: {"_token":_token,"idSlide":idSlide,"urlImage":srcImage},
			success: function (data) {
				if(data == "ok") {
					$("#"+id).remove();
				}
				else {
					//alert('Error');
                    console.log(data);
				}
			}
		});
	});


});
