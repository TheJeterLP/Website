const { debug_log } = require('./config.json');

function debug(msg) {
    if (debug_log) {
        console.log(`[DEBUG] ${msg}`);
    }
}

function info(msg) {
    console.log(`[INFO] ${msg}`);
}

module.exports = { debug, info };