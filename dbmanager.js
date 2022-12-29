const mysql = require('mysql');
const util = require('util');
const logmanager = require('./logmanager.js');
const { sql_enabled, sql_host, sql_user, sql_password, sql_port, sql_dbname } = require('./config.json');

/**
 * Connects to a MySQL Database using credentials from config.json
 * Returns a MySQL Connection instance
 */
function getConnection() {
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

    return {
        query(sql, args) {
            return util.promisify(con.query)
                .call(con, sql, args);
        },
        close() {
            return util.promisify(con.end).call(con);
        },
    };
}

/**
 * @param {Connection} conn
 */
async function createTables() {
    if (!sql_enabled) return;
    logmanager.debug('Creating tables...');
    const conn = getConnection();
    const sql = 'CREATE TABLE IF NOT EXISTS views (ID INTEGER PRIMARY KEY AUTO_INCREMENT, name VARCHAR(255), viewcount INTEGER);';
    conn.query(sql);
    conn.close();
}

async function increaseViews(view) {
    if (!sql_enabled) return;
    logmanager.debug(`Increasing views for view ${view}`);

    const oldVal = await getViews(view);
    if (typeof oldVal === 'undefined') {
        logmanager.debug(`View is not yet in db, inserting ${view}`);
        await insertViews(view);
    }

    const conn = getConnection();
    const sql = 'UPDATE views SET viewcount = viewcount + 1 WHERE name = ?;';
    conn.query(sql, view);
    conn.close();
}

async function insertViews(view) {
    if (!sql_enabled) return;
    logmanager.debug(`Inserting view for view ${view}`);
    const conn = getConnection();
    const sql = 'INSERT INTO views (name, viewcount) VALUES (?, 0);';
    conn.query(sql, view);
    conn.close();
}

/**
 * Async function to get the Views a site has. Must be used with await
 * @param {string} view The site to look for
 * @param {import('mysql').Connection} conn open MySQL connection
 * @returns {number} number of views, -1 if page is not yet in the database
 */
async function getViews(view) {
    if (!sql_enabled) return -1;
    const conn = getConnection();
    const sql = 'SELECT viewcount FROM views WHERE name = ?;';
    const rows = await conn.query(sql, view);

    if (typeof rows[0] === 'undefined') {
        logmanager.debug(`View is not yet in db, inserting ${view}`);
        await insertViews(view);
        await conn.close();
        return getViews(view);
    }

    const num = (rows)[0].viewcount;
    conn.close();
    return num;
}

module.exports = { createTables, getViews, increaseViews };