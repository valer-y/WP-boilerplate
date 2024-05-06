export const ajax = () => {
    document.addEventListener('DOMContentLoaded', () => {

        const carsFilterBlock = document.querySelector('.cars-filter');
        const carsFilterForm = carsFilterBlock.getElementsByTagName('form')[0];
        const carsContainer = document.querySelector('.cars__wrapper');
        const brandFilter = document.getElementById("car__brand-filter");
        const colorFilter = document.getElementById("car__color-filter");
        const modelFilter = document.getElementById("car__model-filter");
        const yearFilter = document.getElementById("car__year-filter");
        const priceRange = document.querySelector(".price-range");

        let colorFilterValue = '';
        let brandFilterValue = '';
        let modelFilterValue = '';
        let yearFilterValue = '';
        let priceFilterValue = '';
        const button = carsFilterForm.querySelector('.find-cars');
        const showAllButton = carsFilterForm.querySelector('.show-all-cars');
        console.log(priceRange);

        function getPriceRange() {

            let priceFrom = document.getElementById("fromInput").value;
            let priceTo = document.getElementById("toInput").value;

            priceFilterValue = {
                'price_from': priceFrom,
                'price_to': priceTo
            };

        }

            let from = document.getElementById("fromInput").value;
            console.log(from);


        colorFilter.addEventListener("change", function() {
            colorFilterValue = colorFilter.options[colorFilter.selectedIndex].value;
        });

        brandFilter.addEventListener("change", function() {
            brandFilterValue = brandFilter.options[brandFilter.selectedIndex].value;
        });

        modelFilter.addEventListener("change", function() {
            modelFilterValue = modelFilter.options[modelFilter.selectedIndex].value;
        });

        yearFilter.addEventListener("change", function() {
            yearFilterValue = yearFilter.options[yearFilter.selectedIndex].value;
        });

        // find button
        button.addEventListener('click', () => {
            getPriceRange();
            sendCarFiltersData();
        })
        // show all button
        showAllButton.addEventListener('click', () => {
            location.reload(true);
        })

        console.log('test-start');

        // AJAX
        function sendCarFiltersData() {
            const data = new URLSearchParams();

            data.append('action', 'carsAjaxFunction');
            data.append('nonce', carsFilterObject.nonce);
            data.append('brand', brandFilterValue);
            data.append('color', colorFilterValue);
            data.append('model', modelFilterValue);
            data.append('year', yearFilterValue);

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
                    return response.json();
                })
                .then(function(responseJson) {
                    console.log('Response from show_more_posts:', responseJson);
                    while (carsContainer.firstChild) {
                        carsContainer.removeChild(carsContainer.firstChild);
                    }
                    carsContainer.insertAdjacentHTML('beforeend', responseJson);
                }).catch(function (){

            })
        }

        console.log('test-end');
    });

}
