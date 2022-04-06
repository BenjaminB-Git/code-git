//Vérification du formulaire

var testyear = new RegExp(/^\d{4}$/);
var testprice = new RegExp(/^\d+\.?\d{0,2}$/);
var array_ext = new Array("jpg", "jpeg", "png", "x-png", "tiff", "pjpeg");

const valid_update = document.querySelector("#valid_update");

valid_update.addEventListener('click', (bool) => {
    var bool = true;


if (title_for_new_disc.value == "")
{
    bool = false;
    document.getElementById('new_par_title').innerHTML = "Veuillez saisir le nom de l'artiste";
}
else
{
    document.getElementById('new_par_title').innerHTML = "";
};

if (artist_for_new_disc.value == "")
{
    bool = false;
    document.getElementById('new_par_artist').innerHTML = "Veuillez sélectionner un artiste dans la liste";
}
else
{
    document.getElementById('new_par_artist').innerHTML = "";
};

if (year_for_new_disc.value == "")
{
    bool = false;
    document.getElementById('new_par_year').innerHTML = "Veuillez saisir l'année de parution";
}

else if (testyear.test(year_for_new_disc.value) == false)
{
    bool = false;
    document.getElementById('new_par_year').innerHTML = "Veuillez saisir une année valide";
}
else
{
    document.getElementById('new_par_year').innerHTML = "";
};

if (genre_for_new_disc.value == "")
{
    bool = false;
    document.getElementById('new_par_genre').innerHTML = "Veuillez saisir le genre du disque";
}
else
{
    document.getElementById('new_par_genre').innerHTML = "";
};

if (label_for_new_disc.value == "")
{
    bool = false;
    document.getElementById('new_par_label').innerHTML = "Veuillez saisir le label du disque";
}
else
{
    document.getElementById('new_par_label').innerHTML = "";
};

if (price_for_new_disc.value == "")
{
    bool = false;
    document.getElementById('new_par_price').innerHTML = "Veuillez saisir le prix du disque";
}
else if (testprice.test(price_for_new_disc.value) == false)
{
    bool = false;
    document.getElementById('new_par_price').innerHTML = "Veuillez saisir un prix valide";
}
else
{
    document.getElementById('new_par_price').innerHTML ="";
};

if (picture_for_new_disc.value == "")
{
    bool = false;
    document.getElementById('new_par_picture').innerHTML = "Veuillez choisir une image"
}
else
{
    var ext = picture_for_new_disc.value;
    var rech_ext = ext.substring(ext.lastIndexOf('.') + 1);
    if (array_ext.indexOf(rech_ext) == -1)
    {
        bool = false;
        document.getElementById('new_par_picture').innerHTML = "Format de fichier invalide"
    }
    else
    {
        document.getElementById('new_par_picture').innerHTML = "";
    };

};

if (bool == true)
{
    document.forms["form_ajout"].submit()
}
});