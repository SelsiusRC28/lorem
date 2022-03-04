<template>
    <Sidebar>
        <h2>Anuncios </h2>
        <div class="anuncios" v-for="post in posts">
           <img :src="'storage/'+post.img" class="anuncios-img">
           <h5 class="anuncios-h5">{{ post.title }} </h5>
           <span class="inicio-autor">by: {{post.user.email}}</span>
           <p class="p">
               {{ post.text }}
           </p>
        </div>

        <br>
        {{ users }}
    </Sidebar>




</template>

<script>
import Sidebar from '@/Layouts/Sidebar.vue'
import axios from 'axios'

export default {
    components:{
        Sidebar
    },
    props:{
        users: Object,
        posts: Object
    },

    methods:{

    },
    created(){

    }


}
</script>

<style >
    .anuncios{

        width: 600px;
        height: auto;
        border-radius: 16px;
        border: 1px solid #34D178;
        padding: 20px;
        word-wrap: break-word;
        margin-bottom: 50px;

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
        font-size: 30px;
        display: flex;
        align-items: center;
        color: #ffffff;
        margin-top: 10px;

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

    .p{
        line-height: none;
    }
    .inicio-autor{
        font-family: Oxanium;
        font-style: normal;
        font-weight: bold;
        font-size: 18px;
        display: flex;
        align-items: center;
        color: #BDBDBD;
        margin-top: -10px;
        margin-bottom: 5px;
    }
</style>
