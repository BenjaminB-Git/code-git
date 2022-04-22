var TableMultiplication = function(x)
{
        for (var i = 1; i <=10; i++)
        {
                var k = i*x;
                document.write(i + "x" + x + "=" + k + "<br>")
        }
}

var ask = Number(window.prompt("Saisissez un nombre"))
while (isNaN(ask))
{
        ask = Number(window.prompt("Nombre incorrect"))
}

TableMultiplication(ask)