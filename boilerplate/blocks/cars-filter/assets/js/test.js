export const test = () => {
    document.addEventListener('DOMContentLoaded', () => {

        const carsFilterBlock = document.querySelector('.cars-filter');
        const carsFilterForm = carsFilterBlock.getElementsByTagName('form');
        const brandFilter = document.getElementById("car__brand-filter");
        const colorFilter = document.getElementById("car__color-filter");
        let colorFilterValue = '';
        let brandFilterValue = '';
        const button = carsFilterForm[0].querySelector('.button');
        console.log(carsFilterForm);

        colorFilter.addEventListener("change", function() {
            colorFilterValue = colorFilter.options[colorFilter.selectedIndex].value;
        });

        brandFilter.addEventListener("change", function() {
            brandFilterValue = brandFilter.options[brandFilter.selectedIndex].value;
        });

        button.addEventListener('click', () => {
            sendCarFiltersData();
        })

        console.log('test-start');

        function sendCarFiltersData() {
            const data = new URLSearchParams();

            data.append('action', 'carsAjaxFunction');
            data.append('nonce', carsFilterObject.nonce);
            data.append('brand', brandFilterValue);

            fetch(carsFilterObject.ajaxurl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: data
            })
                .then(function(response) {
                    if (!response.ok) {
                        throw new Error();
                    }
                    return response.text();
                })
                .then(function(responseText) {
                    console.log('Response from show_more_posts:', responseText);
                }).catch(function (){

            })
        }
        // Create a FormData object if you're appending form data; otherwise, use URLSearchParams


        console.log('test-end');
    });

}
