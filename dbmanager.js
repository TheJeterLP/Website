const mysql = require('mysql');
const { sql_enabled, sql_host, sql_user, sql_password, sql_port, sql_dbname } = require('./config.json');

/**
 * Connects to a MySQL Database
 */
function connectToDatabase() {
    if (!sql_enabled) {
        return null;
    }
    const con = mysql.createConnection({
        host: sql_host,
        user: sql_user,
        password: sql_password,
        port: sql_port,
        database: sql_dbname,
    });

    con.connect(function (err) {
        if (err) throw err;
        console.log(`Connected to MySQL Database ${sql_dbname} at ${sql_user}@${sql_host}:${sql_port}`);
    });
    return con;
}

module.exports = { connectToDatabase };