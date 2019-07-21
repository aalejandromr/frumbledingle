<template>
    <div>
        <form @submit.prevent="getReports">
            <div class="create-location-form input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Search by price</span>
                </div>
                <input v-model="price" type="text" class="form-control" placeholder="Price to search" />
                <div class="input-group-append">
                    <button class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <th> Location </th>
                <th> Parent Category </th>
                <th> Category </th>
                <th> Count </th>
            </thead>
            <tbody>
                <tr v-for="row in reports" :key="row.id">
                    <td>{{ row.location }}</td>
                    <td> {{ row.parent_category && row.parent_category }}</td>
                    <td>{{ row.category }}</td>
                    <td>{{ row.Count }}</td>
                </tr>
            </tbody>
        </table>
      <pie-chart :data="reports.map(report => [report.category, report.Count])"></pie-chart>
    </div>
</template>

<script>
import axios from 'axios';
import Chartkick from 'vue-chartkick';
import Chart from 'chart.js'

Vue.use(Chartkick.use(Chart))

export default {
    data() {
        return {
            reports: [],
            price: ''
        };
    },
    mounted() {
        // this.getReports();
    },
    methods: {
        getReports() {
            return axios.get('/api/report', {
              params: {
                price: this.price
              }
            })
                .then(response => {
                    this.reports = response.data;
                    console.log(response.data);
                }).catch(console.error);
        }
    }
}
</script>

<style>
.create-location-form {
    margin-bottom: 10px;
}
</style>