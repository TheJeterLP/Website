import express, { Application } from 'express';
import path from 'path';
import { info } from './logmanager';
import { DBManager } from './dbmanager';
import { loadRoutes } from './routemanager';

import { website_port } from './config.json';

const app: Application = express();
const db: DBManager = new DBManager();

db.createTables();

app.use(express.json());
app.set('views', path.join(path.join(__dirname, 'views'), 'frontend'));
app.set('view engine', 'pug');
app.use(express.static(path.join(__dirname, 'public')));

loadRoutes(app, db);

app.listen(website_port, () => {
    info(`Listening to requests at 127.0.0.1:${website_port}`);
});