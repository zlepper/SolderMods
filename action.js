$(document).ready(function() {
    $(".btn-danger").click(function(){
        //console.log("remove");
        var r = $(this).parent().parent().data("id");
        console.log(r);
        var t = $(this).closest("td");
        $.ajax("remove.php", {
            success: function(responce) {
                if(responce == "success") {
                    console.log("removed");
                    t.html("<div class='text-success'><span class='glyphicon glyphicon-ok-sign' aria-hidden='true'></span>Removed</div>");
                } else {
                    t.html("<div class='text-danger'><span class='glyphicon glyphicon-remove-sign' aria-hidden='true'></span>" + responce + "</div>");
                    console.log(responce);
                }
            },
            data: {"id": r,
                "u": $(this).parent().parent().parent().parent().data("u"),
                "p": $(this).parent().parent().parent().parent().data("p")}
        });
    });
    $(".btn-success").click(function() {
        //console.log("accept");
        var r = $(this).parent().parent().data("id");
        var t = $(this).closest("td");
        $.ajax("add.php", {
            success: function(responce) {
                if(responce == "success") {
                    console.log("saved");
                    t.html("<div class='text-success'><span class='glyphicon glyphicon-ok-sign' aria-hidden='true'></span>Accepted</div>");
                    //console.log(f);
                } else {
                    t.html("<div class='text-danger'><span class='glyphicon glyphicon-remove-sign' aria-hidden='true'></span>" + responce + "</div>");
                    console.log(responce);
                }
            },
            data: {"id": r,
                "u": $(this).parent().parent().parent().parent().data("u"),
                "p": $(this).parent().parent().parent().parent().data("p")}
        });
    });
});