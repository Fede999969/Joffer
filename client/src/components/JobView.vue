<template>
<div>
    <div class="min-h-screen">
      <div class="">
        <img class="" :src="job.fotologolinguaggio" alt="" />
      <div class="">
        <div class="">
          <div class="">
            <span class="">
              {{ job.aziendaofferente }}
            </span>
            <div class="">
              {{ job.linguaggiodiprogrammazione }} 
            </div>
          </div>
        <h4 class="">
          {{ job.descrizione }}
        </h4>
        <div class="">
          {{ job.ral }}
        </div>
      <div class="">
        {{ job.livellodiesperienza }}
      </div>
      <div class="">
        {{ job.location }}
      </div>
  </div>
  </div>
  </div>
</div>
        <div class="flex flex-grow">
          <button @click="home()" class="flex ml-4 mt-2 mr-auto text-white bg-purple-600 px-3 py-2 text-sm font-semibold rounded-ad rounded cursor-pointer">Indietro</button>
          <button @click="edit(job)" class="flex mr-4 mt-2 text-white bg-purple-600 px-3 py-2 text-sm font-semibold rounded-ad rounded cursor-pointer">Modifica</button>
          <button @click="del()" class="flex mr-4 mt-2 text-white bg-purple-600 px-3 py-2 text-sm font-semibold rounded-ad rounded cursor-pointer">Cancella</button>
        </div>
      </div>
  
</template>
<script>
import axios from "axios";

export default {
  name: "JobView",
  data() {
    return {
      job: {}
    };
  },
  async mounted() {
    let jobId = this.$route.params.id;
    console.log(jobId);

    let response = await axios.get("http://localhost:8000/api/jobs/" + jobId);

    this.job = response.data;
  },
  methods: {
    edit(job) {
      this.$router.push({
              name: "job_edit",
              params: {
                id: job.id
              }
            })
    },
    del() {
      if(confirm("Vuoi cancellare davvero questo bel lavoro?")){
      let jobId = this.$route.params.id;
      axios.delete("http://localhost:8000/api/jobs/delete/" + jobId),
      this.$router.push({
                name: "jobs_list"
            })
      }
    },
    home() {
      this.$router.push({
                name: "jobs_list"
            })
    }
  }
};
</script>