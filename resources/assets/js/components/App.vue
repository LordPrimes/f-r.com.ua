<template>
<v-app> 
  <div  id='app'>
<headers></headers>
<router-view></router-view>
<footer-componet> </footer-componet>
  </div>
</v-app> 
</template>
<script>
import footerComponet from '../components/footerComponet.vue';
import Headers from '../components/Headers.vue';

export default {

  name: 'App',
  components: { 
      footerComponet,
      Headers
    }
};
</script>