var age;
var jeune = 0;
var moyen = 0;
var vieux = 0;

do
{
    age = Number(window.prompt("Saisissez un âge"));
    while (isNaN(age) || age < 0)
    {
        age = Number(window.prompt("Âge incorrect"))
    }
    if (age<20)
    {
            jeune++;
    }
        
    else if (age>40)
    {
            vieux++;
    }

    else
    {
            moyen++;
    }
} while (age < 100)

document.write("<p>Il y a "+jeune+" jeune(s)</p>");
document.write("<p>Il y a "+moyen+" personne(s) d'âge moyen</p>");
document.write("<p>Il y a "+vieux+" personne(s) âgée(s)</p>")