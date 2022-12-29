function setupRoutes(app) {
    /**
     * Internal Sites
     */
    app.get('/', (req, res) => {
        res.render('index', { title: 'Home' })
    });

    app.get('/about', (req, res) => {
        res.render('about', { title: 'About', age: getAge("1998/04/25") })
    });

    app.get('/projects', (req, res) => {
        res.render('projects', { title: 'Projects' })
    });

    app.get('/imprint', (req, res) => {
        res.render('imprint', { title: 'Imprint' })
    });

    app.get('/privacy', (req, res) => {
        res.render('privacy', { title: 'Data Protection & Privacy' })
    });

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

/**
 * Calculates how old the given date is at the current time.
 * @param {*} dateString format: yyyy/mm/dd
 * @returns age as simple number in yy
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

module.exports = { setupRoutes };