<template>
    <div>
        <h1>{{name}}</h1>
        <label for="city_id">Município <sup>*</sup></label>
        <select id="city_id" class="form-control">
            <option value="">-- selecione --</option>
        </select>
    </div>
</template>

<script>
export default {
    name: "MainComponent",
    data() {
        return {
            name: 'Jean Gomes',
            idade: 31
        }
    }
}
</script>

<style scoped>

</style>
