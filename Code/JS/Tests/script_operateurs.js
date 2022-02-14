var a = window.prompt("Entrez un premier nombre")
var b = window.prompt("Entrer un deuxième nombre")
var c = window.prompt("Entrez un opérateur + * - ou /")
a = Number(a)
b = Number(b)

switch (c)
{
    default:
        alert("Opérateur invalide");
        break;
    case "+":
        var add = a+b;
        alert(a + " + " + b + " = " + add);
        break;
    case "-":
        var sub = a-b;
        alert(a + " - " + b + " = " + sub);
        break;
    case "*":
        var prod = a*b
        alert(a + " x " + b + " = " + prod);
        break;
    case "/":
        if(b == 0)
        {
            alert("Division par zéro impossible");
        }
        else
        {
            var divide = a/b
            alert(a + " / " + b + " = " + divide);

        }
    
}