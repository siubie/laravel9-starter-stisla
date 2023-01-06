// test suite
describe("our first test", () => {
    // test case
    it("can open page", () => {
        // arrange
        // pengen buka halaman home
        cy.visit("/");
        // act

        // assert
        cy.contains("Login");
    });
    it("can open page", () => {
        // arrange
        // pengen buka halaman home
        cy.visit("/");
        // act

        // assert
        cy.contains("Sevima");
    });
    it("can open page", () => {
        // arrange
        // pengen buka halaman home
        cy.visit("/");
        // act

        // assert
        cy.contains("Login");
    });
});
