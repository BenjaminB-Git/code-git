var menu = true;
while (menu == true)
{
    var select = window.prompt("Sélectionnez une option : \nGetInteger : vérifier qu'un nombre est entier\nInitTab : créer un tableau (nécessaire pour les options suivantes\nSaisieTab : saisir les données du tableau\nAfficheTab : afficher les données dans le tableau\nRechercheTab : rechercher une entrée dans le tableau;\nInfoTab : donne la moyenne et la valeur maximale du tableau");
    switch (select.toLowerCase())
    {
        default:
            alert("Option inconnue");
            break;
        
        case "getinteger":
            var txtint = window.prompt("Saisissez un nombre entier");
            int = Number(txtint);
            if(Number.isInteger(int) == false)
            {
                alert("Attention, " + txtint + " n'est pas un nombre entier.");
            }
            else
            {
                alert("Oui, " + txtint + " est bien un nombre entier")
            }
            break;
        
        case "inittab":
            var length = Number(window.prompt("Saisissez la longueur du tableau"));
            while (Number.isInteger(length) == false || length <= 0)
            {
                length = Number(window.prompt("Merci de saisir un nombre entier positif pour la longueur du tableau"))
            }
            var tab = new Array(length);
            alert("Un tableau de " + length + " entrée(s) a été créé")
            break;
        
        case "saisietab":
            if (tab == null || tab.length == 0)
            {
                alert("Vous n'avez pas créé de tableau !")
            }
            else
            {
                for (var i=0; i<tab.length; i++)
                {
                    var saisie = Number(window.prompt("Saisissez un nombre pour l'entrée " + i));
                    while (isNaN(saisie))
                    {
                        saisie = Number(window.prompt("Il ne s'agit pas d'un nombre.\nSaisissez un nombre entier pour l'entrée " + i));
                    }
                    tab[i] = saisie;
                }
            }
            break;
        
        case "affichetab":
            if (tab == null || tab.length == 0)
            {
                alert("Vous n'avez pas créé de tableau !")
            }
            else
            {
                var liste = tab[0] + "\n"
                for(var j=1;j<tab.length;j++)
                {
                    var liste = liste + tab[j] + "\n"
                }
                alert("Voici la liste des éléments :\n" + liste)
            }
            break;
        
        case "recherchetab":
            if (tab == null || tab.length == 0)
            {
                alert("Vous n'avez pas créé de tableau !")
            }
            else
            {
                var taillemax = tab.length - 1
                var recherche = Number(window.prompt("Saisissez un nombre entier entre 0 et " + taillemax))
                while(recherche <0 || recherche > taillemax || Number.isInteger(recherche) == false)
                {
                    recherche = Number(window.prompt("Nombre incorrect.\nSaisissez un nombre entier entre 0 et " + taillemax))
                }
                alert("L'entrée " + recherche + " correspond au nombre " + tab[recherche] + " dans le tableau")
            }
            break;

        case "infotab":
            if (tab == null || tab.length == 0)
            {
                alert("Vous n'avez pas créé de tableau !")
            }
            else
            {
                var sum = 0;
                var max = tab[0];
                for(z=0; z<tab.length; z++)
                {
                    sum += tab[z];
                    if(tab[z] > max)
                    {
                        max = tab[z]
                    }
                }
                var moy = sum / tab.length
                alert("La moyenne du tableau est " + moy + "\nLa valeur max du tableau est " + max)
            }
            
    }
if(window.confirm("Revenir au menu ?"))
{
}
else
{
    menu = false
}
    
}

document.write("Merci, l'exercice est terminé <br>Vous pouvez actualiser la page pour recommencer")