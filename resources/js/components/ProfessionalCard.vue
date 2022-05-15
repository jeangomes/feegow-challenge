<template>
    <div class="card border-secondary h-100">
        <div class="row g-0">
            <div class="col-md-4">
                <img :src="imageProfessional" class="img-fluid rounded-start" alt="Imagem">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ professional.tratamento }} {{ professional.nome }}</h5>
                    <p v-if="professional.conselho && professional.documento_conselho" class="card-text">
                        {{ professional.conselho }}: {{ professional.documento_conselho }}
                    </p>
                    <button class="btn btn-success" @click="selectProfessional(professional.profissional_id)">Agendar</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ProfessionalCard",
    props: {
        professional: {
            type: Object,
            required: true,
            default() {
                return {tratamento: '', nome: '', conselho: '', documento_conselho: '', foto: '', profissional_id: ''}
            }
        }
    },
    computed: {
        imageProfessional() {
            return this.professional.foto ? this.professional.foto : 'https://via.placeholder.com/200'
        }
    },
    methods: {
        selectProfessional (professional_id) {
            this.$emit('showForm', professional_id)
        }
    }
}
</script>
