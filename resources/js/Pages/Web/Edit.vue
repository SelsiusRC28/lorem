<template>
    <Sidebar>
         <div
                class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"

            >
                <span class="font-medium">Asignar un Rango ya le suma dias y saldo</span>
            </div>
        <h2>Edit</h2>
       <form method="POST" @submit.prevent="actualizar">
            <div class="profile-div">



                <img :src="url" class="profile-img" for="file-input">


                <div class="profile-datos" >

                        <p class="p">Usuario:</p>
                        <input type="text" name="username" class="profile-input" v-model="username" disabled>
                        <br>
                        <p class="p">Hasta:</p>
                        <input type="text" name="days" class="profile-input" v-model="days" disabled>
                        <br>
                            <div v-if="hasRole(['Admin'])">
                            <p class="p">Rango:</p>
                                <select v-model="form.rango" class="ml-5">
                                        <option value="">No rango</option>
                                        <option value="Vip">Vip</option>
                                </select>
                            </div>
                             <div v-if="hasRole(['Owner'])">
                                  <p class="p">Rango:</p>
                                <select v-model="form.rango" class="ml-5">
                                        <option value="">No rango</option>
                                        <option value="Vip">Vip</option>
                                        <option value="Seller">Seller</option>
                                        <option value="Admin">Admin</option>
                                </select>
                            </div>
                        <p class="p">Checker Saldo:</p>
                        <input type="number" class="profile-input" v-model="form.saldo">
                        <br>
                                    <div
                                        v-if="errors.image"
                                        class="font-bold text-red-600"
                                    >
                                        {{ errors.image }}
                                    </div>
                        <button class="btn profile-btn" type="submit">Actualizar Informacion</button>

                </div>
            </div>
        </form>
        {{ $page.props }}
    </Sidebar>
</template>

<script>
import Sidebar from "@/Layouts/Sidebar.vue";
import axios from "axios";

import { Head, Link, useForm, usePage } from "@inertiajs/inertia-vue3";

export default {
    components: {
        Sidebar,
        Link,
    },
     props: {
         users : Object,
         errors : Object
     },
    data(){
        return{
            form:{
                rango: '',
                saldo: this.$props.users.credit ? this.$props.users.credit : 0,
            },
            username: this.$props.users.email,
            days: this.$props.users.days
        }
    },
    methods: {
        actualizar(){
            this.$inertia.put(route("role-role",  this.$props.users.id) , {role :this.form});
        },
    },
    created(){
        console.log(this.$props.users.id)
    }
};
</script>

<style scoped>
h3 {
    font-family: Oxanium;
    font-style: normal;
    font-weight: normal;
    color: #bdbdbd;
    text-align: center;
}
.span-404 {
    font-size: 100px;
    margin-top: 160px;
}
.proximamente {
    font-size: 30px;
}

.profile-div{
        display: flex;
        margin-top: 20px;
    }
    .profile-img{
        width: 300px;
        height: 300px;
        background-size: cover;
        background-position: center top;
    }
    .profile-img:hover{
        cursor: pointer;
        transition-duration: 0.5s;
        filter: blur(3px) grayscale(60%);
    }
    .profile-file-input{
        display: none;
    }
    .profile-file-svg{
        position: absolute;
        margin-top: 90px;
        margin-left: 105px;
        opacity: 0.3;
    }
    .p{
        font-size: 25;
        display: inline-block;
    }
    .profile-input{
        border: none;
        background: #191B1F;
        box-shadow: 15px 15px 20px rgba(0, 0, 0, 0.25);
        font-family: Oxanium;
        font-style: normal;
        font-weight: 500;
        font-size: 20px;
        line-height: 25px;
        color: #576170;
        margin: 10px;
    }
    .profile-datos{
        margin: 0 30px;
    }
    .profile-btn{
        background: #34D178;
        color: #08080C;
        width: 300px;
    }
   .form-logout{
       margin: 50px 0;
   }
   .btn-logout{
       margin: 10px 0;
   }
</style>
