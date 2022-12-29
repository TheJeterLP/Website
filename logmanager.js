const { debug_log } = require('./config.json');

/**
 * If debug_log is enabled in config.json file, print out debug message to console
 * @param {string} msg The message to log
 */
function debug(msg) {
    if (debug_log) {
        console.log(`[DEBUG] ${msg}`);
    }
}

/**
 * Print out info message to console
 * @param {string} msg The message to log
 */
function info(msg) {
    console.log(`[INFO] ${msg}`);
}

/**
 * Print out error message to console
 * @param {string} msg The error message to log
 */
function error(msg) {
    console.log(`[ERROR] ${msg}`);
}

module.exports = { debug, info, error };