<template>

    <Sidebar>
        <h2>Aprender</h2>
        <h4>Cursos: </h4>
        <div class="cursos-container">
            <div class="cursos-curso" v-for="curso in cursos">
                <img :src="'storage/'+curso.img" class="cursos-img">
                <div class="cursos-curso-container">
                    <h5 class="cursos-h5">{{ curso.name }}</h5>
                    <p class="p">{{ curso.description }}</p>
                    <Link :href="route('aprender-id', curso.id)" method="get"><button class="btn" >Ver Curso</button></Link>
                </div>
            </div>


        </div>
        {{ cursos }}
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
        cursos: Object
    }

    }



</script>

<style scoped>
    .cursos-container{
        display: grid;
        grid-template-columns: 25% 25% 25% 25%;
        gap: 20px;
    }

    .cursos-curso{
        background: rgba(25, 27, 31, 0.8);
        box-shadow: 15px 15px 20px rgba(0, 0, 0, 0.25);
        align-self: flex-start;
    }
    .cursos-curso-container{
        padding: 20px;
    }
    .cursos-h5{
        font-family: Oxanium;
        font-style: normal;
        font-weight: bold;
        font-size: 30px;
        display: flex;
        align-items: center;
        color: #ffffff;
    }

    .cursos-p{
        padding: 30px;
    }

</style>
