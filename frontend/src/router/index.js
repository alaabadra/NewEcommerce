import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

const routes = [{
        path: "/",
        name: "Home",
        component: () =>
            import ("../views/en/Home.vue")
    },
    {
        path: "/cart",
        name: "cart",
        component: () =>
            import ("../views/en/cart.vue")
    },
    {
        path: "/order",
        name: "order",

        component: () =>
            import ("../views/en/order.vue")
    },
    {
        path: "/editOrder/:id",
        name: "editOrder",
        component: () =>
            import ("../views/en/editOrder.vue")
    }
];

const router = new VueRouter({
    mode: "hash",
    base: process.env.BASE_URL,
    routes
});

export default router;