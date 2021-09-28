import CategoryComponent from './components/CategoryComponent.vue'
export default {
    mode: 'history',
    base: 'vue_crud',
    fillback: true,
    routes:[
        {
            path:'/Category',
            component:CategoryComponent,
        },
    ],


}
