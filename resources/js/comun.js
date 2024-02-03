window.alert("Bienvenido a nuestro sitio web");



window.Vue = require('vue');

//Vue.component('example-component', require('./components/ExampleComponet.vue').default);


if(document.getElementById('apicategory'))
{
    require('./apicategory');
}

if(document.getElementById('confirmareliminar'))
{
    require('./confirmareliminar');
}
