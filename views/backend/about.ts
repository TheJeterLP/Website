/**
 * Calculates how old the given date is at the current time.
 * @param {*} dateString format: yyyy/mm/dd
 * @returns age as simple number in yy
 */
function getAge(dateString: string): number {
    const today = new Date();
    const birthDate = new Date(dateString);
    let age = today.getFullYear() - birthDate.getFullYear();
    const m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    return age;
}

export const title: string = 'about';
export const pugfile: string = 'about.pug';
export const urlpath: string = '/about';
export function onLoad(): Map<string, any> {
    const map = new Map<string, any>();
    map.set('age', getAge('1998/04/25'));
    return map;
}