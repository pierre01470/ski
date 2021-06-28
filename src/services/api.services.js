export default class ApiService {
    constructor() { }

    getCategory()  {
        return fetch(`http://localhost/ski/API/category`)
    }
    getParticipant() {
        return fetch(`http://localhost/ski/API/`)
    }
    getRun() {
        return fetch(`http://localhost/ski/API/`)
    }
    getTrial() {
        return fetch(`http://localhost/ski/API/`)
    }
}