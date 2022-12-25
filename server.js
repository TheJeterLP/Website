//server.js

/**
 * Required external modules
 */
const express = require('express');
const path = require('path');
const mysql = require('mysql');
const { get } = require('http');

/**
 * App Variables
 */
const app = express();
const port = 8081;

const sqlhost = "127.0.0.1";
const sqluser = "user";
const sqlpassword = "password";
const sqlport = 3306;
const sqldbname = "website";

/**
 * SQL Connection
 */

/*var con = mysql.createConnection({
    host: sqlhost,
    user: sqluser,
    password: sqlpassword,
    port: sqlport,
    database: sqldbname
});

con.connect(function(err) {
    if(err) throw err;
    console.log(`Connected to MySQL Database at ${sqlhost}:${sqlport}`);
});*/

/**
 * App Configuration
 */
app.use(express.json());
app.set('views', path.join(__dirname, "views"));
app.set('view engine', 'pug');
app.use(express.static(path.join(__dirname, "public")));

/**
 * Functions
 * @param {*} dateString 
 * @returns 
 */
function getAge(dateString) {
    var today = new Date();
    var birthDate = new Date(dateString);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    return age;
}

/**
 * Routes Definitions
 */
app.get('/', (req, res) => {
    res.render('index', {title: 'Home'})
});

app.get('/about', (req, res) => {
    var ageC = getAge('1998/04/25');
    res.render('about', {title: 'About', age: ageC})
});

app.get('/projects', (req, res) => {
    res.render('projects', {title: 'Projects'})
});

app.get('/imprint', (req, res) => {
    res.render('imprint', {title: 'Imprint'})
});

app.get('/privacy', (req, res) => {
    res.render('privacy', {title: 'Data Protection & Privacy'})
});



//404 Error, has to be called last (after all other pages)
app.use(function(req,res){
    res.status(404).render('404', {title: '404'});
});
/**
 * Server Activation
 */
app.listen(port, () => {
    console.log(`Listening to requests at 127.0.0.1:${port}`);
}); 