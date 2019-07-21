<template>
    <div>
        <form @submit.prevent="createCategory">
            <div class="create-location-form input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Name</span>
                </div>
                <input v-model="newCategoryName" type="text" class="form-control" placeholder="Category Name" />
                <div class="input-group-prepend">
                    <span class="input-group-text">Parent Category</span>
                </div>
                <select v-model="newCategoryParent" class="form-control">
                    <option selected :value="null" > Select if needed </option>
                    <option v-for="row in categories" :key="row.id" :value="row.id" > {{ row.name }} </option>
                </select>
                <div class="input-group-append">
                    <button class="btn btn-primary">Create</button>
                </div>
            </div>
        </form>
        <table class="table table-striped table-bordered" v-if="!isFetching">
            <thead class="thead-dark">
                <th>ID</th>
                <th>Name</th>
                <th> Parent Category </th>
                <th></th>
            </thead>
            <tbody>
                <CategoryItem v-bind:category="row" v-for="row in categories" :key="row.id" v-bind:handleCategory="deleteCategory"/>  
            </tbody>
        </table>
        <div class="d-flex justify-content-center" v-else>
            <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import CategoryItem from './CategoryItem';

export default {
    data() {
        return {
            categories: [],
            newCategoryName: '',
            newCategoryParent: '',
            isFetching: true
        };
    },
    mounted() {
        this.getCategories();
    },
    methods: {
        getCategories() {
            return axios.get('/api/categories')
                .then(response => {
                    this.categories = response.data;
                    this.isFetching = false;
                }).catch(console.error);
        },
        createCategory() {
            return axios.post('/api/categories', {name: this.newCategoryName, parent_id: this.newCategoryParent})
                .then(this.getCategories)
                .then(() => {
                    this.newCategoryName = '';
                    this.newCategoryParent = '';
                })
                .catch(console.error);
        },
        deleteCategory(id) {
            return axios.post('/api/categories/' + id, {_method: 'DELETE'})
                .then(this.getCategories)
                .catch(console.error);
        }
    },
    components: {
        CategoryItem
    }
}
</script>

<style>

.fade-enter-active, .fade-leave-active {
    transition: opacity .5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
    opacity: 0;
}

/* Enter and leave animations can use different */
/* durations and timing functions.              */
.slide-fade-enter-active {
  transition: all .3s ease;
}
.slide-fade-leave-active {
  transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.slide-fade-enter, .slide-fade-leave-to
/* .slide-fade-leave-active below version 2.1.8 */ {
  transform: translateX(10px);
  opacity: 0;
}

.create-location-form {
    margin-bottom: 10px;
}
</style>