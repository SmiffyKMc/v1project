$('document').ready(function(){
    
    $('#marketFormButton').click(function(e){
        $('#marketTable tr').slice(1).empty();
        
        var rating = $('#nameVar').val();
        var name = $('#name').val();
        
        if(name == "" && rating == ""){
            showAll();
        } else if(name == "") {
            showRating(rating);
        } else if(rating == ""){
            showName(name);
        } else if(name != "" && rating != ""){
            showBoth(name, rating);
        }

        e.preventDefault();
    });
    
    $('#signupForm').validate({
        rules: {
            email: {
                required: true,
                email: true
            }
        }
    });
});

function showAll(){
    $.ajax({
            type: "GET",
            url: "../web_services/cow/api.php",
            contentType: "application/json; charset=utf-8",
            cache : false,
            dataType: "json",
            success: function(data) {
                var trText = "";
                $.each(data.data, function(name, value){
                        console.log(value);
                        trText = "<tr>" 
                            + "<td>" + value.type + "</td>"
                            + "<td>" + value.breed + "</td>"
                            + "<td>" + value.gender + "</td>"
                            + "<td>" + value.name + "</td>"
                            + "<td>" + "€" + value.price + "</td>"
                            + "<td>" + value.county + "</td>"
                            + "<td>" + value.rating + " Stars</td>"
                            + "<td><a href='showcow.php?cowId=" + value.id + "'>Check Cow</a></td>"
                            + "</tr>";
                        $('#marketTable').append(trText);
                });
            },
            error: function(){
               alert("There was an error loggin in");
            }
    });
}

function showName(name){
    $.ajax({
            type: "GET",
            url: "../web_services/cow/api.php",
            data: {"name" : name},
            contentType: "application/json; charset=utf-8",
            cache : false,
            dataType: "json",
            success: function(data) {
                var trText = "";
                $.each(data.data, function(name, value){
                        console.log(value);
                        trText = "<tr>" 
                            + "<td>" + value.type + "</td>"
                            + "<td>" + value.breed + "</td>"
                            + "<td>" + value.gender + "</td>"
                            + "<td>" + value.name + "</td>"
                            + "<td>" + "€" + value.price + "</td>"
                            + "<td>" + value.county + "</td>"
                            + "<td>" + value.rating + " Stars</td>"
                            + "<td><a href='showcow.php?cowId=" + value.id + "'>Check Cow</a></td>"
                            + "</tr>";
                        $('#marketTable').append(trText);
                });
            },
            error: function(){
               alert("There was an error loggin in");
            }
    });
}

function showRating(rating){
    $.ajax({
            type: "GET",
            url: "../web_services/cow/api.php",
            data: {"rating" : rating},
            contentType: "application/json; charset=utf-8",
            cache : false,
            dataType: "json",
            success: function(data) {
                var trText = "";
                $.each(data.data, function(name, value){
                        console.log(value);
                        trText = "<tr>" 
                            + "<td>" + value.type + "</td>"
                            + "<td>" + value.breed + "</td>"
                            + "<td>" + value.gender + "</td>"
                            + "<td>" + value.name + "</td>"
                            + "<td>" + "€" + value.price + "</td>"
                            + "<td>" + value.county + "</td>"
                            + "<td>" + value.rating + " Stars</td>"
                            + "<td><a href='showcow.php?cowId=" + value.id + "'>Check Cow</a></td>"
                            + "</tr>";
                        $('#marketTable').append(trText);
                });
            },
            error: function(){
               alert("There was an error loggin in");
            }
    });
}

function showBoth(name, rating){
    $.ajax({
            type: "GET",
            url: "../web_services/cow/api.php",
            data: {"name" : name, "rating" : rating},
            contentType: "application/json; charset=utf-8",
            cache : false,
            dataType: "json",
            success: function(data) {
                var trText = "";
                $.each(data.data, function(name, value){
                        console.log(value);
                        trText = "<tr>" 
                            + "<td>" + value.type + "</td>"
                            + "<td>" + value.breed + "</td>"
                            + "<td>" + value.gender + "</td>"
                            + "<td>" + value.name + "</td>"
                            + "<td>" + "€" + value.price + "</td>"
                            + "<td>" + value.county + "</td>"
                            + "<td>" + value.rating + " Stars</td>"
                            + "<td><a href='showcow.php?cowId=" + value.id + "'>Check Cow</a></td>"
                            + "</tr>";
                        $('#marketTable').append(trText);
                });
            },
            error: function(){
               alert("There was an error loggin in");
            }
    });
}

function showCowId(id){
    $.ajax({
            type: "GET",
            url: "../web_services/cow/api.php",
            data: {"cowId" : id},
            contentType: "application/json; charset=utf-8",
            cache : false,
            dataType: "json",
            success: function(data) {
                var trText = "";
                $.each(data.data, function(name, value){
                    console.log(value);
                });
            },
            error: function(){
               alert("There was an error loggin in");
            }
    });
}

function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}


