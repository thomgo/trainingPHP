$(".afaire").click(function(){
  $(this).hide();
  $(this).next().removeClass( "hide");
  $(this).parent().css("background-color", "green");
});
