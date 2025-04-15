let HOST_URL = "..";

let DataMovie = {};

/**
 *
 */
DataMovie.request = async function () {
  // fetch permet d'envoyer une requête HTTP à l'URL spécifiée.
  let answer = await fetch(HOST_URL + "/server/script.php?todo=read");
  let data = await answer.json();
  return data;
};

/** DataMovie.add
 * 
 * @param {*} fdata un objet FormData contenant les données du formulaire à envoyer au serveur.
 * @returns la réponse du serveur.
 */
DataMovie.addMovie = async function (fdata) {
    let config = {
        method: "POST", // méthode HTTP à utiliser
        body: fdata // données à envoyer sous forme d'objet FormData
    };
    let answer = await fetch(HOST_URL + "/server/script.php?todo=addMovie", config);
    let data = await answer.json();
    return data;
}

export {DataMovie};