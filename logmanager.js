const { debug_log } = require('./config.json');

function debug(msg) {
    if (debug_log) {
        console.log(`[DEBUG] ${msg}`);
    }
}

function info(msg) {
    console.log(`[INFO] ${msg}`);
}

function error(msg) {
    console.log(`[ERROR] ${msg}`);
}

module.exports = { debug, info, error };