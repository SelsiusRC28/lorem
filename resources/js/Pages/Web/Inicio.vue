<template>
    <Sidebar>
        <h2>Anuncios:</h2>
        <div class="anuncios">
           <img src="storage/assets/anuncios-img.png" class="anuncios-img">
           <h5 class="anuncios-h5">Actualziacion:</h5>
           <ul>
               <li>Se ha agregado mas videos a la seccion <a href=""> Aprender.</a></li>
               <li>Se ha agregado mas videos a la seccion <a href=""> Aprender.</a></li>
               <li>Se ha agregado mas videos a la seccion <a href=""> Aprender.</a></li>
               <li>Se ha agregado mas videos a la seccion <a href=""> Aprender.</a></li>
           </ul>
        </div>
    </Sidebar>




</template>

<script>
import Sidebar from '@/Layouts/Sidebar.vue'
import axios from 'axios'

export default {
    components:{
        Sidebar
    },
    methods:{
        async makeGetRequest() {

            let res = await axios.get('https://jsonplaceholder.typicode.com/todos/');

            let data = res.data;
            console.log(data);
        }
    },
    created(){
        this.makeGetRequest()
    }


}
</script>

<style >
    .anuncios{

        width: 600px;
        height: auto;
        border-radius: 16px;
        border: 1px solid #34D178;
        padding: 40px;

    }
    .anuncios-img{
        width: 560px;
        height: 360px;
         object-fit: cover;
         display: block;
         margin: 0 auto;
    }
    .anuncios-h5{
        font-family: Oxanium;
        font-style: normal;
        font-weight: bold;
        font-size: 24px;
        line-height: 30px;
        display: flex;
        align-items: center;
        color: #BDBDBD;
    }
    li{
        font-family: Oxanium;
        font-style: normal;
        font-weight: normal;
        font-size: 20px;
        line-height: 25px;
        display: flex;
        align-items: center;
         color: #BDBDBD;
    }
    a{
        color: #34D178;
    }
</style>
