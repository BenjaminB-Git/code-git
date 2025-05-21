function strtok(str1,str2,x)
{
    var y = str1.split(str2)
    return y[x-1]
}

var test = "jean;charles;amiens;80000;poney"

var n = strtok(test,";",3)

document.write(n)