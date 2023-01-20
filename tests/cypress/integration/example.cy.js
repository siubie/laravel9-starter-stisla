describe("Example Test", () => {
    it("shows a homepage", () => {
        cy.visit("/");

        cy.contains("Laravel");
        /* ==== Generated with Cypress Studio ==== */
        cy.get('.row').click();
        cy.get(':nth-child(2) > .form-control').clear('s');
        cy.get(':nth-child(2) > .form-control').type('superadmin@gmail.com');
        cy.get(':nth-child(3) > .form-control').clear('p');
        cy.get(':nth-child(3) > .form-control').type('password');
        cy.get('.btn').click();
        /* ==== End Cypress Studio ==== */
    });
});
