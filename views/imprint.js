module.exports = {
    title: 'Imprint',
    pugfile: 'imprint.pug',
    urlpath: '/imprint',
    onLoad() {
        const map = new Map();       
        return map;
    },
    onCall() {
        //Do stuff when site is rendered
    }
}