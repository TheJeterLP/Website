const mysql = require('mysql');

const sqlhost = "127.0.0.1";
const sqluser = "user";
const sqlpassword = ""; 
const sqlport = 3306;
const sqldbname = "website";

/**
 * Connects to a MySQL Database
 * @param {*} host hostname
 * @param {*} user username
 * @param {*} password password
 * @param {*} port port
 * @param {*} database database name
 */
function connectToDatabase() {
    var con = mysql.createConnection({
        host: sqlhost,
        user: sqluser,
        password: sqlpassword,
        port: sqlport,
        database: sqldbname
    });
    
    con.connect(function(err) {
        if(err) throw err;
        console.log(`Connected to MySQL Database ${sqldbname} at ${sqluser}@${sqlhost}:${sqlport}`);
    });
    return con;
}

module.exports = { connectToDatabase };