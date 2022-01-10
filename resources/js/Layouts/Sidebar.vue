<template>
  <div class="sidebar" :class="dropclass">
      <i class="fas fa-bars fa-2x drop-icon" @click="drop"></i>
        <div class="profile-center">
            <div class="profile">
                <img src='storage/assets/unsplash_PM_VwL2ypes.png' class="profile-img">
                <div class="profile-container">
                    <span class="profile-name">Lorem Ipsum</span>
                    <span class="profile-type">User <span class="profile-range">VIP</span></span>
                </div>
            </div>
            <a href=""><button class="profile-btn">Profile</button></a>
      </div>

     <nav >
         <Link href="home" class="card" :class="{ 'active': $page.url === '/home' }">
            <i class="fas fa-home fa-2x card-img"></i>
            <span class="card-span">Inicio</span>
        </Link>

         <Link href="chat" class="card" :class="{ 'active': $page.url === '/chat' }">
            <i class="fas fa-comments fa-2x card-img"></i>
            <span class="card-span">Chat</span>
         </Link>
         <Link href="foro" class="card" :class="{ 'active': $page.url === '/foro' }">
            <i class="fas fa-question-circle fa-2x card-img"></i>
            <span class="card-span">Foro</span>
         </Link>
         <Link href="aprender" class="card" :class="{ 'active': $page.url === '/aprender' }">
            <i class="fas fa-graduation-cap fa-2x card-img"></i>
            <span class="card-span">Aprender</span>
         </Link>
         <Link href="tienda" class="card" :class="{ 'active': $page.url === '/tienda' }">
            <i class="fas fa-shopping-cart fa-2x card-img"></i>
            <span class="card-span">Tienda</span>
         </Link>
         <Link href="carding" class="card" :class="{ 'active': $page.url === '/carding' }">
            <i class="fas fa-credit-card fa-2x card-img"></i>
            <span class="card-span">Carding</span>
         </Link>
     </nav>
  </div>
  <div class="content" :class="dropContent">
      <h1 class="title"> <span class="title-green">Lorem</span> Ipsum</h1>
      <slot></slot>


  </div>
</template>

<script>
import { defineComponent } from 'vue'
import { Head, Link } from '@inertiajs/inertia-vue3';

export default {
    components:{
        Link
    },
    data(){
        return{
            dropdown: false
        }
    },
    computed:{
        dropclass(){
            return this.dropdown ? "drop" : ' '
        },
        dropContent(){
            return this.dropdown ? "drop-content" : ''
        }

    },
    methods:{
        drop(){
            if(this.dropdown == false){
                this.dropdown = true
            }else{
                this.dropdown = false
            }
           console.log(this.dropdown)
        }
    }
}
</script>

<style >
    body{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        background: #131416;
        font-family: 'Oxanium', cursive;
    }

    .sidebar{
        width: 300px;
        height: 100vh;
        background-color: #08080C;
        transition-duration: 1s;
        position: fixed;
    }
    .drop-icon{
        color:#576170;
        display: flex;
        justify-content: right;
        padding: 20px;
        cursor: pointer;
    }
    .profile-center{
        display: block;
        margin: 0px auto;
        width: 240px;
    }
    .profile{
        display: flex;
        padding-top: 30px;
    }
    .profile-img{
        width: 67px;
    }
    .profile-container{
        text-align: center;
        padding: 5px 10px;

    }
    .profile-name{
        font-family: 'Oxanium', cursive;
        font-style: normal;
        font-weight: bold;
        font-size: 24px;
        line-height: 30px;
        color: #F2F2F2;
        text-align: center;
        display: block;
    }
    .profile-type{
        font-family: Oxanium;
        font-style: normal;
        font-weight: normal;
        font-size: 20px;
        line-height: 25px;
        color: #D7D5D5;
        text-align: center;
        display: block;
    }
    .profile-range{
        color: #FAFF00;
    }
    .profile-btn{
        display: block;
        margin: 0 auto;
        background: #08080C;
        border: 2px solid #191B1F;
        box-sizing: border-box;
        width: 239px;
        height: 50px;
        color: white;
        margin-top: 10px;
        font-family: 'Oxanium', cursive;
        border-radius: 5px;
        font-size: 20px;
    }

    .profile-btn:hover{
        border: none;
        background: #34D178;
        transition-duration: 0.5s;
        transition-delay: 0.1s;
        opacity: 0.4;
        color: #191B1F;
    }

    nav{
        display: flex;
        flex-wrap: wrap;
        gap: 17px;
        justify-content: center;
        align-content: center;
        margin-top: 55px;
    }
    .card{
        width: 120px;
        height: 120px;
        background: #191B1F;
        border-radius: 10px;
        display: grid;
        align-content: center;
    }
    .card-img{
        display: block;
        margin: 0 auto;
        padding-bottom: 5px;
        color:#576170;

    }
    .card-span{
        font-family: Oxanium;
        font-style: normal;
        font-weight: bold;
        font-size: 20px;
        line-height: 22px;
        color: #576170;
        text-align: center;
        padding-top: 5px;

    }

    .card:hover{
        background: #34D178;
        opacity: 0.4;
        transition-duration: 0.5s;
         transition-delay: 0.1s;
    }

    /* Active links */
    .active {
        background: #34D178;
    }
    .active .card-img{
        color: #191B1F;
    }
    .active .card-span{
        color: #191B1F;
    }

    /* Dropwdown */
    .drop{
        width: 70px;
        transition-duration: 1s ;
    }

    .drop .profile-container{
        display: none;
        transition-duration: 1s;
    }
    .drop .profile-btn{
        display: none;
    }

    .drop .card{
        background: none;
        border-radius: none;
    }

    .drop .active .card-img{
        color: #34D178;
    }
    .drop .active .card-span{
        color: #34D178;
    }

    .drop-content{
        left: 70px !important;
        transition: all 1s ease;
         width: calc(100% - 70px) !important;
    }

    .content{
        width: calc(100% - 300px);
        position: relative;
        left: 300px;
        transition: 1s;
         padding: 30px 100px;
    }



    .title{
        font-family: Archivo Black;
        font-style: normal;
        font-weight: normal;
        font-size: 72px;
        line-height: 78px;
        letter-spacing: -0.125em;
        color: #FFFFFF;;
        text-align: center;
        padding-bottom: 50px;
    }

    .title-green{
        color: #34D178;
    }


    h2{
        font-family: Oxanium;
        font-style: normal;
        font-weight: bold;
        font-size: 48px;
        line-height: 60px;
        padding-bottom: 10px;
        color: #E0E0E0;
    }

    h3{
        font-family: Oxanium;
        font-style: normal;
        font-weight: bold;
        font-size: 38px;
        line-height: 60px;
        padding-bottom: 10px;
        color: #E0E0E0;
    }

    .p{
        font-family: Oxanium;
        font-style: normal;
        font-weight: normal;
        font-size: 20px;
        line-height: 25px;
        color: #BDBDBD;
    }
    .a{
        font-family: Oxanium;
        font-style: normal;
        font-weight: normal;
        font-size: 20px;
        line-height: 25px;
        color: #34D178;
    }
</style>
