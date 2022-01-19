<template>

    <Sidebar>
        <div class="nav">
            <Link href="carding" class="nav-item">Gates</Link>
            <Link href="carding" class="nav-item">Gate1</Link>
        </div>
        <div class="grid grid-cols-8">
            <div class="checker col-span-4">
                <div>
                    <div class="lds-dual-ring" v-if="isLoading">
                    </div>
                      <textarea v-on:keyup="keyboardEvent" name="" id="" class="checker-textarea" placeholder="4685310400098585|04|2024|058" v-model.trim="cc" :class="blur" :disabled="isLoading"></textarea>
                    <p class="p p-error" v-if="error">Coloque la cc en formato : xxxxxxxxxxxxxxxxx|xx|xxxx|xxx</p>
                </div>

                <div class="checker-buttons">
                    <button @click="checkCC"  class="disabled" :class="startDisabled" :disabled="error">Iniciar</button>
                    <button class="checker-stop" @click="stopCC">Detener</button>
                </div>
            </div>
            <div class="checker-messages col-span-4">
               <span class="messages-cc">Namso-gen: </span> <a href="https://namso-gen.com/" target="_blank" class="a">https://namso-gen.com/ </a>
            </div>
        </div>
        <h3>Resultado:</h3>
        <button class="btn btn-vaciar" @click="deleteCards">Vaciar Tarjetas</button>

        <div v-for="cc in checked">
               <p v-if="cc.msg == 'Live'" class="cc-live">
                {{ cc.data.cc }}|{{ cc.data.mes }}|{{ cc.data.ano }}|{{ cc.data.cvv }} [Aprovada] ~ Check en Lorem Checker
            </p>
            <p v-else-if="cc.msg == 'Proxy Muerta'" class="cc-proxy">
                {{ cc.msg }} [Proxy] ~ Check en Lorem Checker
            </p>
            <p v-else-if="cc.msg == 'Dead'" class="cc-dead">
                {{ cc.data.cc }}|{{ cc.data.mes }}|{{ cc.data.ano }}|{{ cc.data.cvv }} [Reprovada] ~ Check en Lorem Checker
            </p>
        </div>





    </Sidebar>




</template>

<script>
import Sidebar from '@/Layouts/Sidebar.vue'
import { Head, Link } from '@inertiajs/inertia-vue3';
 import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';
import axios from 'axios'
import { required, minLength, between } from 'vuelidate/lib/validators'



export default {
    components:{
        Sidebar,
        Link,
        Loading,

    },
    data(){
        return{
            cc: '',
            checked: [],
            isLoading: false,
            error: true,
            start: true
        }
    },
    computed:{
        blur(){
            return this.isLoading ? 'blur' : ' '
        },
        startDisabled(){
            return this.error ? '' : 'checker-start'
        }
    },
    methods:{
        onCancel() {
                console.log('User cancelled the loader.')
        },
        deleteCards(){
            localStorage.removeItem('cards-local');
            this.checked = []
        },
       async checkCC() {
           this.start = true
           this.isLoading = true;
            const cards = this.cc.split("\n")

                for(let index = -1;index < cards.length; index++){
                    if(this.start == true){
                         let payload = { cc: cards[index+1] };
                        if(index == cards.length-1){
                            this.isLoading = false;
                            return
                        }
                        await axios.post('http://localhost/apiv2.php', payload).then(resp => {

                            this.checked.push(resp.data)
                        });
                         localStorage.setItem('cards-local', JSON.stringify(this.checked))
                    }else{
                        this.isLoading = false;
                        index+99
                    }

                }


        },
        stopCC(){

            this.start = false




        },
        keyboardEvent (e) {
           if(this.cc.includes('|') && this.cc.length > 15){
               this.error = false
           }else{
               this.error = true
           }
        }

    },
    created(){
        let datosDB = JSON.parse(localStorage.getItem('cards-local'))
        if(datosDB == null){
            this.checked = [];
        }else{
            this.checked = datosDB
        }
    }

    }



</script>

