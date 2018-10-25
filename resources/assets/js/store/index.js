import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';

Vue.use(Vuex);



export const store = new Vuex.Store({
    state: {
        prod: [],
        results: [],
        status: false
      },
      actions: {
        loadProducts ({ commit }) {
          axios.get('/api/product/search').then(r => r.data).then(prod => {
            commit('SET_PRODUCTS', prod)
           
            })
        }
      },
      mutations: {
       SET_PRODUCTS (state, prod) {
          state.prod = prod
          
        },
        SET_RESULTS (state, results){
          state.results = results
          state.status = state.results.length === 0;

        },
        
      }
})