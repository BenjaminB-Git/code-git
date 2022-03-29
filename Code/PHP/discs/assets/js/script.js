

































/** Disc_Detail **/

// Préparation du lien de direction
var idDisc = document.getElementById("idDisc").value;
var lien = "disc_modif.php?id=" + idDisc;


// Bouton "Modification"
const modif = document.querySelector("#modifier");

modif.addEventListener('click', () => {
    document.location.href = lien;
}
);