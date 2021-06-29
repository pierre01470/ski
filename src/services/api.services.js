export default class ApiService {
    constructor() { }

    getCategory()  {
        return fetch(`http://localhost/ski/API/category`)
    }
    getParticipant() {
        return fetch(`http://localhost/ski/API/participant`)
    }
    getRun() {
        return fetch(`http://localhost/ski/API/run`)
    }
    getTrial() {
        return fetch(`http://localhost/ski/API/trial`)
    }
}