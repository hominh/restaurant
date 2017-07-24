$(document).ready(function() {
    $("#tablistmenu li a").on('click',function() {
        var id = $(this).attr("id");
        console.log(id);
        /*$.ajax({
            type: 'GET',
            url: 'http://localhost:8000/menu/'+id+'.html',
            data: {id: id},
            dataType: 'JSON',
            success: function(response){
                console.log(url);
                console.log('Succcess');
            },
            error: function(data) {
                console.log(data);
            }
        });*/
    });
});
