<template>
    <div class="web">
        <div class="nav">
            <Link href="/" class="link">
                  <h1 class="titulo"> <span class="titulo-green">Lorem</span> Ipsum</h1>
            </Link>
            <div v-if="$page.props.user">
                {{ $page.props.user.email }}
            </div>
            <div v-else>
                 {{ $page.props.user }}
            </div>
        </div>
        <pre class="text-slate-50">
            {{ $page.props }}
        </pre>
         <pre class="text-slate-50">
            {{ $page.props }}
        </pre>
    </div>

</template>

<script>
import { defineComponent } from 'vue'
import { Head, Link } from '@inertiajs/inertia-vue3';

export default {
    components: {
            Head,
            Link,
    },
    props: {
            canLogin: Boolean,
            canRegister: Boolean,
            laravelVersion: String,
            phpVersion: String,
    }
}
</script>

<style scoped>
    .web{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        background: #131416;
        font-family: 'Oxanium', cursive;
        width: 100%;
        height: 100%;
    }
    .nav{
        background: #08080C;
        padding: 0 100px;
        width: 100%;
        height: 70px;
        position: fixed;
    }
    .titulo{
        font-family: Archivo Black;
        font-style: normal;
        font-weight: normal;
        font-size: 48px;
        line-height: 78px;
        letter-spacing: -0.125em;
        color: #FFFFFF;;
        text-align: center;
    }

    .titulo-green{
        color: #34D178;
    }
</style>
