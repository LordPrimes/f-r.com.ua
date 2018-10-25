<template>

<div>
 <section class='headers-nav'>
            <li><a href="">Каталог</a></li>
            <li><a href="">О нас</a></li>
            <li><a href="">Оплата и доставка</a></li>
            <li><a href="">Обмен и возрат</a></li>
            <li><a href="">Контактная информация</a></li>
          
            
            
        </section>
        <header class="headers">
            
            <div class="headers-logo"><img src="https://family-room.com.ua/image/data/logo/logo.png"   />
                <a href="" class="headers-logo-phone">Адрес и телефон</a>
                <p>Режим работы: 9:00 — 18:00</p>
            </div>
            <div  id='headers-search'>
               
                <div class='headers-search-input'>
                    <vue-fuse   event-name="results" v-model="value"
          :list="prod"
          :keys="['title']" class="search-input" :defaultAll="false"   :distance="200"  placeholder="Поиск товара" required ></vue-fuse> 
          
         
                  
                 
                </div>     
               
            </div>
             
            
             <div class="headers-phone">+3 <i>(095)</i> 096-85-11 
                 <div class="card">
   

    <v-badge  class="numbers-cards">
      <span slot="badge" >12</span>
      <v-icon
        large
        color="grey lighten-1"
      >
         shopping_cart
      </v-icon>
    </v-badge>
  </div>  
                </div>
                <div class="headers-login-sign">
                    <a href="" class="login">Вход</a>
                    <a href="" class="sign">Регистрация</a>
                 
                </div>
                
        </header>
  
   <v-layout row class="navbar-main"  >
    
   
      <v-flex  xs3 >
        <v-card class="ggg"  >
          <v-card-text class="navbar">3</v-card-text>
        </v-card>
        
      </v-flex>
      
      <v-flex  xs3>
        <v-card class="ggg"  >
          <v-card-text class="navbar" >3</v-card-text>
        </v-card>
        
      </v-flex>
      
      <v-flex  xs3>
        <v-card class="ggg"  >
          <v-card-text class="navbar" >3</v-card-text>
        </v-card>
        
      </v-flex>
      
      <v-flex xs3>
        <v-card class="gggg"  >
          <v-card-text class="navbar" >3</v-card-text>
         
        </v-card>
       
      </v-flex>
     
  
     
    </v-layout>
     
 
 
</div>
 
   
  
</template>
<script>

import { mapState } from 'vuex'
	export default {
    data:function(){
      return {
       results: [],
        value:''
    }   
    },
  created () {
    this.$on('results', results => {
      this.results = results;
      this.error = this.results.length === 0;
      this.$store.commit('SET_RESULTS', results)  
    })
      
  },
  mounted (){
     this.$store.dispatch('loadProducts')
  },
   computed: mapState([
    'prod'
  ])
  } 
</script>