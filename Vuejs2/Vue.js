
// Component Part

const Gestionfilm = {
    template: '#gestionfilm', 
    name: 'Gestionfilm',
    data: () => {
        return {
            
        }
    }, 
    computed: {
        
    },
    mounted(){
    }
}

const Parameter = {
    template: '#parameter', 
    name: 'Parameter',
    data: () => {
        return {
            
        }
    }, 
    computed: {
        
    },
    methods:{
        
    },
    mounted(){

    }
}


const Home = {
    template: '#home', 
    name: 'Home',
    data: () => {
        return {
            name: "",
            statu: ""
        }
    }, 
    computed: {
        nom() {
            return this.name;      
		},
        statuUser(){
            return this.statu;
        }
    },
    mounted(){
        this.name = this.$root.nom
        this.statu = this.$root.statu
    }
}

const routes = [
    {path: '/', component: Home},
    {path: '/Parameter', component: Parameter},
    {path: '/Parameter/Gestionfilm', component: Gestionfilm},
]

const router = new VueRouter({
    routes
})

const vm = new Vue({
    data:{
            statu: sessionStorage.getItem('statu'),
            nom: sessionStorage.getItem('name')
    },
    router
}).$mount('#app_prise')