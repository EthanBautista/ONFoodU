$(document).ready(function(){

    $("#sel_resto").change(function(){
        var restoid = $(this).val();

        $.ajax({
            url: 'getFood.php',
            type: 'post',
            data: {resto:restoid},
            dataType: 'json',
            success:function(response){

                var len = response.length;

                $("#sel_food").empty();
                for( var i = 0; i<len; i++){
                    var id = response[i]['id'];
                    var name = response[i]['name'];
                    
                    $("#sel_food").append("<option value='"+id+"'>"+name+"</option>");

                }
            }
        });
    });

});