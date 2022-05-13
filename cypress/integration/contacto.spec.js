/// <reference types="cypress" />
describe('Probar el formulario de contacto', () => {


    it('Probar la pagina de contacto y el envio de emails', () =>{
        cy.visit('/contacto')
        cy.get('[data-cy="heading-contacto"]').should('exist')
        cy.get('[data-cy="heading-contacto"]').invoke('text').should('equal', 'Contacto')
        cy.get('[data-cy="heading-contacto"]').invoke('text').should('not.equal', 'Formulario Contacto')

        cy.get('[data-cy="heading-formulario"]').should('exist')
        cy.get('[data-cy="heading-formulario"]').invoke('text').should('equal', 'Llene el Formulario de Contacto')
        cy.get('[data-cy="heading-formulario"]').invoke('text').should('not.equal', 'Llene el Formulario ')
        cy.get('[data-cy="formulario-contacto"]').should('exist')
    });

    it('Probar los campos del formulario', () =>{
       cy.get('[data-cy="input-nombre"]').type('Luna Gimena')
       cy.get('[data-cy="input-apellido"]').type('Ramírez Hernández')
       cy.get('[data-cy="input-mensaje"]').type(` 	
       Vestibulum vulputate mattis leo, a eleifend diam vulputate non. Quisque varius metus dui, 
       in convallis augue dapibus quis. Nunc suscipit dui nunc, in hendrerit elit iaculis nec. Aenean
        purus nisl, pulvinar non quam ut, scelerisque convallis tellus. Proin facilisis elit diam, condimentum 
        tempor mauris volutpat non. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aliquam 
        fermentum blandit elit ut congue. Proin commodo, mi sed pulvinar ultricies, erat metus semper velit, 
        in interdum risus felis sit amet magna. Praesent sagittis facilisis metus in ultrices. Nullam gravida,
        ante ut auctor maximus, turpis nibh sodales eros, eget egestas justo elit ac massa. Suspendisse placerat 
        libero luctus aliquet eleifend.`)

        cy.get('[data-cy="input-select"]').select('Compra')
        cy.get('[data-cy="input-presupuesto"]').type('1235000')
        cy.get('[data-cy="radio-contacto"]').eq(1).check()
        cy.wait(2850)
        cy.get('[data-cy="radio-contacto"]').eq(0).check()
        cy.get('[data-cy="input-telefono"]').type('3310982781')
        cy.get('[data-cy="input-fecha"]').type('2022-05-14')
        cy.get('[data-cy="input-hora"]').type('13:30')


        cy.get('[data-cy="formulario-contacto"]').submit();
        cy.get('[data-cy="alerta-envio-email"]').should('exist')
        cy.get('[data-cy="alerta-envio-email"]').invoke('text').should('equal', 'Email Enviado Correctamente')
        cy.get('[data-cy="alerta-envio-email"]').should('have.class', 'alerta').and('have.class', 'exito').and('not.have.class', 'error')

    });

 



  
}); 