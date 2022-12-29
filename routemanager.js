const fs = require('node:fs');
const path = require('node:path');
const logmanager = require('./logmanager.js');

function loadRoutes(app) {
    const backendPath = path.join(path.join(__dirname, 'views'), 'backend');
    const backendFiles = fs.readdirSync(backendPath).filter(file => file.endsWith('.js'));
    const frontendPath = path.join(path.join(__dirname, 'views'), 'frontend');

    logmanager.info(`Loading views from ${backendPath}`);

    for (const file of backendFiles) {
        const filePath = path.join(backendPath, file);
        logmanager.info(`Loading ${file}`);
        const route = require(filePath);

        if (typeof route.title !== 'string') {
            logmanager.error('title is not a string or not set! skipping File.');
            continue;
        }

        if (typeof route.pugfile !== 'string') {
            logmanager.error('pugfile is not a string or not set! skipping File.');
            continue;
        }

        const pugFile = path.join(frontendPath, route.pugfile);
        if (!fs.existsSync(pugFile)) {
            logmanager.error(`The file ${route.pugfile} does not exist! skipping File.`);
            continue;
        }

        if (typeof route.urlpath !== 'string') {
            logmanager.error('urlpath is not a string or not set! skipping File.');
            continue;
        }

        const options = [];
        options['title'] = route.title;

        if (typeof route.onLoad === 'function') {
            logmanager.debug('File has declared an onLoad() function! Calling now...');
            const variables = route.onLoad();
            if (variables.size > 0) {
                for (const key of variables.keys()) {
                    const value = variables.get(key);
                    options[key] = value;
                    logmanager.debug(`Loaded key: ${key} as value: ${value}`);
                }
            }
        }


        app.get(route.urlpath, (req, res) => {
            res.render(route.pugfile, options, function (err, html) {
                logmanager.debug(`Route called: ${route.urlpath} with title: ${options.title}`);
                if (err) {
                    console.log(err);
                    return;
                }

                if (typeof route.onCall === 'function') {
                    logmanager.debug('File has declared an onCall() function! Calling now...');
                    route.onCall();
                }

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