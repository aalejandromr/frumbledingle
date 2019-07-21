<template>
  <transition name="fade">
    <tr >
      <td>{{ location.id }}</td>
      <td>{{ location.name }}</td>
      <td align="center"><button class="btn btn-danger btn-sm" @click.prevent="handleLocation(location.id)"><i class="fa fa-times" /> Delete</button></td>
    </tr>
  </transition>
</template>

<script>
  export default {
    props: ["location", "handleLocation"]
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