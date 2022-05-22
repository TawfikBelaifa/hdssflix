
// Component Part

const Reservation = {
    template: '#reservation', 
    name: 'Reservation',
    data: () => {
        return {
            allFilm:[],
            navigation:'',
            filmChoosed:'',
            searched:'',
            choose:'',
            searchDone:'',
            reservationDispo:{},
            filtredFilm:{}
        }
    }, 
    computed: {
        oneFilm(){
            if(this.filmChoosed != '' /*&& this.searchDone != "yes"*/){
                
            }
            if(this.searched != '' /*&& this.searchDone != "yes"*/){
                return  this.allFilm.filter((film) => {
                    return film.titre.toLowerCase().includes(this.searched.toLowerCase())
                })
            }
            if(this.searchDone != "yes"){
                console.log("in seacheDone")
                return this.allFilm
                
            }
            return this.allFilm;
        }
    },
    methods:{
        choiceFilm(titre){
            console.log(titre)
            var titre = titre
            this.filmChoosed=titre
            this.choose="yes"
            this.searchDone="yes"
            axios.post('http://localhost/all/Projet-GitHub/hdssflix/Backend/Action/Data/allSeance.php',JSON.stringify({ 'nameFilm': titre }))
            .then(response => (this.reservationDispo = response.data))

            this.filtredFilm =   this.allFilm.filter((film) => {
                return film.titre.toLowerCase().includes(this.filmChoosed.toLowerCase())
            })
        },
        exitChoice(){
            this.choose=""
            this.searchDone=""
        }
    },
    mounted(){
        axios({ method: 'POST', url: 'http://localhost/ALL/Projet-GitHub/hdssflix/Backend/Action/Data/film.php'})
        .then(response => (this.allFilm = response.data));
    }
}

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

