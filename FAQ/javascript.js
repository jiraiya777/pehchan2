
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

$(document).ready(function(){
    $('.cam2').hide();
    $('.cam1, .cam2').on('click',function(){
        $('.cam1, .cam2').toggle('slow');
   });
});

$(document).ready(function(){
    $('.cam4').hide();
    $('.cam3, .cam4').on('click',function(){
        $('.cam3, .cam4').toggle('slow');
   });
});

$(document).ready(function(){
    $('.cam6').hide();
    $('.cam5, .cam6').on('click',function(){
        $('.cam5, .cam6').toggle('slow');
   });
});