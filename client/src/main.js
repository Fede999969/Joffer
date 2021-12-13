import Vue from 'vue'
import App from './App.vue'
import './style.css'
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import JobsList from './components/JobsList.vue'
import JobView from './components/JobView.vue'
import JobCreate from './components/JobCreate.vue'

const routes = [
  {
    path: "",
    redirect: "/jobs",
  },
  {
    path: "/jobs",
    name: "jobs_list",
    component: JobsList
  },
  {
    path: "/jobs/:id",
    name: "job_view",
    component: JobView
  },
  {
    path: "/jobs/create",
    name: "job_create",
    component: JobCreate
  },
  {
    path: "/jobs/edit/:id",
    name: "job_edit",
    component: JobCreate
  },
]


const router = new VueRouter ({
  mode: "history",
  routes
});

Vue.config.productionTip = false

new Vue({
  render: h => h(App),
  router
}).$mount('#app')
