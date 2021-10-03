$(document).ready(function(){
    $("button").click(function(){
        $("#p2").append("Value: " + $("#test").val());
    });
});