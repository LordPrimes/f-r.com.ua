require('bootstrap');
import 'mdbootstrap/js/mdb.min.js';





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


const status = async function(){ 
   let check = $('.sussec');
   if(check.html().trim() === ''){
    $('.sussec').css("cssText", "display:none !important;"); 
   }
}();

const commend = async function(){
let commend  = $('.id').val();
let seo = $('.seo').val();

$.ajax({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},  
    url: seo+ '/comments', 
    type:'POST',
    data: {commend :commend },
    success: function(data){
        $.each(data,function(i,values){
           $('.comment-name').append('<p>'+values.name+'</p>','<p>'+values.body+'</p>');
        })
        
       
    }
   
});
}();



