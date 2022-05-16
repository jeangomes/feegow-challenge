<template>
    <div>
        <p>Selecione uma especialidade para consultar os profissionais disponíveis.</p>
        <div class="row">
            <div class="col-md-8">
                <select required class="form-select" v-model="specialty_id">
                    <option value="0">-- selecione a especialidade --</option>
                    <option v-for="option in specialties.content" v-bind:value="option.especialidade_id">
                        {{ option.nome }}
                    </option>
                </select>
            </div>
            <div class="col-md-4">
                <button @click="getProfessionalList()" class="btn btn-success">Consultar</button>
            </div>
        </div>
        <div class="mt-3" v-if="professionals.length > 0">
            <h4>Profissionais encontrados para a especialidade selecionada:</h4>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col" v-for="professional in professionals">
                    <professional-card :professional="professional" @showForm="showForm"></professional-card>
                </div>
            </div>
        </div>
        <div class="mt-5" v-if="formVisible">
            <form-schedule
                :specialty_id="specialty_id"
                :professional_id="professional_id">
            </form-schedule>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import ProfessionalCard from "./ProfessionalCard";
import FormSchedule from "./FormSchedule";

export default {
    name: "MainComponent",
    components: {FormSchedule, ProfessionalCard},
    data() {
        return {
            professionals: [],
            formVisible: false,
            specialty_id: 0,
            professional_id: 0
        }
    },
    props: {
        specialties: {
            type: Object,
            required: true,
            default() {
                return {content: [{especialidade_id: '', nome: ''}]}
            }
        }
    },
    methods: {
        getProfessionalList() {
            this.formVisible = false
            this.professionals = []
            // ajax para rota api do laravel que vai consultar e retornar os dados da feegow
            if (this.specialty_id > 0) {
                axios.get('/api/professionals/' + this.specialty_id)
                    .then(response => (this.professionals = response.data))
                    .catch(e => {
                        this.errors.push(e)
                    })
            }
        },
        showForm(professional_id) {
            this.professional_id = professional_id
            this.formVisible = true
        }
    }
}
</script>

<style scoped>

</style>
