<template>
    <jet-menu />

    <div class="container mt-5">

        <div class="w-100"
            v-if="erros">
            <div class="mx-auto alert alert-danger col-6">
                <b> {{ erros }} </b>
            </div>
        </div>


        <div v-if="$page.props.user" class="card mb-2">
            <!-- FORMULARIO DE COMENTARIO -->
            <div class="card-header">
                <form v-on:submit.prevent="comentar">
                    <div class="row mb-2">
                        <!-- O CERTO É FAZER SELECT (sem a rota resource) -->
                        <div class="col-sm-2 col-12">
                            <input type="number" placeholder="ID" class="form-control"
                            v-model="fk_noticia">
                        </div>

                        <div class="col-sm-6 col-12">
                            <input type="text" placeholder="Comentário" class="form-control"
                            v-model="texto_comentario">
                        </div>

                        <div class="col-sm-2 col-12">
                            <button class="btn btn-success btn-small">
                                Confirmar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- PARTE DINÂMICA -->
        <div  v-for="(c, key) in dados_comentarios[0]" :key="key"
        class="comentarios card bg-light mb-2">

            <!-- COMENTARIO PUBLICADO -->
            <div class="card-header">
                <inertia-link class="text-success" 
                    :href="route('completa', c.noticia.id)">
                   <b> {{ c.noticia.titulo }} </b>
                </inertia-link>
                <h3> {{ c.user.name }} </h3>
                <p>{{ c.texto_comentario }}</p>
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
        return {
            // DADOS BUSCADOS
            dados_comentarios: [],
            erros: "",
            response_form: [],
            // DADOS PARA ENVIAR
            texto_comentario: "",
            fk: "",
            fk_noticia: ""
        }
    },
    mounted()
    {
        // PEGAR TODOS OS CAMENTARIOS MAIS RELEVANTES
        axios.get("http://127.0.0.1:8000/api/comentario").then((res) => {
            this.dados_comentarios.push(res.data.comentarios)
            console.log(this.dados_comentarios[0])
        });

        // PEGAR ID DO USUÁRIO LOGADO
        axios.get("api/user/logged").then(response => {
                this.fk = response.data.user.id
        });
    },
    methods:{
        // ENVIAR COMENTARIO
        comentar: function()
        {
            axios.post("http://127.0.0.1:8000/api/comentario",
            {
                texto_comentario: this.texto_comentario,
                fk_id_users: this.fk,
                fk_id_noticias: this.fk_noticia
            }).then((res) => {
                console.log(this.response_form);
                if(res.data.success)
                {
                    location.reload();
                }
                else
                {
                    this.erros = res.data.error
                }
            });
        }
    }
}
</script>

<style>
/* .comentarios{
     height: 600px; 
} */
.box_img_coment{
    height: 430px;
    width: 800px;
    overflow: hidden;
}
.img_coment{
    position: relative;
    max-width: 100%;
    height: 100%;

    background-size: 100% 100%;
    background-position: center;
    background-repeat: no-repeat;
    object-fit: contain;

    filter: brightness(0.7);
    border-radius: calc(.25rem - 1px) calc(.25rem - 1px);
}
</style>