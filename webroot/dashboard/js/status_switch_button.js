$.get("http://localhost/naql/api/Settings/status.json",
    function(data){
        var response_obj = data.status;
        console.log("price_approved " + response_obj.price_approved);
        $('#new_status').html(response_obj.price_approved);
        if(response_obj.price_approved == "Admin"){$('#new_status').css("background-color","#f1a80b");
        }else if(response_obj.price_approved == "Automatic"){$('#new_status').css("background-color","#0bc4e0");}
    });

function change_status() {
    console.log("clicked");
    $.get("http://localhost/naql/api/Settings/status.json",
        function(data) {
            var response_obj = data.status;
            console.log("price_approved " + response_obj.price_approved);
            console.log("order_id " + response_obj.id);
            var edit_address = "http://localhost/naql/api/Settings/edit/"+ response_obj.id +".json"
            if(response_obj.price_approved == "Admin"){
                $.post(edit_address,{price_approved: "Automatic"},
                function(){
                    $('#current_or_previous').html('الحالة الجديدة :');
                    $('#new_status').html('Automatic');
                    $('#new_status').css("background-color","#0bc4e0");
                }
            );
            } else {
                $.post(edit_address,{
                    price_approved: "Admin"
                },
                function(){
                    $('#current_or_previous').html('الحالة الجديدة :');
                    $('#new_status').html('Admin');
                    $('#new_status').css("background-color","#f1a80b");
                }
            );
            }
        });
    }