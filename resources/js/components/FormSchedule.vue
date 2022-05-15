<template>
    <form class="row g-3" @submit="postData">
        <div class="col-md-6">
            <label for="inputNome" class="form-label">Nome completo</label>
            <input type="text" class="form-control" id="inputNome" required v-model="myData.name">
        </div>
        <div class="col-md-6">
            <label for="inputHowMeet" class="form-label">Como conheceu?</label>
            <select id="inputHowMeet" class="form-select" required v-model="myData.source_id">
                <option selected>selecione ...</option>
                <option v-for="source in sources" v-bind:value="source.origem_id">
                    {{ source.nome_origem }}
                </option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="inputBirthday" class="form-label">Nascimento</label>
            <input type="date" class="form-control" id="inputBirthday" required v-model="myData.birthdate">
        </div>
        <div class="col-md-6">
            <label for="inputCPF" class="form-label">CPF</label>
            <input type="text" v-mask="'###.###.###-##'" class="form-control" id="inputCPF" required v-model="myData.cpf">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Solicitar horários {{professional_id}}</button>
        </div>
        <div class="col-12" v-if="wasCreated">
            <div class="alert alert-success" role="alert">
                Operação realizada com sucesso!
            </div>
        </div>
        <div class="col-12" v-if="hasError">
            <div class="alert alert-warning" role="alert">
                Operação não realizada com sucesso!
            </div>
        </div>
    </form>
</template>

<script>
import axios from "axios";

export default {
    name: "FormSchedule",
    data() {
        return {
            loading: false,
            wasCreated: false,
            hasError: false,
            sources: [{origem_id: '', nome_origem: ''}],
            myData: {
                specialty_id: '',
                professional_id: '',
                name: '',
                source_id: '',
                birthdate: '',
                cpf: ''
            }
        }
    },
    props: {
        specialty_id: {
            type: Number,
            required: true
        },
        professional_id: {
            type: Number,
            required: true
        }
    },
    mounted() {
        this.myData.specialty_id = this.specialty_id
        this.myData.professional_id = this.professional_id
        axios.get('/api/sources')
            .then(response => (this.sources = response.data))
            .catch(e => {
                this.errors.push(e)
            })
    },
    methods: {
        postData() {
            this.loading = true;
            axios.post('/api/solicitations', this.myData)
                .then(response => {
                    this.loading = false;
                    if (response.status === 201) {
                        this.wasCreated = true;
                    }
                })
                .catch(e => {
                    this.hasError = true;
                })
                .finally(() => this.loading = false)
        }
    }
}
</script>

<style scoped>

</style>
