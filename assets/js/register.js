$(document).ready(function() {

//On click sign up, hide log in and show registration form
$("#signup").click(function(){
    $("#first").slideUp("slow",function(){
        $("#second").slideDown("slow");
    }); 
});


//On click sign up, hide registration form and show log in form
$("#signin").click(function(){
    $("#second").slideUp("slow",function(){
        $("#first").slideDown("slow");
    }); 
});


});