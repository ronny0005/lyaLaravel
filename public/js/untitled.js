(function($) {
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    $(".logoLya").css("height","60px")
    $(".logoLya").find("img").attr("src","/img/WhatsApp Image 2020-06-24 at 10.55.26.png");
    $(".titleLya").css("font-size","15px")
    $(".titleLya").css("color","black")
    $(".titleLya").hide()
    $(".nav-link").css("color","black")
    $(".socialIcon").css("color","black")
    $(".navigation-clean").css("background-color","#ffffffff")
  } else {
    $(".logoLya").find("img").attr("src","/img/WhatsApp Image 2020-06-24 at 10.55.26 negatif.png");
    $(".logoLya").css("height","150px")
    $(".titleLya").css("font-size","40px")
    $(".titleLya").show()
    $(".titleLya").css("color","white")
    $(".nav-link").css("color","white")
    $(".socialIcon").css("color","white")
    $(".navigation-clean").css("background-color","#ffffff00")
  }
}
})(jQuery);
