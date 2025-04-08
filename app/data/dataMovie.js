let HOST_URL = "https://mmi.unilim.fr/~halliez1/SAE2.03-BaptisteHalliez/";

let DataMovie = {};

 /**
     * Fetches data from the server based on the specified day.
     *
     * @param {string} movies - The movies parameter to be sent to the server.
     * @returns The response from the server.
     * 
     * DataMovie.request permet de récupérer des données depuis le serveur.
     * Elle prend en paramètre un film
     * renvoie les données contenues dans la réponse du serveur (data).
     */
 DataMovie.request = async function(movies){
    let answer = await fetch(HOST_URL + "/server/script.php?todo=read&movies=" + movies);
    let data = await answer.json();
    return data;
}

export {DataMovie};