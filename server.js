//server.js

/**
 * Required external modules
 */
const express = require('express');
const path = require('path');
const routemanager = require('./routemanager.js');
const dbmanager = require('./dbmanager.js');

/**
 * App Variables
 */
const app = express();
const port = 8081;

/**
 * SQL Connection, currently not used.
 */
//var con = dbmanager.connectToDatabase(); 

/**
 * App Configuration
 */
app.use(express.json());
app.set('views', path.join(__dirname, "views"));
app.set('view engine', 'pug');
app.use(express.static(path.join(__dirname, "public")));

/**
 * Routes Definitions
 */

routemanager.setupRoutes(app);

/**
 * Server Activation
 */
app.listen(port, () => {
    console.log(`Listening to requests at 127.0.0.1:${port}`);
}); 