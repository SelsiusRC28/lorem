<template>

    <Sidebar>
        <h2>Aprender</h2>
        <h4>Cursos: </h4>
        <div class="cursos-container">
            <div class="cursos-curso">
                <img src="storage/assets/cursos-foto.jpg" class="cursos-img">
                <div class="cursos-curso-container">
                    <h5 class="cursos-h5">Carding Basico</h5>
                    <p class="p">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris mauris, ornare auctor eget at a massa a, lectus. Vehicula mattis tristique laoreet imperdiet imperdiet consectetur et urna. I</p>
                    <button class="btn">Ver Curso</button>
                </div>
            </div>
             <div class="cursos-curso">
                <img src="storage/assets/cursos-foto.jpg" class="cursos-img">
                <div class="cursos-curso-container">
                    <h5 class="cursos-h5">Carding Basico</h5>
                    <p class="p">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris mauris, ornare auctor eget at a massa a, lectus. Vehicula mattis tristique laoreet imperdiet imperdiet consectetur et urna. I</p>
                    <button class="btn">Ver Curso</button>
                </div>
            </div>
             <div class="cursos-curso">
                <img src="storage/assets/cursos-foto.jpg" class="cursos-img">
                <div class="cursos-curso-container">
                    <h5 class="cursos-h5">Carding Basico</h5>
                    <p class="p">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris mauris, ornare auctor eget at a massa a, lectus. Vehicula mattis tristique laoreet imperdiet imperdiet consectetur et urna. I</p>
                    <button class="btn">Ver Curso</button>
                </div>
            </div>
             <div class="cursos-curso">
                <img src="storage/assets/cursos-foto.jpg" class="cursos-img">
                <div class="cursos-curso-container">
                    <h5 class="cursos-h5">Carding Basico</h5>
                    <p class="p">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris mauris, ornare auctor eget at a massa a, lectus. Vehicula mattis tristique laoreet imperdiet imperdiet consectetur et urna. I</p>
                    <button class="btn">Ver Curso</button>
                </div>
            </div>

        </div>
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
