<template>
    <Sidebar>
        <h2>Edit</h2>
       <form method="POST" @submit.prevent="actualizar">
            <div class="profile-div">



                <img :src="url" class="profile-img" for="file-input">


                <div class="profile-datos" >

                        <p class="p">Usuario:</p>
                        <input type="text" name="username" class="profile-input" v-model="form.username">
                        <br>
                        <p class="p">Rango:</p>
                        <select v-model="form.rango">
                            <option value="">No rango</option>
                            <option value="Vip">Vip</option>
                            <option value="Seller">Seller</option>
                            <option value="Admin">Admin</option>
                        </select>
                        <br>
                        <p class="p">Agregar Dias:</p>
                        <input type="number" class="profile-input" v-model="form.dias">
                        <br>
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
                username : this.$props.users.email,
                rango: '',
                dias: 0,
                saldo: this.$props.users.credit ? this.$props.users.credit : 1500,
            }
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
</style>
