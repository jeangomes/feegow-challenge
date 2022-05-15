<template>
    <form class="row g-3">
        <div class="col-md-6">
            <label for="inputNome" class="form-label">Nome completo</label>
            <input type="email" class="form-control" id="inputNome">
        </div>
        <div class="col-md-6">
            <label for="inputHowMeet" class="form-label">Como conheceu?</label>
            <select id="inputHowMeet" class="form-select">
                <option selected>selecione ...</option>
                <option>...</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="inputBirthday" class="form-label">Nascimento</label>
            <input type="text" class="form-control" id="inputBirthday">
        </div>
        <div class="col-md-6">
            <label for="inputCPF" class="form-label">CPF</label>
            <input type="text" class="form-control" id="inputCPF">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Solicitar horários {{professional_id}}</button>
        </div>
    </form>
</template>

<script>
// import axios from "axios";

export default {
    name: "FormSchedule",
    data() {
        return {
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
    }
/*    methods: {
        postPost() {
            this.finalModel.cities = '';
            this.finalModel.ufs = '';
            this.loading = true;
            axios.post('/create-customer', this.finalModel)
                .then(response => {
                    this.loading = false;
                    if (response.status === 201 || response.status === 200) {
                        this.wasCreated = true;
                        this.surveyCreated = response.data
                    }
                })
                .catch(e => {
                    this.errors = ('errors' in e.response.data) ? e.response.data.errors : [e.response.data.message];
                })
                .finally(() => this.loading = false)
        }
    }*/
}
</script>

<style scoped>

</style>
