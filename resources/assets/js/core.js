
import 'mdbootstrap/js/mdb.min.js';
import 'owl.carousel/dist/assets/owl.carousel.css';
import 'bootstrap/dist/js/bootstrap.js';
import 'owl.carousel';
import $ from "jquery";


$(document).ready(function(){
    $(".carousel-recommend, .carousel").addClass('owl-carousel').owlCarousel({
        items:3,
        nav:true,
        mouseDrag:false,
        navText:['<div class="btn  btn-rounded btn-light-green slide-action"><i class="fa fa-angle-left"></i></div>',
        '<div class="btn btn-rounded btn-light-green slide-action"><i class="fa fa-angle-right"></i></div>'],
        navContainerClass:['nav-action-container']
      
    });
 
    $(".carousel-main").addClass('owl-carousel ').owlCarousel({
        items:1,
        nav:true,
        autoplay:true,
        rtl:true,
        mouseDrag:false,
        dots: false,
        loop:true,
        animateIn:'fadeIn',
        autoplayHoverPause:true,
        navClass:['slider-left-arrow', 'slider-right-arrow'],
        navText:["<div class='nav-btn prev-slide'></div>","<div class='nav-btn next-slide'></div>"],
      
      
    });

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

$('.update').click(function(){
let update = $('.updateqty').val();
$('.updatenewqty').val(update);

});
$('.count-up').click(function(){
let update = $('.view-main-backet-numbers').val();
update++
 $('.view-main-backet-numbers').val(update);
});
$('.count-down').click(function(){
let update = $('.view-main-backet-numbers').val();
update-- 

if ( $('.view-main-backet-numbers').val() == '0'){
   this.update = update.val(0);
}
$('.view-main-backet-numbers').val(update);
});

$('.view-main-submit').click(function(){
    let update = $('.view-main-backet-numbers').val();
    $('.updatenewqty').val(update);
});


$('.search-input').keyup(function(){ 
    var query = $(this).val();
    if(query != '')
    {
     var _token = $('input[name="_token"]').val();
     $.ajax({
      url:"/typehead",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      dataType: 'json',
      method:"POST",
      data:{query:query, _token:_token},
      success:function(data){
                $('.seach-autocomplete').html(data.view);
      }
     });
    }
});
$(function () {
    $('[data-toggle="cart-input"], [data-toggle="cart-basket"] ').tooltip(
        {
            template: '<div class="tooltip   md-tooltip-main"><div class="tooltip-arrow  md-arrow"></div><div class="tooltip-inner  light-green darken-1 md-inner-main"></div></div>'
        }
    )
    })
