<template>
<v-app> 
  <div  id='app'>
<headers></headers>
<router-view></router-view>
<footers></footers>
  </div>
</v-app> 
</template>
<script>
import footers from '../components/footers.vue';
import Headers from '../components/Headers.vue';

export default {

  name: 'App',
  components: { 
      footers,
      Headers
    }
};
</script>