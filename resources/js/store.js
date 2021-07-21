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
        userStateAction: (Ct) => {
            axios.get("api/user/logged").then(response => {
                console.log(response)
                const userLogged = response.data.user;
                CT.commit('setUserState', userLogged);
            });
        }
    },
    plugins: [ createPersistedState() ]
});