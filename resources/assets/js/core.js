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


import Vue from 'vue';  
var numbers = new Vue({
 el:'#app',
 data:function(){
     return {
         counter: 5,
         divscrolltop: 0
            
     }
 },
 methods:{
    counterup:function (){
        this.counter++; 
    },
    counterdown:function (){
        this.counter--; 
        if (this.counter <= 0){
            this.counter = 1;
        }
    }
 }

})

