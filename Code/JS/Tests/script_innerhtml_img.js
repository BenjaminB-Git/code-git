var multi = function produit(x,y)
{
    return x*y
}
var un = window.prompt("Saisissez un nombre");
var deux = window.prompt("Saisissez un multiplicateur");

var k = multi(un,deux);


document.getElementById("image").innerHTML = "<img src=\"Image/papillon.jpg\" alt=\"Mais pourquoi ça s'affiche pas ?\">"

document.write("Le produit de " + un + " x " + deux + " est " + k)