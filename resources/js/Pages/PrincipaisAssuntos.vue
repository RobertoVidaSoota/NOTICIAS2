<template>
    <jet-menu />

    <div class="container mt-5">

        <div class="group_list">
            <!-- ASSUNTO -->
            <div class="card_assunto card bg-light p-3">
                <h1 class="display-1 fw-bolder">
                    <inertia-link :href="route('completa', '1')" 
                    class="text-success text-decoration-none">
                            Noticia Completa
                    </inertia-link>
                </h1>
            </div>

        </div>
    </div>
</template>

<script>
import JetMenu from '@/Jetstream/Menu';

export default {
    components: {
        JetMenu,
    }
}
</script>

<style>
.card_assunto{
    height: 150px;
}
</style>