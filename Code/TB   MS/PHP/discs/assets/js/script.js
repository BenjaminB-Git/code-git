
/*****************/
/** Disc_Detail **/
/*****************/

// Préparation du lien de direction
var idDisc = document.getElementById("idDisc").value;
var lien = "disc_modif.php?id=" + idDisc;


// Bouton "Modification"
const modif = document.querySelector("#modifier");

modif.addEventListener('click', () => {
    document.location.href = lien;
});

//bouton "Supprimer"
const supprimer = document.querySelector("#supprimer");

supprimer.addEventListener('click', () => {
    if(confirm("Êtes-vous sûr.e de vouloir supprimer cet album"))
    {
        document.location.href = 'script_disc_suppr.php?id=' + idDisc;
    };

});

//bouton "Retour"
const retour = document.querySelector("#retour");
retour.addEventListener('click', () => {
    document.location.href = 'discs.php'
});
