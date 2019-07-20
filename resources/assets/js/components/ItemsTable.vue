<template>
    <div>
        <form @submit.prevent="createItem">
            <div class="create-location-form input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Name</span>
                </div>
                <input v-model="newItemName" type="text" class="form-control" placeholder="Item Name" />
                <div class="input-group-prepend">
                    <span class="input-group-text">Price</span>
                </div>
                <input v-model="newItemPrice" type="text" class="form-control" placeholder="Item Price" />
                <div class="input-group-prepend">
                    <span class="input-group-text">Locations</span>
                </div>
                <select v-model="newItemLocation" class="form-control">
                  <option selected> Select One </option>
                  <option v-for="location in locations" :key="location.id" :value="location.id" > {{ location.name }} </option>
                </select>
                <div class="input-group-prepend">
                    <span class="input-group-text">Categories</span>
                </div>
                <select v-model="newItemCategory" class="form-control">
                  <option selected> Select One </option>
                  <option v-for="category in categories" :key="category.id" :value="category.id" > {{ category.name }} </option>
                </select>
                <div class="input-group-append">
                    <button class="btn btn-primary">Create</button>
                </div>
            </div>
        </form>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Location</th>
                <th>Category</th>
                <th></th>
            </thead>
            <tbody>
                <tr v-for="item in items" :key="item.id">
                    <td>{{ item.id }}</td>
                    <td> {{ item.name }}</td>
                    <td> {{ item.price }}</td>
                    <td> {{ item.location.name }}</td>
                    <td> {{ item.category.name }}</td>
                    <td align="center"><button class="btn btn-danger btn-sm" @click.prevent="deleteItem(item.id)"><i class="fa fa-times" /> Delete</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            items: [],
            locations: [],
            categories: [],
            newItemName: '',
            newItemPrice: '',
            newItemLocation: '',
            newItemCategory: ''
        };
    },
    mounted() {
        this.getItems();
        this.getLocations();
        this.getCategories();
    },
    methods: {
        getItems() {
            return axios.get('/api/items')
                .then(response => {
                    this.items = response.data;
                }).catch(console.error);
        },
        getLocations() {
            return axios.get('/api/locations')
                .then(response => {
                    this.locations = response.data;
                }).catch(console.error);
        },
        getCategories() {
            return axios.get('/api/categories')
                .then(response => {
                    this.categories = response.data;
                }).catch(console.error);
        },
        createItem() {
            return axios.post('/api/items', {
                  name: this.newItemName, 
                  price: this.newItemPrice,
                  location: this.newItemLocation, 
                  category: this.newItemCategory
                })
                .then(this.getItems)
                .then(() => {
                  this.newItemName = '';
                  this.newItemPrice = '';
                  this.newItemLocation = '';
                  this.newItemCategory = '';
                })
                .catch(console.error);
        },
        deleteItem(id) {
            return axios.post('/api/items/' + id, {_method: 'DELETE'})
                .then(this.getItems)
                .catch(console.error);
        }
    }
}
</script>

<style>
.create-location-form {
    margin-bottom: 10px;
}
</style>