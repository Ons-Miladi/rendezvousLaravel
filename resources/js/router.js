import Vue from 'vue';

import Router from 'vue-router';
import Personne from './Pages/Personne';
import Home from './Pages/Home';
import RendezVous from './Pages/Rendezvous';
Vue.use(Router);
const routes=new Router({
    routes:[
    {path:'',name:'Home',component:Home},
    {path:'/Personne',name:'Personne',component:Personne},
    {path:'/rendezvous',name:'Rendezvous',component:RendezVous}
     ] });

export default routes;