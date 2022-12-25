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

module.exports = { getAge };