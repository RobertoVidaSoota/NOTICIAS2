import axios from 'axios';
import { createStore, Store } from 'vuex';
import createPersistedState from 'vuex-persistedstate';

export default createStore({
    state: {
        user: {}
    },
    mutations: {
        setUserState: (state, value) => state.value = value 
    }, 
    actions: {
        userStateAction: ({commit}) => {
            axios.get("api/logged").then(response => {
                console.log(response.data)
                const userLogged = response.data.user;
                commit('setUserState', userLogged);
            });
        }
    },
    plugins: [ createPersistedState() ]
});