var tab = ["Audrey", "Aurélien", "Flavien", "Jérémy", "Laurent", "Melik", "Nouara", "Salem", "Samuel", "Stéphane"];
var bool = false

do
{
    console.log(tab)
    var concat="\n";
    for (var h = 0; h < tab.length; h++)
    {
        concat+= tab[h] + "\n";
    }
    var search = window.prompt("Cherchez un prénom" + concat);
    for (var i = 0; i < tab.length; i++)
    {
        if (search == tab[i])
        {
            tab.splice(i,1)
            tab.push("")
            alert("Trouvé")
            break;
        }
    }
    if (i==10)
    {
        alert("Introuvable")
    }
    

} while (bool == false)