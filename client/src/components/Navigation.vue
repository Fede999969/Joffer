<template>
  <div class="flex flex-grow max-w-screen mx-auto items-center">
      <div class="flex p-auto mx-auto px-3 font-bold text-xl">
        <h1>Joffer</h1>
      </div>
      <div class="flex flex-grow justify-end">
      <div v-for="link in navLinks" :key="link.code" :class="{
          'border-b-2 border-purple-800': link.code == currentRouteName,
          'border-b-2 border-gray-800': link.code !== currentRouteName
           }" 
           @click="goToLink(link)"
          class="m-8 cursor-pointer px-3 py-2">
          {{ link.label }}
      </div>
      </div>
  </div>
</template>

<script>
export default {
    data() {
        return{
            navLinks: [
                {
                    label: "Home",
                    code: "jobs_list",
                },
                {
                    label: "Nuovo Lavoro",
                    code: "job_create",
                },
            ]
        };
    },
    computed: {
        currentRouteName() {
            return this.$route.matched[0].name;
        }
    },
    methods: {
        goToLink(link) {
            this.$router.push({
                name: link.code
            })
        }
    }
};
</script>