<style scoped>
    .nav{
        background: #08080C;
        border-radius: 5px;
        display: flex;
    }
    .nav-item{
        font-family: Oxanium;
        font-style: normal;
        font-weight: bold;
        font-size: 24px;
        line-height: 30px;
        color: #FFFFFF;
        padding: 20px 40px;
    }

    .checker{
        margin-top: 40px;
    }
    .checker-textarea{
        border: none;
        width: 100%;
        height: 342px;
        background: #191B1F;
        box-shadow: 15px 15px 20px rgba(0, 0, 0, 0.25);
        padding: 20px;
        font-family: Oxanium;
        font-style: normal;
        font-weight: 500;
        font-size: 20px;
        line-height: 25px;
        color: #576170;
    }
    .checker-buttons{
        margin-top: 10px;
        display: flex;
        justify-content: center;
        gap: 20px;
    }


    .disabled{
       border: none;
        background: #34D178;
        width: 200px;
        height: 50px;
        font-family: Oxanium;
        font-style: normal;
        font-weight: bold;
        font-size: 20px;
        line-height: 25px;
        color: #08080C;
        border-radius: 5px;
        opacity: 0.4;
        color: #191B1F;
        cursor: default;
    }

    .checker-start{
        background: #34D178;
        width: 200px;
        height: 50px;
        font-family: Oxanium;
        font-style: normal;
        font-weight: bold;
        font-size: 20px;
        line-height: 25px;
        color: #08080C;
        border-radius: 5px;
        cursor: pointer;
        opacity: 1;
    }

    .checker-start:hover{
       border: none;
        background: #34D178;
        transition-duration: 0.5s;
        transition-delay: 0.1s;
        opacity: 0.4;
        color: #191B1F;
    }


    .checker-stop{
        background: #08080C;
        border: 2px solid #191B1F;
        box-sizing: border-box;
        width: 200px;
        height: 50px;
        color: white;
        font-family: 'Oxanium', cursive;
        border-radius: 5px;
        font-size: 20px;
    }

    .checker-stop:hover{
       border: none;
        background: #34D178;
        transition-duration: 0.5s;
        transition-delay: 0.1s;
        opacity: 0.4;
        color: #191B1F;
    }

    .checker-messages{
        width: auto;
        padding: 20px;
        margin-top: 40px;
    }

    .messages-cc{
        font-family: Oxanium;
        font-style: normal;
        font-weight: normal;
        font-size: 20px;
        line-height: 25px;
        color: #BDBDBD;
    }

    h3{

        padding: 40px 0 0;
        display: inline-block;

    }

    .btn-vaciar{
        display: inline-block;
        margin: 0;
        height: 40px;
        width: 200px;
        font-size: 18px;
        position: relative;
        top: -10px;
        left: 10px;
    }

    .cc-live{
        font-family: Oxanium;
        font-style: normal;
        font-weight: bold;
        font-size: 20px;
        line-height: 25px;
        color: #34D178;
        padding-bottom: 5px;

    }
    .cc-dead{
        font-family: Oxanium;
        font-style: normal;
        font-weight: bold;
        font-size: 20px;
        line-height: 25px;
        color: #EB5757;
        padding-bottom: 5px;
    }

    .cc-proxy{
        font-family: Oxanium;
        font-style: normal;
        font-weight: bold;
        font-size: 20px;
        line-height: 25px;
        color: #969696;
        padding-bottom: 5px;
    }
    a{
        color: #34D178;
    }
    .lds-dual-ring {
        width: 40%;
        height: 80px;
        position: absolute;
        display: flex;
        justify-content: center;
        margin-top: 110px;
        z-index: 999;
    }
    .lds-dual-ring:after {
        content: " ";
        display: block;
        width: 64px;
        height: 64px;
        margin: 8px;
        border-radius: 50%;
        border: 6px solid #fff;
        border-color: #fff transparent #fff transparent;
        animation: lds-dual-ring 1.2s linear infinite;
    }
    @keyframes lds-dual-ring {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }

    .blur{
        filter: blur(3px);
    }

</style>
