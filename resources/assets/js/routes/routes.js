import Vue from "vue";
import Router from "vue-router";
import SearchPages from "../pages/SearchPages";
import ViewProduct from "../pages/ViewProduct";


Vue.use(Router);

const routes = [
  {
    path: "/search",
    name: "SearchPages",
    component: SearchPages

  },
  {
    path: '/search/:seotitle',
    name: 'ViewProduct',
    component: ViewProduct
    
  }
]
export default new Router({
    mode: 'history',
    routes
});
