


var prm = Number(prompt("saisissez nombre"));
var before = Date.now();

liste_prm = [2];
for (i=3; i<=prm; i++)
{
    for (j=0; j<liste_prm.length; j++)
    {
        var cpt = true
        if (i == 3)
        {
            break;
        };

        if (i%liste_prm[j] == 0)
        {
            cpt = false;
            break;
        };

        if(i/liste_prm[j]<liste_prm[j+1])
        {
            break;
        };
        
    }
    if (cpt == true)
    {
        liste_prm.push(i);
    };
};
var after = Date.now();
var count = after - before;
document.write(count+ "<br>");

for (k=0; k<liste_prm.length; k++)
{
    document.write(liste_prm[k] + "\n");
};



