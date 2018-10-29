import Vue from "vue";
import Router from "vue-router";
import SearchPages from "../pages/SearchPages";

Vue.use(Router);

const routes = [
  {
    path: "/search",
    name: "SearchPages",
    component: SearchPages

  }
]
export default new Router({
    mode: 'history',
    routes
});
