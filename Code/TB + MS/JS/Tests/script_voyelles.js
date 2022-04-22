var a = window.prompt("Saisissez un mot");
var b = a.toLowerCase()
var l = a.length;
var v = 0;
for (var p=0; p < l; p++)
{
    var k = b.substring(p,p+1);
    var pA = k.indexOf("a");
    var pE = k.indexOf("e");
    var pI = k.indexOf("i");
    var pO = k.indexOf("o");
    var pU = k.indexOf("u");
    var pY = k.indexOf("y");
    if (pA != -1 || pE != -1 || pI != -1 || pO != -1 || pU != -1 || pY != -1)
    {
        v++;
    }
}

document.write("Dans le mot " + a + " il y a " + v + " voyelle(s)");