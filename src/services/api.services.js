export default class ApiService {
    constructor() { }

    getParticipant() {
        return fetch(`http://localhost/ski/API`)
    }
}