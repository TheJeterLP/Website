const fs = require('node:fs');
const path = require('node:path');
const logmanager = require('./logmanager.js');

/**
 * Dynamically loads backend and frontend files and loads the views.
 * @param app
 */
function loadRoutes(app) {
    const backendPath = path.join(path.join(__dirname, 'views'), 'backend');
    const backendFiles = fs.readdirSync(backendPath).filter(file => file.endsWith('.js'));
    const frontendPath = path.join(path.join(__dirname, 'views'), 'frontend');

    logmanager.info(`Loading backend files from ${backendPath}`);

    /**
     * Looping through all *.js files in backend folder
     */
    for (const file of backendFiles) {
        const filePath = path.join(backendPath, file);
        logmanager.info(`Loading ${file}`);

        /**
         * Require the found file to import eveything inside the module.exports array
         */
        const route = require(filePath);

        /**
         * Sanity checks start here
         */

        /**
         * Check if the file has title in module.exports and if it is a string
         */
        if (typeof route.title !== 'string') {
            logmanager.error('title is not a string or not set! skipping File.');
            continue;
        }

        /**
        * Check if the file has urlpath in module.exports and if it is a string
        */
        if (typeof route.urlpath !== 'string') {
            logmanager.error('urlpath is not a string or not set! skipping File.');
            continue;
        }

        /**
         * Check if the file has pugfile in module.exports and if it is a string
         */
        if (typeof route.pugfile !== 'string') {
            logmanager.error('pugfile is not a string or not set! skipping File.');
            continue;
        }

        /**
         * Check if the pugfile actually exists in the frontend directory
         */
        if (!fs.existsSync(path.join(frontendPath, route.pugfile))) {
            logmanager.error(`The file ${route.pugfile} does not exist! skipping File.`);
            continue;
        }

        /**
         * Dynamically loading options starts here
         */
        const options = [];
        options['title'] = route.title;

        /**
         * Check if backend file has an onLoad() function in module.exports
         * onLoad() has to return a Map object containing options.
         * If you have no options to load, return an empty Map.
         */
        if (typeof route.onLoad === 'function') {
            logmanager.debug('File has declared an onLoad() function! Calling now...');
            const variables = route.onLoad();
            /**
             * Check if map is not empty
             */
            if (variables.size > 0) {
                /**
                 * Looping through all the entries in the map and putting them into the options Array.
                 */
                for (const key of variables.keys()) {
                    const value = variables.get(key);
                    options[key] = value;
                    logmanager.debug(`Loaded key: ${key} as value: ${value}`);
                }
            }
        }

        /**
         * Now finally set the routes, this basically can be translated to:
         * if route.urlpath is called, render route.pugfile with given options and execute the function
         */
        app.get(route.urlpath, (req, res) => {
            res.render(route.pugfile, options, function (err, html) {
                logmanager.debug(`Route called: ${route.urlpath} with title: ${options.title}`);
                if (err) {
                    console.log(err);
                    return;
                }

                /**
                 * Check if backend file has exported an onCall() function, if yes execute it.
                 */
                if (typeof route.onCall === 'function') {
                    logmanager.debug('File has declared an onCall() function! Calling now...');
                    route.onCall();
                }

                /**
                 * Finally send the html to the browser.
                 */
                res.send(html);
            });
        });
    }

    /**
    * External links start here
    */
    app.get('/discord', (req, res) => {
        res.redirect('https://discord.gg/42n2KxM3');
    });

    // 404 Error, has to be called last (after all other pages)
    app.use(function (req, res) {
        res.status(404).render('404', { title: '404 - ' + req.path, page: req.path });
    });
}

module.exports = { loadRoutes };