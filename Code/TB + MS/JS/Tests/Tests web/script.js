const txtarea = document.querySelector('#projet')

txtarea.addEventListener('change',(event) => {
    const txt = document.querySelector('#complement_projet')
    txt.textContent = event.target.value

})

const envoi = document.querySelector('.envoyer')

envoi.addEventListener('click', count => {
    var count = 0;

    if (societe.value.search(/\S/) == -1) 
    {
        alert("Merci d'écrire le nom de la société");
        count++;
    }
    if (a_contacter.value.search(/\S/) == -1) 
    {
        alert("Merci d'indiquer la personne à contacter");
        count++;
    }
    if (cp.value.length != 5 || cp.value.search(/\D/) != -1)
    {
        alert("Le code postal est invalide");
        count++;
    }
    if (ville.value.search(/\S/) == -1)
    {
        alert("Merci d'indiquer une ville");
        count++;
    }
    if (email.value.search('@') == -1)
    {
        alert("Merci d'indiquer une adresse mail valide");
        count++;
    }
    if (count == 0)
    {
        document.forms['contact'].submit()
    }


})