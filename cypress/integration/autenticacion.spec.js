/// <reference types="cypress" />
describe('Probar el formulario de contacto', () => {

    it('Probar la pagina de contacto y el envio de emails', () =>{
        cy.visit('/login')
        cy.get('[data-cy="heading-login"]').should('exist')
        cy.get('[data-cy="heading-login"]').should('have.text', 'Iniciar Sesión')
        cy.get('[data-cy="formulario-login"]').should('exist')

        cy.get('[data-cy="formulario-login"]').submit()
        cy.get('[data-cy="alerta-login"]').should('exist')    
        cy.get('[data-cy="alerta-login"]').eq(0).should('have.class', 'error'); 
        cy.get('[data-cy="alerta-login"]').eq(0).should('have.text', 'El email es Obligatorio'); 

        cy.get('[data-cy="alerta-login"]').eq(1).should('have.class', 'error'); 
        cy.get('[data-cy="alerta-login"]').eq(1).should('have.text', 'El password es Obligatorio'); 


    
    });

}); 