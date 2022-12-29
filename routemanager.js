const fs = require('node:fs');
const path = require('node:path');

function loadRoutes(app) {
    const routesPath = path.join(__dirname, 'views');
    const routesFiles = fs.readdirSync(routesPath).filter(file => file.endsWith('.js'));

    console.log(`Loading views from ${routesPath}`);

    for (const file of routesFiles) {
        const filePath = path.join(routesPath, file);
        console.log(`Loading ${file}`);
        const route = require(filePath);

        let options = [];
        options['title'] = route.title;

        const variables = route.onLoad();
        if (variables.size > 0) {
            for (const key of variables.keys()) {
                const value = variables.get(key);
                options[key] = value;
            }
        }

        app.get(route.urlpath, (req, res) => {
            res.render(route.pugfile, options, function (err, html) {
                route.onCall();
                res.send(html);
            });
        });
    }

    /**
    * External links
    */
    app.get('/discord', (req, res) => {
        res.redirect('https://discord.gg/42n2KxM3');
    });

    //404 Error, has to be called last (after all other pages)
    app.use(function (req, res) {
        res.status(404).render('404', { title: '404 - ' + req.path, page: req.path });
    });
}

module.exports = { loadRoutes };