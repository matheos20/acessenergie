"use strict";

const Consommation =  () => {
    return {
        search : async (url) => {
            let loaderBtn = $('#loader_search_btn_consommation');
            try {
                loaderBtn.removeClass('d-none');
                const response = await $.ajax({
                    method: 'post',
                    url:  url,
                    data: {terms:  $("#search_consommation_input").val()}
                });
                loaderBtn.addClass('d-none');
                let res = '';
                response.forEach(function (item) {
                    res += `
                            <tr style="font-size: .7vw;">
                                <td data-label="Horodatage">${item.dateNow}</td>
                                <td data-label="Identité">${item.nameOfSignatory}</td>
                                <td data-label="Adresse mail">${ item.mail }</td>
                                <td data-label="Adresse physique">${ item.address }</td>
                                <td data-label="Numéro de PRM">${ item.pdl1}</td>
                                <td data-label="Autorisation">Oui</td>
                                <td data-label="Données techniques">Oui</td>
                                <td data-label="Données contractuelles">Oui</td>
                                <td data-label="Données de mesure">Oui</td>
                            </tr>
                            ` ;
                });
                $('#list_consomation_table tbody').html(res);
                $('#list_consomation_table').removeClass('d-none');
            }catch (e) {
                loaderBtn.addClass('d-none');
                $('#list_consomation_table tbody').html('<tr><td colspan="10">Une erreur se reproduite lors de recherche des données</td></tr>');
                $('#list_consomation_table').removeClass('d-none');
                console.error(e);
            }
        }
    }

}
window.Consommation = Consommation;