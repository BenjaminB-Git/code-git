setTimeout(getData, 3000)


function getData() {
    const response = fetch('http://localhost:8000/index.php')
        .then(response => response.json())
        .then(data => {idMap(data) 
            console.log(data)})
        .catch(error => console.log(error))

    return response
}

function openClient(id) {
    const response = fetch('http://localhost:8000/index.php?action=client&id=' + id)
        .then(response => response.json())
        .then(data => {clientMap(data)
                console.log(data)})
        .catch(error => console.log(error))
    
    return response
}



document.querySelector('#link-index').addEventListener('click', getData)
function idMap(data){

    document.getElementById("contenu").innerHTML = `    
        <div class="container">

            <div class="h1 pt-6">Bienvenue !</div>
            <div class="h3 pb-3 pt-3">Tableau de bord</div>
            <table class="text-center table-m-responsive table col-12">
                <thead class="table-info">
                    <tr>
                        <th scope="col">Votre chiffre d'affaires</th>
                        <th scope="col">Somme de vos devis</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        ${data[0].toLocaleString(undefined, {minimumFractionDigits: 2})} €
                    </td>
                    <td>
                        ${data[1].toLocaleString(undefined, {minimumFractionDigits: 2})} €
                    </td>

                </tr>
                </tbody>
            </table>
            <div class="h3 pb-3">Vos clients</div>
            <table class="table-m-responsive table col-12 table-striped">
                <thead class="text-center table-info">
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Adresse</th>
                        <th scope="col">Contact</th>
                        <th scope="col">CA</th>
                    <tr>
                </thead>
                <tbody>
                    ${Object.values(data[2]).map(item => `
                        <tr>
                        <th scope="row"><a href="#" onclick="openClient(${item.id})">${item.nom}</a></th>
                        <td>${item.adresse}</td>
                        <td>${item.contactNom}<br>${item.contactMail}<br>${item.contactTel}</td>
                        <td>${item.ca.toLocaleString(undefined, {minimumFractionDigits: 2})}€</td>
                        </tr>
                        
                        
                        
                        `
                    ).join('')}

                </tbody>
            </table>
            <div class="h3 pb-3">Vos devis</div>
            <table class="table-m-responsive table col-12 table-striped">
                <thead class="text-center table-info">
                    <tr>
                        <th scope="col">Devis</th>
                        <th scope="col">Date</th>
                        <th scope="col">Echéance</th>
                        <th scope="col">Prospect</th>
                        <th scope="col">Signé</th>
                        <th scope="col">Prix HT</th>
                        <th scope="col">Marge</th>
                        <th scope="col">Document</th>
                    </tr>
                </thead>
                <tbody>
                    ${Object.values(data[4]).map(item => `
                        <tr>
                        <th scope="row">${item.title}</th>
                        <td>${item.str_date}</td>
                        <td>${item.str_expiry_date}</td>
                        <td>${item.company_name}</td>
                        <td>${item.status == "accepted" ? "Oui" : "Non"}</td>
                        <td>${item.pre_tax_amount.toLocaleString(undefined, {minimumFractionDigits: 2})} € </td>
                        <td>${item.margin.toLocaleString(undefined, {minimumFractionDigits: 2})} € </td>
                        <td class="text-center"><a href="${item.public_path}" target="_BLANK">👁</a></td>
                        </tr>
                        
                        
                        `
                    ).join('')}
                </tbody>
            </table>
            <div class="h3 pb-3">Vos factures</div>
            <table class="table-m-responsive table col-12 table-striped">
                <thead class="text-center table-info">
                    <tr>
                        <th scope="col">n° Facture</th>
                        <th scope="col">Client</th>
                        <th scope="col">TTC</th>
                        <th scope="col">Reste TTC</th>
                        <th scope="col">Document</th>
                    </tr>
                </thead>
                <tbody>
                                    ${Object.values(data[5]).map(item => `
                        <tr>
                        <th scope="row">${item.number}</th>
                        <td>${item.company.name}</td>
                        <td>${item.total.toLocaleString(undefined, {minimumFractionDigits: 2})} € </td>
                        <td>${item.outstanding_amount.toLocaleString(undefined, {minimumFractionDigits: 2})} € </td>
                        <td class="text-center"><a href="${item.public_path}" target="_BLANK">👁</a></td>
                        </tr>
                        
                        
                        `
                    ).join('')}

                </tbody>
            </table>
                </div>
            </div>`
}

function clientMap(data){
    document.getElementById("contenu").innerHTML = `
        <div class="container">

        <div class="h1 pt-6">${data.nom}</div>
        <div class="h4 pt-3">Chiffre d'affaires : ${data.ca.toLocaleString(undefined, {minimumFractionDigits: 2})} €</div>
        <div class="pt-3">
            ${data.adresse}<br>
            ${data.contactNom}<br>
            ${data.contactMail}<br>
            ${data.contactTel}<br>
        </div>
        <div class="h3 pb-3 pt-3">Devis</div>
    <table class="table-m-responsive table col-12 table-striped">
        <thead class="text-center table-info">
            <tr>
                <th scope="col">Devis</th>
                <th scope="col">Date</th>
                <th scope="col">Signé</th>
                <th scope="col">Prix HT</th>
                <th scope="col">Marge</th>
                <th scope="col">Document</th>
            </tr>
        </thead>
        <tbody>
        ${data.devis != null ? Object.values(data.devis).map(item => `
        <tr>
          <th colspan="row">${item.title}</th>
          <td>${item.str_date}</td>
          <td>${item.status=="accepted" ? "Oui" : "Non"}</td>
          <td>${item.pre_tax_amount.toLocaleString(undefined, {minimumFractionDigits: 2})} €</td>
          <td>${item.margin.toLocaleString(undefined, {minimumFractionDigits: 2})} €</td>
          <td class="text-center"><a href="${item.public_path}" target="_BLANK">👁</a></td>
  
        </tr>
            `
        )
    : `
        <tr>
            <td colspan="6" class="text-center">Pas de devis</td>   
        </tr>
    `}
        </tbody>
    </table>
    <div class="h3 pb-3">Factures</div>
    <table class="table-m-responsive table col-12 table-striped">
        <thead class="text-center table-info">
            <tr>
                <th scope="col">n° Facture</th>
                <th scope="col">Date</th>
                <th scope="col">TTC</th>
                <th scope="col">Reste TTC</th>
                <th scope="col">Document</th>
            </tr>
        </thead>
        <tbody>
        ${data.factures != null ? Object.values(data.factures).map(item => `
                <tr>
                    <th colspan="row">${item.number}</th>
                    <td>${item.str_date}</td>
                    <td>${item.total.toLocaleString(undefined, {minimumFractionDigits: 2})} €</td>
                    <td>${item.outstanding_amount.toLocaleString(undefined, {minimumFractionDigits: 2})} €</td>
                    <td class="text-center"><a class="btn btn-default" href="${item.public_path}" target="_BLANK">👁</a></td>
                </tr>`)
                : `
                <tr>
                    <td colspan="5" class="text-center">Pas de facture</td>   
                </tr>`}
        </tbody>
    </table>
        </div>    
    `
}  
