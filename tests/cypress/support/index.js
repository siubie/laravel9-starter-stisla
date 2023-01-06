// ***********************************************************
// This example support/index.js is processed and
// loaded automatically before your test files.
//
// This is a great place to put global configuration and
// behavior that modifies Cypress.
//
// You can change the location of this file or turn off
// automatically serving support files with the
// 'supportFile' configuration option.
//
// You can read more here:
// https://on.cypress.io/configuration
// ***********************************************************

/// <reference types="./" />

import "./laravel-commands";
import "./laravel-routes";
import "./assertions";

//sebelum satu test file dijalankan
before(() => {
    cy.task("activateCypressEnvFile", {}, { log: false });
    cy.artisan("config:clear", {}, { log: false });

    cy.refreshRoutes();
});

//setelah satu test file dijalankan
after(() => {
    cy.task("activateLocalEnvFile", {}, { log: false });
    cy.artisan("config:clear", {}, { log: false });
});