const Preference = {
    template: '#preference', 
    name: 'Preference',
    data:()=>{
        return {
            name:null,
            statu:null,
            iduser:null,
            allGenre:{},
            allRealisateur:{},
            allYears:{}

        }
    },
    computed:{
        affiche(){
           
        }
    }, 
    methods:{

        addNewPref(){
            $.ajax({
                url : 'http://localhost/all/Projet-GitHub/hdssflix/Backend/Action/addPreference.php',
                method: "GET",
                data: "iduser="+this.iduser+"&genre="+($(".dataNewPref")[0].value)+"&realisateur="+($(".dataNewPref")[1].value)+"&anne="+($(".dataNewPref")[2].value),
                datatype: "json",
                cache: false,
                contentType: false,
                processData: false,
            })

        
        }
    },
    mounted(){
        this.name = this.$root.nom
        this.statu = this.$root.statu
        this.iduser = this.$root.iduser
    },
    created(){
        axios({ method: 'POST', url: 'http://localhost/all/Projet-GitHub/hdssflix/Backend/Action/Data/preference/genreserie.php'})
        .then(response => (this.allGenre = response.data));
        axios({ method: 'POST', url: 'http://localhost/all/Projet-GitHub/hdssflix/Backend/Action/Data/preference/realisateur.php'})
        .then(response => (this.allRealisateur = response.data));
        axios({ method: 'POST', url: 'http://localhost/all/Projet-GitHub/hdssflix/Backend/Action/Data/preference/anne.php'})
        .then(response => (this.allYears = response.data));
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
           return this.allFilm.filter((film) => { return (film.id) == this.idFilm })
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

const OneSerie = {
    template: '#oneSerie', 
    name: 'OneSerie',
    data: () =>{
        return {
            idSerie:null,
            serieName:null,
            allSerie:[],
            allSaison:[],
            allEpisode:[],
            EpisodeOfSerie:[],
            saisonOfserie: "Saison",
        }
    },
    computed : {
        oneSerie(){
            this.saisonOfserie = this.allSerie.filter((serie) => { return (serie.id) == this.idSerie }).titre
           return this.allSerie.filter((serie) => { return (serie.id) == this.idSerie })
           
        },
        saisonSerie(){
            return this.allSaison.filter((saison) => { return (saison.id_serie) == this.idSerie })
        },
        selectSaison(){
            if(this.saisonOfserie != ""){
                return this.allEpisode.filter((episode) => { return ((episode.id_serie) == this.idSerie) && (episode.id_saison === this.saisonOfserie) })
            }
        },
    },
    methods:{

    },
    mounted(){
        this.idSerie = this.$route.params.id;
        this.serieName = this.$route.params.name;
    }, 
    created(){
        axios({ method: 'POST', url: 'http://localhost/ALL/Projet-GitHub/hdssflix/Backend/Action/Data/serieName.php'})
        .then(response => (this.allSerie = response.data))
        axios({ method: 'POST', url: 'http://localhost/ALL/Projet-GitHub/hdssflix/Backend/Action/Data/allSaison.php'})
        .then(response => (this.allSaison = response.data))
        axios({ method: 'POST', url: 'http://localhost/ALL/Projet-GitHub/hdssflix/Backend/Action/Data/allEpisode.php'})
        .then(response => (this.allEpisode = response.data))
    }
}


const Home = {
    template: '#home', 
    name: 'Home',
    data: () => {
        return {
            iduser:null,
            name: "",
            statu: "",
            allSerie:{},
            allFilm:{},
            actionSerie:{},
            dramatiqueSerie:{},
            SFSerie:{},
            othersSerie:{},
            serieRecommanded: {}
        }
    }, 
    computed: {
        nom() {
            return this.name;      
		},
        statuUser(){
            return this.statu;
        },
        serie(){
            return Array.from(new Set(this.allSerie));
        }

    },
    methods:{

        // INTERACTION UI/UX FUNCTION
        next(){
            $(".containerFilm").append($(".containerFilmBis")[0])
        },
        prev(){
            var contain = $(".containerFilmBis")
            $(".containerFilm").prepend($(".containerFilmBis")[contain.length-1])
        },
        nextActionSerie(){
            $(".containerSerieAction").append($(".containerSerieActionBis")[0])
        },
        prevActionSerie(){
            var contain = $(".containerSerieActionBis")
            $(".containerSerieAction").prepend($(".containerSerieActionBis")[contain.length-1])
        },
        nextDrameSerie(){
            $(".containerSerieDramatique").append($(".containerSerieDramatiqueBis")[0])
        },
        prevDrameSerie(){
            var contain = $(".containerSerieDramatiqueBis");
            $(".containerSerieDramatique").prepend($(".containerSerieDramatiqueBis")[contain.length-1])
        },
        nextOthersSerie(){
            $(".containerSerieOthers").append($(".containerSerieOthersBis")[0])
        },
        prevOthersSerie(){
            var contain = $(".containerSerieOthersBis");
            $(".containerSerieOthers").prepend($(".containerSerieOthersBis")[contain.length-1])
        },
        nextAllSerie(){
            $(".containerSerieAll").append($(".containerSerieAllBis")[0])
        },
        prevAllSerie(){
            var contain = $(".containerSerieAllBis");
            $(".containerSerieAll").prepend($(".containerSerieAllBis")[contain.length-1])
        },
        nextAllSerieOthers(){
            $(".containerSerieOthers2").append($(".containerSerieOthers2Bis")[0])
        },
        prevAllSerieOthers(){
            var contain = $(".containerSerieOthers2Bis");
            $(".containerSerieOthers2").prepend($(".containerSerieOthers2Bis")[contain.length-1])
        },
        nextRecommendedSeries(){
            $(".recomandationAll").append($(".recomandationBis")[0])
        }, 
        prevRecommendedSeries(){
            var contain = $(".recomandationBis");
            $(".recomandationAll").prepend($(".recomandationBis")[contain.length-1])
        }

        

    },
    mounted(){
        this.name = this.$root.nom
        this.statu = this.$root.statu
        this.iduser = this.$root.iduser

        var mesDonnees = new FormData();
        mesDonnees.set("iduser", this.iduser);
        axios({ method: 'POST', url: 'http://localhost/ALL/Projet-GitHub/hdssflix/Backend/Action/Data/serieName.php'})
       .then(response => (this.allSerie = response.data));
       
       axios({ method: 'POST', url: 'http://localhost/ALL/Projet-GitHub/hdssflix/Backend/Action/Data/film.php'})
       .then(response => (this.allFilm = response.data));

       axios({ method: 'POST', url: 'http://localhost/all/Projet-GitHub/hdssflix/Backend/Action/Data/SerieByCategorie.php'})
       .then(response => (this.actionSerie = response.data));

       axios({ method: 'POST', url: 'http://localhost/all/Projet-GitHub/hdssflix/Backend/Action/Data/SerieByDrame.php'})
       .then(response => (this.dramatiqueSerie = response.data));

       axios({ method: 'POST', url: 'http://localhost/all/Projet-GitHub/hdssflix/Backend/Action/Data/SerieBySF.php'})
       .then(response => (this.SFSerie = response.data));
       
       axios({ method: 'POST', url: 'http://localhost/all/Projet-GitHub/hdssflix/Backend/Action/Data/SerieByOthers.php'})
       .then(response => (this.othersSerie = response.data));
        
        var id = this.$root.iduser
        axios.post('http://localhost/all/Projet-GitHub/hdssflix/Backend/Action/Data/serieRcommanded.php',JSON.stringify({ 'userid': id }))
        .then(response => (this.serieRecommanded = response.data))


    }
}

const routes = [
    {path: '/', component: Home},
    {path: '/Parameter', name:"Parameter", component: Parameter},
    {path: '/Parameter/Gestionfilm', name:"Gestionfilm", component: Gestionfilm},
    {path: '/Home/OneFilm/:id', name:"OneFilm",  component: OneFilm},
    {path: '/Home/OneSerie/:id/:name', name:"OneSerie",  component: OneSerie},
    {path: '/Preference/', name:"Preference",  component: Preference},
    {path: '/Reservation/', name:"Reservation",  component: Reservation}
]

const router = new VueRouter({
    routes
})

const vm = new Vue({
    data:{
            statu: sessionStorage.getItem('statu'),
            nom: sessionStorage.getItem('name'),
            iduser:sessionStorage.getItem('iduser')
    },
    router
}).$mount('#app_prise')