<template>
    <div>
        <form @submit.prevent="createLocation">
            <div class="create-location-form input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Name</span>
                </div>
                <input v-model="newLocationName" type="text" class="form-control" placeholder="Location Name" />
                <div class="input-group-append">
                    <button class="btn btn-primary">Create</button>
                </div>
            </div>
        </form>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <th>ID</th>
                <th>Name</th>
                <th></th>
            </thead>
            <tbody>
                <Location v-for="row in locations" :key="row.id" v-bind:location="row" v-bind:handleLocation="deleteLocation"/>
            </tbody>
        </table>
    </div>
</template>

<script>
import axios from 'axios';
import Location from './Location';

export default {
    data() {
        return {
            locations: [],
            newLocationName: '',
        };
    },
    mounted() {
        this.getLocations();
    },
    methods: {
        getLocations() {
            return axios.get('/api/locations')
                .then(response => {
                    this.locations = response.data;
                }).catch(console.error);
        },
        createLocation() {
            return axios.post('/api/locations', {name: this.newLocationName})
                .then(this.getLocations)
                .then(() => this.newLocationName = '')
                .catch(console.error);
        },
        deleteLocation(id) {
            return axios.post('/api/locations/' + id, {_method: 'DELETE'})
                .then(this.getLocations)
                .catch(console.error);
        }
    },
    components: {
        Location
    }
}
</script>

<style>
.create-location-form {
    margin-bottom: 10px;
}
</style>