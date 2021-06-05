import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        cartItems: []
    },
    mutations: {
        addToCart: (x, state) => {
            state.cartItems.push(x)
        }
    },
    actions: {},
    modules: {}
});