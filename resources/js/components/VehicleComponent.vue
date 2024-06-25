<template>
    <div>
        <h1>Vehicles</h1>
        <ul>
            <li v-for="vehicle in vehicles" :key="vehicle.id">{{ vehicle.brand }} {{ vehicle.model }} - {{ vehicle.license_plate }}</li>
        </ul>
    </div>
</template>

<script>
export default {
    data() {
        return {
            vehicles: []
        }
    },
    mounted() {
        axios.get('/api/vehicles')
            .then(response => {
                this.vehicles = response.data;
            });
    }
}
</script>
