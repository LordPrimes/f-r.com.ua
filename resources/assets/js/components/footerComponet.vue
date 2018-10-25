<template>
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
    })
  }
</script>



