/**
 * Calculates how old the given date is at the current time.
 * @param {*} dateString format: yyyy/mm/dd
 * @returns age as simple number in yy
 */
function getAge(dateString) {
    const today = new Date();
    const birthDate = new Date(dateString);
    let age = today.getFullYear() - birthDate.getFullYear();
    const m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    return age;
}

module.exports = {
    title: 'About',
    pugfile: 'about.pug',
    urlpath: '/about',
    onLoad() {
        const map = new Map();
        map.set('age', getAge('1998/04/25'));
        return map;
    },
};