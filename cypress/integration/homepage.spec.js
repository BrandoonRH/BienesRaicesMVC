/// <reference types="cypress" />
describe('Carga la Pagina Principal', () => {


    it('Probar el header de la pagina principal', () =>{
        cy.visit('/')
        cy.get('[data-cy="heading-sitio"]').should('exist')
        cy.get('[data-cy="heading-sitio"]').invoke('text').should('equal', 'Venta de Casas en Guadalajara Jal.')
        cy.get('[data-cy="heading-sitio"]').invoke('text').should('not.equal', 'Bienes Raices')

    });

    it('Probar los iconos de la Pagina Principal', () =>{
        cy.get('[data-cy="heading-nosotros" ]').should('exist')
        cy.get('[data-cy="heading-nosotros" ]').should('have.prop', 'tagName').should('equal', 'H2')
        cy.get('[data-cy="iconos-nosotros"]').should('exist')
        cy.get('[data-cy="iconos-nosotros"]').find('.icono').should('have.length', 3)
        cy.get('[data-cy="iconos-nosotros"]').find('.icono').should('not.have.length', 4)

    });

    it('Probar seccion de propiedades', () =>{
        cy.get('[data-cy="anuncio"]').should('have.length', 3)
        cy.get('[data-cy="anuncio"]').should('not.have.length', 5)

        cy.get('[data-cy="enlace-rpopiedad"]').should('not.have.class', 'boton-amarillo')
        cy.get('[data-cy="enlace-rpopiedad"]').first().invoke('text').should('equal', 'Ver Propiedad')

        cy.get('[data-cy="enlace-rpopiedad"]').first().click()
        cy.get('[data-cy="titulo-propiedad"]').should('exist')
        cy.wait(3500)
        cy.go('back')
    });

    it('Prueba el Routing hacia todas las propiedades', () =>{
        cy.get('[data-cy="ver-propiedades"]').should('exist')
        cy.get('[data-cy="ver-propiedades"]').should('have.class', 'boton-verde')
        cy.get('[data-cy="ver-propiedades"]').invoke('attr', 'href').should('equal', '/bienesraicesMVC/public/index.php/propiedades')

        cy.get('[data-cy="ver-propiedades"]').click()
        cy.get('[data-cy="heading-propiedades"]').invoke('text').should('equal', 'Casas y Departamentos')

        cy.wait(3800)
        cy.go('back')
       });

    it('Prueba al bloque de contacto', () =>{
       cy.get('[data-cy="imagen-contacto"]').should('exist')
       cy.get('[data-cy="imagen-contacto"]').find('h2').invoke('text').should('equal', 'Encuentra la casa de tus sueños')
       cy.get('[data-cy="imagen-contacto"]').find('p').invoke('text').should('equal', 'Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad')
       cy.get('[data-cy="imagen-contacto"]').find('a').invoke('attr', 'href').should('equal', '/bienesraicesMVC/public/index.php/contacto')
       cy.get('[data-cy="imagen-contacto"]').find('a').click()
       cy.get('[data-cy="heading-contacto"]').should('exist')
       cy.wait(2500)
       cy.visit('/'); 

    });

    it('Prueba los Testimoniales y el Blog', () =>{
        
       cy.get('[data-cy="blog"]').should('exist')
       cy.get('[data-cy="blog"]').find('h3').invoke('text').should('equal', 'Nuestro Blog')
       cy.get('[data-cy="blog"]').find('h3').invoke('text').should('not.equal', 'Blog')
       cy.get('[data-cy="blog"]').find('img').should('have.length', 2)

       cy.get('[data-cy="testimoniales"]').should('exist')
       cy.get('[data-cy="testimoniales"]').find('h3').invoke('text').should('equal', 'Testimoniales')
       cy.get('[data-cy="testimoniales"]').find('h3').invoke('text').should('not.equal', 'Nuestro Testimoniales')


 
     });
}); 