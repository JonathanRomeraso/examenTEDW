document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('.form-search');

    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Evita que el formulario se envíe de la manera convencional

        // Captura los valores de los campos usando id
        const listingType = document.getElementById('list-types').value;
        const offerType = document.getElementById('offer-types').value;

        window.location.href = `/search/type/${listingType}/status/${offerType}`;
    });


    const sortSelect = document.getElementById('sort-options');

    sortSelect.addEventListener('change', function() {
        const selectedValue = sortSelect.value;

        if (selectedValue) {
            window.location.href = `/sort/${selectedValue}`;
        }
    });
});
