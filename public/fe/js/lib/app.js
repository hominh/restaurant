function validateEmail($email) {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    return emailReg.test( $email );
}
$(document).ready(function() {

    /*$("ul.nav li a").click(function(e) {
        $(this).closest("a").addClass("mactive").siblings().removeClass("mactive");
        $(this.hash).fadeIn().siblings().hide();
        e.preventDefault();
    });*/

    //click a menu
    $("#tablistmenu li").on('click',function() {
        var pid = $(this).attr("pid");
        var id = $(this).attr("id");
        //var myVar = $("#tab-menu-content").find('.tab-pane').val();
        var str = "div.tab-pane[pid="+pid+"]";

        //var m = $(".statuslight[title]='" + currentStatus + "'");
        //var e = $(str).attr('class');
        var e = $(str);
        var pidOfContent = e.context.activeElement.parentElement.attributes["0"].value;

        //console.log(e)
        $.ajax({
            type: 'GET',
            url: '/menu/'+id,
            data: {id: id},
            dataType:'json',
            success: function(response){
                console.log('ok');
                //$("#row").html(response);
                //console.log('Succcess');
            },
            error: function( jqXhr, textStatus, errorThrown ){
                console.log('error');
                console.log(errorThrown);
            }
        });
    });

    $( "#comment_event" ).submit(function( event ) {
        event.preventDefault();
        var formData=$("#comment_event").serialize();
        //console.log(formData);
        $.ajax({
            type: 'POST',
            url: 'http://localhost:8000/comment/storeevent',
            data: formData,
            dataType: 'json',
            beforeSend: function(xhr) {
                var name = $("#name").val();
                var email = $("#email").val();
                var content = $("#content").val();
                if(name ==='' || name === null) {
                    alert('Please enter your name');
                    return;
                }
                if(email ==='' || email === null) {
                    alert('Please enter your email');
                    return;
                }
                if(content ==='' || content === null) {
                    alert('Please enter your content');
                    return;
                }
                if(!validateEmail(email)) {
                    alert('Please enter email format');
                    return;
                }
                var _token = $('meta[name="_token"]').attr('content');
                if (_token) {
                    return xhr.setRequestHeader('X-CSRF-TOKEN', _token);
                }
            },
            success: function () {
                alert('Comment success');
                location.reload();
            },
            error: function(data) {
                alert('Comment success');
                location.reload();
                console.log(data);
                console.log("----------------------------");
                var errors = data.responseJSON;
                console.log(errors);

            }
        });
    });

    $( "#comment" ).submit(function( event ) {
        event.preventDefault();
        var formData=$("#comment").serialize();
        //console.log(formData);
        $.ajax({
            type: 'POST',
            url: 'http://localhost:8000/comment/store',
            data: formData,
            dataType: 'json',
            beforeSend: function(xhr) {
                var name = $("#name").val();
                var email = $("#email").val();
                var content = $("#content").val();
                if(name ==='' || name === null) {
                    alert('Please enter your name');
                    return;
                }
                if(email ==='' || email === null) {
                    alert('Please enter your email');
                    return;
                }
                if(content ==='' || content === null) {
                    alert('Please enter your content');
                    return;
                }
                if(!validateEmail(email)) {
                    alert('Please enter email format');
                    return;
                }
                var _token = $('meta[name="_token"]').attr('content');
                if (_token) {
                    return xhr.setRequestHeader('X-CSRF-TOKEN', _token);
                }
            },
            success: function () {
                alert('Comment success');
                location.reload();
            },
            error: function(data) {
                alert('Comment success');
                location.reload();
                console.log(data);
                console.log("----------------------------");
                var errors = data.responseJSON;
                console.log(errors);

            }
        });
    });
});
