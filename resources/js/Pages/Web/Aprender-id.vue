<template>

    <Sidebar>
        <h3 class="span-404">404</h3>
        <h3 class="proximamente">Proximamente...</h3>
        {{ videos }}
    </Sidebar>




</template>

<script>
import Sidebar from '@/Layouts/Sidebar.vue'
import axios from 'axios'
import { Head, Link } from '@inertiajs/inertia-vue3';

export default {
    components:{
        Sidebar,
        Link
    },
    props:{
        videos: Object
    }
    }



</script>

<style scoped>
    h3{
        font-family: Oxanium;
        font-style: normal;
        font-weight: normal;
        color: #BDBDBD;
        text-align: center;
    }
    .span-404{
        font-size: 100px;
        margin-top: 160px;
    }
    .proximamente{
        font-size: 30px;
    }

</style>
