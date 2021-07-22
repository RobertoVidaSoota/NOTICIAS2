<template>
    <div class="alert alert-danger text-sm p-2" role="alert" v-if="hasErrors">
            <b v-for="(error, key) in errors" :key="key">{{ error }}</b>
    </div>
</template>

<script>
    export default {
        computed: {
            errors() {
                var e = this.$page.props.errors;
                var errorOne = e[Object.keys(e)[0]];
                return errorOne;

            },

            hasErrors() {
                return this.erros
            },
        }
    }
</script>
