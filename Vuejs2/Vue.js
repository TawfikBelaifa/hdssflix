
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
            serieList:null,
        }
    }, 
    computed: {
        
    },
    methods:{
        
    },
    mounted(){
        axios({ method: 'POST', url: 'http://localhost/ALL/Projet-GitHub/hdssflix/Backend/Action/Data/serieName.php'})
        .then(response => (this.serieList = response.data));
    }
}

const OneSerie = {
    template: '#oneSerie', 
    name: 'OneSerie',
    data: () =>{
        return {
            idSerie:null
        }
    },
    mounted(){
        this.idSerie = this.$route.params.id
    }
}


const Home = {
    template: '#home', 
    name: 'Home',
    data: () => {
        return {
            name: "",
            statu: "",
            allSerie:{}
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
        // Recuperation des données 
        axios({ method: 'POST', url: 'http://localhost/ALL/Projet-GitHub/hdssflix/Backend/Action/Data/serieName.php'})
       .then(response => (this.allSerie = response.data));
    }
}

const routes = [
    {path: '/', component: Home},
    {path: '/Parameter', name:"Parameter", component: Parameter},
    {path: '/Parameter/Gestionfilm', name:"Gestionfilm", component: Gestionfilm},
    {path: '/Home/OneSerie/:id', name:"OneSerie",  component: OneSerie},
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