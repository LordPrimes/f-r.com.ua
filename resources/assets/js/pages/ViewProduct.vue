<template>
<v-container>
    <div v-for="prod in view" :key="prod.id"> 
 <v-breadcrumbs>
      <v-icon slot="divider">forward</v-icon>

      <v-breadcrumbs-item
        v-for="item in items"
        :disabled="item.disabled"
        :key="item.text"
      >
        {{ item.text }}
      </v-breadcrumbs-item>
    </v-breadcrumbs>

<div class='view-info-prod'><h1>{{ prod.title }} </h1>
<div>КАРТИНКА  </div>  
 </div>
    </div>
</v-container>
</template>
<script>
export default {
    data:function(){
        return{
            seotitle:this.$route.params.seotitle,
            view: [],
              items: [
          {
            text: 'Dashboard',
            disabled: false
          },
          {
            text: 'Link 1',
            disabled: false
          },
          {
            text: 'Link 2',
            disabled: true
          }
        ]
        }
    },
    created(){
         axios.get('/api/product/search/'+ this.seotitle).then((Response)=> {
          this.view = Response.data
    
        });
    }
}
</script>

