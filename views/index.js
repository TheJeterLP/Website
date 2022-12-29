module.exports = {
    title: 'Home',
    pugfile: 'index.pug',
    urlpath: '/',
    onLoad() {
        const map = new Map();       
        return map;
    },
    onCall() {
        //Do stuff when site is rendered
    }
}