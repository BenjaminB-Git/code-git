/**************/
/**Disc_Modif**/
/**************/

//Vérification du formulaire

var testyear = new RegExp(/^\d{4}$/);
var testprice = new RegExp(/^\d+\.?\d{0,2}$/);

const valid_update = document.querySelector("#valid_update");

valid_update.addEventListener('click', (nyope) => {
    var nyope ="";
    year_for_disc.value = Number(year_for_disc.value);

if (title_for_disc.value == "")
{
    nyope += "Titre incorrect \n";
    alert(nyope);
}
else if (artist_for_disc.value == "")
{
    alert("Erreur 1")
}
else if (testyear.test(year_for_disc.value) == false)
{
    alert("Erreur 2")
}
else if (genre_for_disc.value == "")
{
    alert("Erreur 3")
}
else if (label_for_disc.value == "")
{
    alert("Erreur 4")
}
else if (testprice.test(price_for_disc.value) == false)
{
    alert("Erreur 5")
}
else
{

    document.forms["form_modif"].submit()
}
});
