describe("Test create user", () => {
    //positive test
    it("superadmin can create new user ", () => {});

    //negative test
    it("superadmin cannot create new user when name empty", () => {});
    it("superadmin cannot create new user when name is number", () => {});
    it("superadmin cannot create new user when name is more than 50 character", () => {});
    it("superadmin cannot create new user when email is empty", () => {});
    it("superadmin cannot create new user when email is in invalid format", () => {});
    it("superadmin cannot create new user when email is in already exist", () => {});
    it("superadmin cannot create new user when pasword is empty", () => {});
});
