//window.alert("Bienvenido a nuestro sitio web");


const apicategory = new Vue({
    el:'#apicategory',
    data: {
        nombre: '',
        slug: '',
        div_mensajeslug: 'Slug Existeeeee',
        div_clase_slug: 'badge badge-danger',
        div_aparecer: false,
        desabilitar_boton: 0
    },
    computed: {
        generarSlug : function(){
            var char= {
                "á":"a","é":"e","í":"i","ó":"o","ú":"u",
                "Á":"A","É":"E","Í":"I","Ó":"O","Ú":"U",
                "ñ":"n","Ñ":"N"," ":"-","_":"-"
            }
            var expr = /[áéíóúÁÉÍÓÚÑñ_ ]/g;
            
            this.slug = this.nombre.trim().replace(expr, function(e){
                return char[e]
            }).toLowerCase()
            
            //return this.nombre.trim().replace(/ /g,'-').toLowerCase()

            return this.slug;



        }
    },
    methods: {
        getCategory(){

            if (this.slug){
                let url= '/api/category/'+this.slug;
                axios.get(url).then(response => {
                    this.div_mensajeslug = response.data;
                    //console.log(this.div_mensajeslug);
                    if(this.div_mensajeslug=='Slug Disponible'){
                        this.div_clase_slug = 'badge badge-success'; 
                        this.desabilitar_boton=0;
                    }else{
                        this.div_clase_slug = 'badge badge-danger'; 
                        this.desabilitar_boton=1;
                    }
                    this.div_aparecer = true;
                })
            }else{
                this.div_clase_slug = 'badge badge-danger'; 
                this.div_mensajeslug ='Escribe Una Categoria Por Favor';
                this.desabilitar_boton=1;
                this.div_aparecer = true;
            }
        }
    }
});