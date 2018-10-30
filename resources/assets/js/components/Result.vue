<template>
 

   
   
   <div v-if="status"> 
<v-jumbotron
    gradient='to top right, rgba(101, 220, 41, 0.7), rgba(41, 121, 220, 0.7)'
    dark
    src="https://cdn.vuetifyjs.com/images/parallax/material2.jpg"
  >
    <v-container fill-height>
      <v-layout align-center>
        <v-flex text-xs-center>
          <h3 class="display-3">По вашему запросу ничего не найдено!</h3>
        </v-flex>
      </v-layout>
    </v-container>
  </v-jumbotron>
       </div>
      <v-container  fluid  v-else>
    <v-layout  > 
    <v-flex  class="result-filter"    >
      <div class='result-filter-price'><label>Цена 1-100000 ГРН</label>  <v-range-slider
         
           thumb-color="green lighten-1"
           track-color='green lighten-1'
         
        ></v-range-slider> </div>
    </v-flex>
     <v-layout wrap row > 
      <v-flex lg11 class="result-items"  v-for="products in results" :key="products.title">
       
        <figure>
        <div class="result-items-images"><div class="result-items-stiker">Новинки</div>
        
        </div>
        
        </figure>
         <div class="result-items-info">
           <div class="result-items-info-title">
    <a :href="'/search/'+ products.seotitle  ">{{products.title}} </a></div>
        <p>{{ products.description }} </p>
        <div class="result-items-price">

          <span class="result-items-basket-old-price">{{ products.price }}</span>
          <span class='result-items-basket-price'>{{ products.price }}</span>
         
      
        </div>
        <div class="result-items-basket"> <a href="#" >Купить</a> </div>
         </div>
     
      </v-flex>
     </v-layout>
     
    </v-layout>

    
  </v-container>
  
    
</template>
<script>

	export default {
    data:function(){
      return {
      
      }
    },
  
   computed:{
     results(){
       return this.$store.state.results
     },
     status(){
       return this.$store.state.status
     }
   }
  }
  
</script>