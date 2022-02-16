var testgen = new RegExp('^[A-Za-z-]+$');
var testcp = new RegExp('^[0-9]{5}')
var testdate = new RegExp('^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$')
var testmail = new RegExp('^[a-z-.0-9]+[@][a-z]+\.[a-z]{2,4}\.?[a-z]{0,3}$')


const valid = document.querySelector('.envoi')

valid.addEventListener('click', (bool) => {
    bool = true

    if (testgen.test(nom.value) == false)
    {
        document.getElementById('testNom').innerHTML = "<br>Veuillez entrer un nom"
        bool = false
    }
    else
    {
        document.getElementById('testNom').innerHTML = ""
    }

    if(testgen.test(prenom.value) == false)
    {
        document.getElementById('testPrenom').innerHTML = "<br>Veuillez entrer un prénom"
        bool = false
    }
    else
    {
        document.getElementById('testPrenom').innerHTML = ""
    }

    if (document.getElementById('homme').checked == false && document.getElementById('femme').checked == false)
    {
        document.getElementById('testSexe').innerHTML = "<br>Veuillez choisir un sexe"
        bool = false
    }
    else
    {
        document.getElementById('testSexe').innerHTML = ""
    }

    if (testdate.test(date.value) == false)
    {
        document.getElementById('testDate').innerHTML = "<br>Veuillez entrer une date valide"
        bool = false
    }
    else
    {
        document.getElementById('testDate').innerHTML = ""
    }

    if (testcp.test(cp.value) == false)
    {
        document.getElementById('testCP').innerHTML = "<br>Veuillez saisir un code postal valide"
        bool = false
    }
    else
    {
        document.getElementById('testCP').innerHTML = ""
    }

    if (testmail.test(mail.value) == false)
    {
        document.getElementById('testEmail').innerHTML = "<br>Veuillez saisir une adresse mail valide"
        bool = false
    }
    else
    {
        document.getElementById('testEmail').innerHTML = ""
    }

    if (document.getElementById('sujet').value == "")
    {
        document.getElementById('testSujet').innerHTML = "<br>Veuillez sélectionner un sujet"
        bool = false
    }
    else
    {
        document.getElementById('testSujet').innerHTML = ""
    }

    if (question.value == null || question.value == "")
    {
        document.getElementById('testQuestion').innerHTML = "<br>Veuillez saisir votre question"
        bool = false
    }
    else
    {
        document.getElementById('testQuestion').innerHTML = ""
    }

    if (document.getElementById('conditions').checked == false)
    {
        document.getElementById('testConditions').innerHTML = "<br>Vous n'avez pas accepté le traitement informatique"
        bool = false
    }
    else
    {
        document.getElementById('testConditions').innerHTML = ""
    }

    if (bool == true)
    {
        document.forms['contact'].submit()
    }




})