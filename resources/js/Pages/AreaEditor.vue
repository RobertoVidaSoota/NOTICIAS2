<template>
    <jet-menu class="mb-3" />

    <div class="container mt-2">

        <div class="d-flex">
            <div class="perfil_img">
                <div class="my_img"
                style='background-image: url("https://images.pexels.com/photos/6454046/pexels-photo-6454046.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500")'></div>
            </div>

            <div class="w-100 p-4">
                <h2 class="display-3 fw-bold text-center nome_perfil">Lopa Ghost</h2>
                
                <inertia-link :href="route('cadastrar.noticia')"
                class="btn btn-success mt-5">
                    Cadastar uma notícia
                </inertia-link>
            </div>
            
        </div>
        
    </div>
</template>

<script>
import JetMenu from '@/Jetstream/Menu'

export default {
    components: {
        JetMenu
    }    
}
</script>

<style>
    .perfil_img{
        width: 270px;
        height: 300px;
        background: black;

        overflow: hidden;
    }
    .my_img{
        position: relative;
        max-width: 100%;
        height: 100%;

        background-size: 100% 100%;
        background-position: center;
        background-repeat: no-repeat;

        filter: brightness(0.7);
    }
</style>