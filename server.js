/**
 * Required external modules
 */
const express = require('express');
const path = require('path');

/**
 * Required internal modules
 */
const routemanager = require('./routemanager.js');
const dbmanager = require('./dbmanager.js');
const logmanager = require('./logmanager.js');
const { website_port } = require('./config.json');

/**
 * App Variables
 */
const app = express();

/**
 * SQL Connection.
 */
try {
    dbmanager.createTables();
} catch (err) {
    logmanager.error(err);
}

/**
 * App Configuration
 */
app.use(express.json());
app.set('views', path.join(path.join(__dirname, 'views'), 'frontend'));
app.set('view engine', 'pug');
app.use(express.static(path.join(__dirname, 'public')));

/**
 * Routes Definitions
 */
routemanager.loadRoutes(app);

/**
 * Server Activation
 */
app.listen(website_port, () => {
    logmanager.info(`Listening to requests at 127.0.0.1:${website_port}`);
});