describe("Test Login Page", () => {
    before(() => {});
    beforeEach(() => {
        //script login
    });
    //positive test
    it("user can login with correct username and password", () => {
        //arrange
        //buka halaman login
        cy.visit("/login");
        //act
        //isi username dan password
        cy.get(":nth-child(2) > .form-control").type("superadmin@gmail.com");
        cy.get(":nth-child(3) > .form-control").type("password");
        //clik tombol login
        cy.get(".btn").click();
        //assert
        //pastikan username nya SuperAdmin
        cy.get(".nav-link > .d-sm-none").contains("SuperAdmin");
    });

    //negative test
    it.only("user can not login when username and password is empty", () => {
        //arrange
        //act
        //assert
    });

    it("user can not login when username correct and password is empty", () => {
        //arrange
        //act
        //assert
    });

    it("user can not login when username empty and password is correct", () => {
        //arrange
        //act
        //assert
    });

    it("user can not login when username is correct and password is incorrect", () => {
        //arrange
        //act
        //assert
    });

    it("user can not login when username is wrong and password is correct", () => {
        //arrange
        //act
        //assert
    });
});
