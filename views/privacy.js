module.exports = {
    title: 'Data Protection & Privacy',
    pugfile: 'privacy.pug',
    urlpath: '/privacy',
    onLoad() {
        const map = new Map();       
        return map;
    },
    onCall() {
        //Do stuff when site is rendered
    }
}