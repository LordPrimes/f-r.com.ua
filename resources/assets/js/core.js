require('bootstrap');
import Vue from 'vue';

var numbers = new Vue({
 el:'.view-main-backet-all-count',

 data:function(){
     return {
         counter: 5,
         price:[],
         
     }
 },
 mounted(){
    this.allnumber();
    this.counterup();
    this.counterdown();
 },
 methods:{
    allnumber:function(){
        this.price = this.price*this.counter
    },
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

