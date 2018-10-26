<template>
<div>
  <v-layout> 
     <v-flex v-if="!status" class='footer-mini-info'>
       <p>
       Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, 
  </p>
  </v-flex>
  </v-layout>
  <v-layout 
      > 
     
    <v-flex class="footer-info">
      <div><img src='/img/cartgreen.png' /><span>Доставка по всей Украине</span> </div>
      <div><img src='/img/cartgreen.png' /><span>Поддержка 7 дней в неделю</span> </div>
      <div><img src='/img/cartgreen.png' /><span>Оптала наличными при получении</span> </div>
      <div><img src='/img/cartgreen.png' /><span>Гарантия качества</span> </div>
      </v-flex>
  </v-layout>
 <v-footer
    
    height="auto"
    color="primary lighten-1"
  >
 
  
  
    <v-layout
      justify-center
      row
      wrap
      footer--style
    >
    
      <v-btn
        v-for="link in links"
        :key="link"
        color="white"
        flat
        round
      >
        {{ link }}
      </v-btn>
      <v-flex
       
        lighten-2
        py-3
        text-xs-center
        white--text
        xs12
      >
        <strong class="footer-f-r">f-r.com.ua</strong>
      </v-flex>
    </v-layout>
  </v-footer>
   </div>
</template>
<script>
  export default {
    data: () => ({
      links: [
        'Каталог',
        'О нас',
        'Оплата и доставка',
        'Обмен и возрат',
        'Контактная информация',
        'Contact Us'
      ]
    }),
    computed:{
     status(){
       return this.$store.state.status
     }
    }
  }
</script>



