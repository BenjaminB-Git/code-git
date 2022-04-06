//Vérification du formulaire

var testyear = new RegExp(/^\d{4}$/);
var testprice = new RegExp(/^\d+\.?\d{0,2}$/);

const valid_update = document.querySelector("#valid_update");

valid_update.addEventListener('click', (bool) => {
    var bool = true;


if (title_for_disc.value == "")
{
    bool = false;
    document.getElementById('par_title').innerHTML = "Veuillez saisir le nom de l'artiste";
}
else
{
    document.getElementById('par_title').innerHTML = "";
}

if (artist_for_disc.value == "")
{
    bool = false;
    document.getElementById("par_artist").innerHTML = "Veuillez sélectionner un artiste dans la liste";
}
else
{
    document.getElementById("par_artist").innerHTML = "";
}

if (year_for_disc.value == "")
{
    bool = false;
    document.getElementById('par_year').innerHTML = "Veuillez saisir l'année de parution";
}

else if (testyear.test(year_for_disc.value) == false)
{
    bool = false;
    document.getElementById('par_year').innerHTML = "Veuillez saisir une année valide";
}
else
{
    document.getElementById('par_year').innerHTML = "";
}

if (genre_for_disc.value == "")
{
    bool = false;
    document.getElementById('par_genre').innerHTML = "Veuillez saisir le genre du disque";
}
else
{
    document.getElementById('par_genre').innerHTML = "";
}

if (label_for_disc.value == "")
{
    bool = false;
    document.getElementById('par_label').innerHTML = "Veuillez saisir le label du disque";
}
else
{
    document.getElementById('par_label').innerHTML = "";
}

if (price_for_disc.value == "")
{
    bool = false;
    document.getElementById('par_price').innerHTML = "Veuillez saisir le prix du disque";
}
else if (testprice.test(price_for_disc.value) == false)
{
    bool = false;
    document.getElementById('par_price').innerHTML = "Veuillez saisir un prix valide";
}
else
{
    document.getElementById('par_price').innerHTML ="";
}

if (bool == true)
{
    document.forms["form_modif"].submit()
}
});
