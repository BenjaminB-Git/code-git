const euro = new Intl.NumberFormat('fr-FR', {
    style: 'currency',
    currency: 'EUR',
    minimumFractionDigits: 2
  });

function remise(x)
{
    if (x > 200)
    {
        return x-x*0.9
    }
    else if (x > 100)
    {
        return x-x*0.95
    }
    else
    {
        return 0
    }
}
function fdp(x)
{
    if (x > 500)
    {
        return 0
    }
    else
    {
        return Math.max(6, x*0.02)
    }
}





var prix = Number(window.prompt("Saisissez le prix de l'article"))
var qte = Number(window.prompt("Saisissez la quantité souhaitée"))

var tot = prix*qte;

var rem = remise(tot)
var prix_remi = tot - rem
var port = fdp(prix_remi)
var pap = prix_remi+port

document.write("Prix de l'article unitaire : " + euro.format(prix) + "<br>");
document.write("Quantité choisie : " + qte + "<br>");
document.write("Total avant remise : " + euro.format(tot) + "<br>");
document.write("Remise : " + euro.format(-rem) + "<br>");
document.write("Total après remise : " + euro.format(prix_remi) + "<br>");
document.write("Frais de port : " + euro.format(port) + "<br>");
document.write("Total à payer : " + euro.format(pap) + "<br>");

