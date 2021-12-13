<template>
  <div class="">
      <h1 class="">Aggiungi un nuovo Lavoro</h1>
      <div class="">
      <div class="">
          <div class="" v-for="(field, index) in formFields" :key="index">
              <label class="">
                  {{ field.label }}
              </label>
              <div class="flex-grow">
                  <div v-if="field.type =='text'">
                      <input  :placeholder="field.placeholder" 
                      class="" 
                      type="text" v-model="newJob[field.code]"/>
                  </div>
                  <div v-if="field.type =='number'">
                      <input  :placeholder="field.placeholder" 
                      class="" 
                      type="number" v-model="newJob[field.code]"/>
                  </div>
                  <div v-if="field.type =='select'">
                      <select  :name="field.code" class="" 
                      type="select" v-model="newJob[field.code]" :id="field.code">
                        <option v-for="option in field.options" :key="option.value" :value="option.value"> {{ option.label }} </option>
                      </select>
                  </div>
              </div>
              <div class="" v-if="field.required">
                  <span v-if="!newJob[field.code]">
                    Questo campo è obbligatorio
                  </span>
              </div>
          </div>
          <div>
              <button :disabled="!isFormValid" :class="{'': isFormValid, '': !isFormValid }" 
              @click="saveJob()">Pubblica
              </button>
          </div>
      </div>
      </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            isEdit: false,
            newJob: {
                location: "",
                fotologolinguaggio:"",
                aziendaofferente:"",
                ral: 0,
                descrizione: "",
                linguaggiodiprogrammazione: "",
                livellodiesperienza: "",
            },
            formFields: [
                {
                    code: "linguaggiodiprogrammazione",
                    label: "Linguaggio di Programmazione",
                    type: "select",
                    placeholder: "Inserisci il linguaggio di programmazione",
                    required: true,
                     options: [
                        {
                            value: "Laravel",
                            label: "Laravel"
                        },
                        {
                            value: "Vue",
                            label: "Vue"
                        },
                        {
                            value: "Php",
                            label: "Php"
                        },
                        {
                            value: "Html",
                            label: "Html"
                        },
                     ]
                },
                {
                    code: "location",
                    label: "Location",
                    type: "text",
                    placeholder: "Inserisci la location",
                    required: true,
                },
                {
                    code: "aziendaofferente",
                    label: "Azienda Offerente",
                    type: "text",
                    placeholder: "Inserisci il nome dell'azienda",
                    required: true,
                },
                {
                    code: "fotologolinguaggio",
                    label: "Logo linguaggio",
                    type: "text",
                    placeholder: "Inserisci il link dell'immagine",
                    required: true,
                },
                {
                    code: "descrizione",
                    label: "Descrizione",
                    type: "text",
                    placeholder: "Inserisci una descrizione",
                    required: true,
                },
                {
                    code: "ral",
                    label: "Ral",
                    type: "number",
                    placeholder: "Inserisci il Ral",
                    required: true,
                },
                {
                    code: "livellodiesperienza",
                    label: "Livello di Esperienza richiesto",
                    type: "select",
                    required: true,
                    options: [
                        {
                            value: "Junior",
                            label: "Junior"
                        },
                        {
                            value: "Senior",
                            label: "Senior"
                        },
                    ]
                },
            ]
        }
    },
    methods: {
        async saveJob() {
            let response;
            if (this.isEdit) {
                response = await axios.put("http://localhost:8000/api/jobs/edit/" + this.$route.params.id, this.newJob);
            }
            else if(!this.isEdit) {
                response = await axios.post("http://localhost:8000/api/jobs/create", this.newJob);
            }
            console.log(this.newJob);
            
            console.log(response.data);

            this.$router.push({
                name: "jobs_list"
            })
        }
    },
    computed: {
        isFormValid() {
            let formIsValid = true;

            formIsValid = formIsValid && !!this.newJob.linguaggiodiprogrammazione;
            formIsValid = formIsValid && !!this.newJob.fotologolinguaggio;
            formIsValid = formIsValid && !!this.newJob.aziendaofferente;
            formIsValid = formIsValid && !!this.newJob.ral;
            formIsValid = formIsValid && !!this.newJob.livellodiesperienza;
            formIsValid = formIsValid && !!this.newJob.location;
            formIsValid = formIsValid && !!this.newJob.descrizione;





            return formIsValid
            }
    },
    async mounted() {
        if (this.$route.name == 'job_edit') {
            this.isEdit = true;
            let jobId =this.$route.params.id;

            let response = this.newJob = await axios.get("http://localhost:8000/api/jobs/" + jobId);
            this.newJob = response.data;
            console.log(this.newJob)
        }
    }
}
</script>