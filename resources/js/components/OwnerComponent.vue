<template>
    <div>
        <h1>Owners</h1>
        <ul>
            <li v-for="owner in owners" :key="owner.id">{{ owner.name }} {{ owner.last_name }} - {{ owner.email }}</li>
        </ul>
    </div>
</template>

<script>
export default {
    data() {
        return {
            owners: []
        }
    },
    mounted() {
        axios.get('/api/owners')
            .then(response => {
                this.owners = response.data;
            });
    }
}
</script>
