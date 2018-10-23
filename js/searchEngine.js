var searchMachine = (function($) {
    var getEvents = function(){
            $.ajax({
                type: "GET",
                url: "include/forSearchMachine.php",
                dataType:'JSON',
                success: function(response){
                    if(response){
                        var $datalist1 = $("#veranstalter");
                        for(var i = 0; i < response.users.length; i++){
                            $datalist1.append("<option value='" + response.users[i].firstname + " " + response.users[i].lastname + "'>");
                        }
                        var $datalist2 = $("#ort");
                        for(var i = 0; i < response.places.length; i++){
                            $datalist2.append($("<option />").val(response.places[i].address));
                        }
                    }
                }
            });
        },
        getUserId = function(elem){
            setTimeout(function () {
                var name = $(elem).val();
                var namesArr = name.split(" ");
                var firstname = namesArr[0];
                var lastname = namesArr[1];
                var dataToAJAX = {
                    firstname: firstname,
                    lastname: lastname
                }
                $.ajax({
                    type: "POST",
                    url: "include/forSearchMachine.php",
                    data: dataToAJAX,
                    dataType:'JSON',
                    success: function(response){
                        if(response.userId){
                            $("#veranstalterId").val(response.userId);
                        }
                    }
                });
            }, 500);
        }
    return {
        init: function() {
            getEvents();
        },
        getUser: function(elem){
            getUserId(elem);
        }
    }
}(document, window, jQuery));