<template>
    <form>
        <div class="row">
            <div class="col-md-8">
                <label for="especialidade_id">Consulta de<sup>*</sup></label>
                <select id="especialidade_id" class="form-select">
                    <option value="">-- selecione a especialidade --</option>
                    <option v-for="option in specialties.content" v-bind:value="option.especialidade_id">
                        {{ option.nome }}
                    </option>
                </select>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Agendar</button>
            </div>
        </div>
    </form>
</template>

<script>
export default {
    name: "MainComponent",
    data() {
        return {
            name: 'Jean Gomes',
            idade: 31
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
        getProfessionalList () {
            // ajax para rota api do laravel que vai consultar e retornar os dados da feegow
        }
    }
}
</script>

<style scoped>

</style>
