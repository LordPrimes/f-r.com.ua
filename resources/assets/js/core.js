require('bootstrap');
import 'mdbootstrap/js/mdb.min.js';
import 'owl.carousel/dist/assets/owl.carousel.css';
import 'owl.carousel';

$(document).ready(function(){
    $(".owl-carousel").owlCarousel();

 $(function(){
    $(window).scroll(function(){
       if($(this).scrollTop()!=0){
           $('.scrolingtop').show();
       } 
       else {
           $('.scrolingtop').hide();
       }
    });
});
$(".scrolingtop").click(function(){
    $('body,html').animate({ scrollTop: 0 }, 600);
   
});      
        
  });




const  error = async function(){
setTimeout(function(){
   $('.errors').remove();
}, 3500);
$('body').click(function(){
    setTimeout(function(){
    $('.errors').remove();
    },500)
   
});
}();


$('.comments-submit').click(function(){ 
   let check = $('.sussec');
   if(check.html().trim() !== ''){
    $('.sussec').css("cssText", "display:initial !important;"); 
   }
});




