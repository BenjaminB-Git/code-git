document.addEventListener('DOMContentLoaded', function() {
    loadDashboard();

    function loadDashboard() {
        showLoader();
        fetch('router.php?action=dashboard')
            .then(response => response.json())
            .then(data => {
                console.log(data);
                displayDashboard(data);
                bindClientLinks();
            })
            .catch(error => console.error('Error:', error))
            .finally(() => hideLoader());
    }

    function loadClient(id) {
        showLoader();
        fetch(`router.php?action=client&id=${id}`)
            .then(response => response.json())
            .then(data => {
                console.log(data);
                displayClient(data);
            })
            .catch(error => console.error('Error:', error))
            .finally(() => hideLoader());
    }

    function displayDashboard(data) {
        const dashboard = `
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
                        <td>${numberFormat(data.calc_invoices)}</td>
                        <td>${numberFormat(data.calc_quotations)}</td>
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
                    </tr>
                </thead>
                <tbody>
                    ${Object.values(data.clients).map(client => `
                        <tr class="align-middle">
                            <th colspan="row"><a href="#" class="client-link" data-id="${client.id}">${client.nom}</a></th>
                            <td>${client.adresse}</td>
                            <td>${client.contactNom}<br>${client.contactMail}<br>${client.contactTel}</td>
                            <td>${numberFormat(client.ca)}</td>
                        </tr>
                    `).join('')}
                </tbody>
            </table>
            <div class="h3 pb-3">Devis</div>
            <table class="table-m-responsive table col-12 table-striped">
                <thead class="text-center table-info">
                    <tr>
                        <th scope="col">Numéro</th>
                        <th scope="col">Titre</th>
                        <th scope="col">Date</th>
                        <th scope="col">Montant HT</th>
                        <th scope="col">Lien</th>
                    </tr>
                </thead>
                <tbody>
                    ${Object.values(data.clients).flatMap(client => client.devis.map(devis => `
                        <tr>
                            <td>${devis.number}</td>
                            <td>${devis.title}</td>
                            <td>${new Date(devis.date).toLocaleDateString()}</td>
                            <td>${numberFormat(devis.pre_tax_amount)}</td>
                            <td><a href="${devis.public_path}" target="_blank">Voir</a></td>
                        </tr>
                    `)).join('')}
                </tbody>
            </table>
            <div class="h3 pb-3">Factures</div>
            <table class="table-m-responsive table col-12 table-striped">
                <thead class="text-center table-info">
                    <tr>
                        <th scope="col">Numéro</th>
                        <th scope="col">Date</th>
                        <th scope="col">Montant HT</th>
                        <th scope="col">Lien</th>
                    </tr>
                </thead>
                <tbody>
                    ${Object.values(data.clients).flatMap(client => client.factures.map(facture => `
                        <tr>
                            <td>${facture.number}</td>
                            <td>${new Date(facture.date).toLocaleDateString()}</td>
                            <td>${numberFormat(facture.pre_tax_amount)}</td>
                            <td><a href="${facture.public_path}" target="_blank">Voir</a></td>
                        </tr>
                    `)).join('')}
                </tbody>
            </table>
        `;
        document.getElementById('contenu').innerHTML = dashboard;
    }

    function displayClient(client) {
        const clientView = `
            <div class="h1 pt-6">${client.nom}</div>
            <div class="h4 pt-3">Chiffre d'affaires : ${numberFormat(client.ca)}</div>
            <div class="pt-3">
                ${client.adresse}<br>
                ${client.contactNom}<br>
                ${client.contactMail}<br>
                ${client.contactTel}
            </div>
            <div class="h3 pt-3">Devis</div>
            <table class="table-m-responsive table col-12 table-striped">
                <thead class="text-center table-info">
                    <tr>
                        <th scope="col">Numéro</th>
                        <th scope="col">Titre</th>
                        <th scope="col">Date</th>
                        <th scope="col">Montant HT</th>
                        <th scope="col">Lien</th>
                    </tr>
                </thead>
                <tbody>
                    ${client.devis.map(devis => `
                        <tr>
                            <td>${devis.number}</td>
                            <td>${devis.title}</td>
                            <td>${new Date(devis.date).toLocaleDateString()}</td>
                            <td>${numberFormat(devis.pre_tax_amount)}</td>
                            <td><a href="${devis.public_path}" target="_blank">Voir</a></td>
                        </tr>
                    `).join('')}
                </tbody>
            </table>
            <div class="h3 pt-3">Factures</div>
            <table class="table-m-responsive table col-12 table-striped">
                <thead class="text-center table-info">
                    <tr>
                        <th scope="col">Numéro</th>
                        <th scope="col">Date</th>
                        <th scope="col">Montant HT</th>
                        <th scope="col">Lien</th>
                    </tr>
                </thead>
                <tbody>
                    ${client.factures.map(facture => `
                        <tr>
                            <td>${facture.number}</td>
                            <td>${new Date(facture.date).toLocaleDateString()}</td>
                            <td>${numberFormat(facture.pre_tax_amount)}</td>
                            <td><a href="${facture.public_path}" target="_blank">Voir</a></td>
                        </tr>
                    `).join('')}
                </tbody>
            </table>
        `;
        document.getElementById('contenu').innerHTML = clientView;
    }

    function bindClientLinks() {
        document.querySelectorAll('.client-link').forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                const clientId = this.getAttribute('data-id');
                loadClient(clientId);
            });
        });
    }

    function numberFormat(value) {
        return new Intl.NumberFormat('fr-FR', { style: 'currency', currency: 'EUR' }).format(value);
    }

    function showLoader() {
        const loader = `
            <div class="d-flex justify-content-center">
                <div class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        `;
        document.getElementById('contenu').innerHTML = loader;
    }

    function hideLoader() {
    }
});
