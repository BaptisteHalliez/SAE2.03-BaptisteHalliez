let templateFile = await fetch("./component/Movie/template.html");
let template = await templateFile.text();

let Movie = {};

Movie.format = function (titre_film) {
  let html = template;
  return html;
};
  
export {Movie};