
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
            allFilm:{}
        }
    }, 
    computed: {
        
    },
    methods:{
        masqueSerie(id){
            $.ajax({
                url : 'http://localhost/ALL/Projet-GitHub/hdssflix/Backend/Action/masqueSerie.php',
                method: "GET",
                data: "idSerie="+id,
                cache: false,
                contentType: false,
                processData: false,
                function(reponse){
                    if(reponse == "1"){
                        console.log("oui")
                    }else{  
                        console.log("non")
                    }
                }
            })
            $("#lineSerie"+id).css("display", "none")
        }
    },
    mounted(){
        axios({ method: 'POST', url: 'http://localhost/ALL/Projet-GitHub/hdssflix/Backend/Action/Data/serieName.php'})
        .then(response => (this.serieList = response.data));

        axios({ method: 'POST', url: 'http://localhost/ALL/Projet-GitHub/hdssflix/Backend/Action/Data/film.php'})
        .then(response => (this.allFilm = response.data));
    }
}

const OneFilm = {
    template: '#oneFilm', 
    name: 'OneFilm',
    data: () =>{
        return {
            idFilm:null,
            allFilm:[],
        }
    },
    computed : {
        oneFilm(){
           return this.allFilm.filter((film) => { return film.id.includes(this.idFilm)})
        }
    },
    mounted(){
        this.idFilm = this.$route.params.id;
    }, 
    created(){
        axios({ method: 'POST', url: 'http://localhost/ALL/Projet-GitHub/hdssflix/Backend/Action/Data/film.php'})
        .then(response => (this.allFilm = response.data))

    }
}


const Home = {
    template: '#home', 
    name: 'Home',
    data: () => {
        return {
            name: "",
            statu: "",
            allSerie:{},
            allFilm:{}
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
       
       axios({ method: 'POST', url: 'http://localhost/ALL/Projet-GitHub/hdssflix/Backend/Action/Data/film.php'})
       .then(response => (this.allFilm = response.data));
    }
}

const routes = [
    {path: '/', component: Home},
    {path: '/Parameter', name:"Parameter", component: Parameter},
    {path: '/Parameter/Gestionfilm', name:"Gestionfilm", component: Gestionfilm},
    {path: '/Home/OneFilm/:id', name:"OneFilm",  component: OneFilm},
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