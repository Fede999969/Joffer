<template>
 <div class="bg-grey-400 min-h-screen flex flex-row justify-between ml-5 mr-5">
    <div v-for="job in jobs" :key="job.id" @click="goToJobDetail(job)" class="flex flex-row w-1/4 h-2/5 bg-white shadow-md rounded text-center">
    <img class="h-24 w-24 mr-4" :src='job.fotologolinguaggio' />
    <div class="flex flex-col text-center">
            <div class="">
                <h2 class="text-xl text-bold">{{ job.linguaggiodiprogrammazione }}</h2>
                <span class="">In quale Azienda? {{ job.aziendaofferente }}</span>
            </div>
            <div class=""> Quanto mi paghi? {{ job.ral }} $ RAL
            </div>
            <div class="">
              <h1 class="">Dove? {{ job.location }}</h1>
            </div>
            </div>
    </div>
 </div>
</template>

<script>
import axios from "axios";


export default {
    name: "JobList",
    props: {
        msg: String
    },
    data() {
        return {
            jobs: []
        };
    },
    async mounted() {
        let response = await axios.get("http://localhost:8000/api/jobs");
        this.jobs = response.data;
    },

    methods: {
        goToJobDetail(job) {
            let url = "/jobs/" + job.id;
            this.$router.push(url);
        }
    }
};
</script>