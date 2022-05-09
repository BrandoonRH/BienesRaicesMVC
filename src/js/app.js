document.addEventListener('DOMContentLoaded', function(){
    eventListeners();
    darkMode(); 
});

function darkMode(){
    const sistemDarkMode = window.matchMedia('(prefers-color-scheme: dark)'); 
    //console.log(sistemDarkMode.matches);

    if(sistemDarkMode.matches){
       document.body.classList.add('dark-mode');
    }else{
        document.body.classList.remove('dark-mode');
    }
    
    sistemDarkMode.addEventListener('change', function(){
        if(sistemDarkMode.matches){
            document.body.classList.add('dark-mode');
         }else{
             document.body.classList.remove('dark-mode');
         }
    })

    const botondarkMode = document.querySelector('.dark-mode-boton');
    botondarkMode.addEventListener('click', function(){
        document.body.classList.toggle('dark-mode');
    })
}


function  eventListeners(){
   const mobileMenu = document.querySelector('.mobile-menu');
   mobileMenu.addEventListener('click', navegacionResponsive);

   //Mustra Campos Condicionales
   //Seleccionamos con el selector en común
   const metodoContacto = document.querySelectorAll('input[name = "contacto[contacto]"]'); 
   //iteramos por que nos regresar un nodelist y a cada uno se le agrega el evento
   metodoContacto.forEach(input => input.addEventListener('click', mostrarMetodoContacto)); 




}


function navegacionResponsive(){
    const navegacion = document.querySelector('.navegacion'); 

    //navegacion.classList.toggle('mostrar');
    if (navegacion.classList.contains('mostrar')) {
       navegacion.classList.remove('mostrar');     
    }else{
        navegacion.classList.add('mostrar');    
    }
}

function mostrarMetodoContacto(event){
 const contactoDiv = document.querySelector('#contacto'); 

if(event.target.value == 'telefono'){
    contactoDiv.innerHTML = `
    <label for="telefono">Número Teléfono</label>
    <input type="tel" maxlength="10" placeholder="Tu Teléfono" id="telefono" name="contacto[telefono]" >

    <p> Elija la fecha y la hora para contactarlo</p>

    <label for="fecha">Fecha:</label>
    <input type="date" id="fecha" name="contacto[fecha]">

    <label for="hora">Hora:</label>
    <input type="time" id="hora" min="09:00" max="18:00" name="contacto[hora]">

    `; 
}else{
    contactoDiv.innerHTML = `
    <label for="email">E-mail</label>
    <input type="email" placeholder="Tu Email" id="email" name="contacto[email]" >
    `;
   

}

}
