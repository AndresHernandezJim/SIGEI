Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector("#token").getAttribute('value');
new Vue({
  //atributos
  el: 'body', //ambiente de trabajo de vue
  data: {
      marca:"",
      modelo:"",
      anio:"",
      serie:"",
      placas:"",
      tipo:"",
      estado:"",
      asegurado:"",
      adeudo:0.0,
      caracteristicas:"",
      nombre:"",
      apellidos:"",
      curp:"",
      sexo:"",
      edad:"",
      ocupacion:"",
      domicilio:"",
      telefono:"",

  },
  ready:function(){
    alert('hola');
  },
  methods:{

  },
};