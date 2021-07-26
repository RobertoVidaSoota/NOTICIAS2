<template>
    <jet-menu />

    <div class="container mt-5">

        <div class="group_list">
            <!-- ASSUNTO -->
            <!-- <div class="card_assunto card bg-light p-3 mb-3">
                <h1 class="display-1 fw-bolder">
                    <inertia-link :href="route('completa', '1')" 
                    class="text-success text-decoration-none">
                            Noticia Completa
                    </inertia-link>
                </h1>
            </div> -->

            <div class="card_assunto card bg-light p-3 mb-3"
                v-for="(p, key) in response" :key="key">
                <h1 class="display-1 fw-bolder">
                    <inertia-link :href="route('completa', p.id)" 
                    class="text-success text-decoration-none">
                            {{ p.informacao_adicional }}
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
    },
    data()
    {
        return{
            response: []
        }
    },
    mounted()
    {
        // PEGAR INFORMAÇÃO ADICIONAL
        axios.get("http://127.0.0.1:8000/api/noticia").then((res) => {
            for(var i = 0; i < res.data[0].length; i++)
            {   
                if(res.data[0][i].informacao_adicional !== null){
                    this.response.push(res.data[0][i])
                }
            }
            
            console.log(this.response)
        })
    }
}
</script>

<style>
.card_assunto{
    height: 150px;
}
</style>