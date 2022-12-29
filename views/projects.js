module.exports = {
    title: 'Projects',
    pugfile: 'projects.pug',
    urlpath: '/projects',
    onLoad() {
        const map = new Map();       
        return map;
    },
    onCall() {
        //Do stuff when site is rendered
    }
}