let templateFile = await fetch("./component/NavBar/template.html");
let template = await templateFile.text();

let NavBar = {};

NavBar.format = function (hFilms, hNouveau, hEnfants, hAVenir, hCarte) {
  let html = template;
  html = html.replace("{{hFilms}}", hFilms);
  html = html.replace("{{hNouveau}}", hNouveau);
  html = html.replace("{{hEnfants}}", hEnfants);
  html = html.replace("{{hAVenir}}", hAVenir);
  html = html.replace("{{hCarte}}", hCarte);
  return html;
};

export { NavBar };
