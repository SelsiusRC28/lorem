<template>


          <div class="vld-parent">
            <loading v-model:active="isLoading"
                    :can-cancel="true"
                    :on-cancel="onCancel"
                    :is-full-page="fullPage"/>

            <label><input type="checkbox" v-model="fullPage">Full page?</label>
            <button @click.prevent="doAjax">fetch Data</button>
        </div>





</template>

<script>

import axios from 'axios'
import { Head, Link } from '@inertiajs/inertia-vue3';
 import Loading from 'vue-loading-overlay';

export default {
    components:{

        Link,
        Loading
    },
     data() {
            return {
                isLoading: true,
                fullPage: true
            }
    },
     methods: {
            doAjax() {
                this.isLoading = true;
                // simulate AJAX
                setTimeout(() => {
                    this.isLoading = false
                }, 5000)
            },
            onCancel() {
                console.log('User cancelled the loader.')
            }
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
    loading{
        background: red;
    }
</style>
