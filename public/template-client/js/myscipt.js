document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const restaurantItems = document.querySelectorAll('.restaurant-item');

    searchInput.addEventListener('input', function() {
        const filter = searchInput.value.toLowerCase();
        restaurantItems.forEach(item => {
            const restaurantName = item.querySelector('.post-title a').textContent.toLowerCase();
            if (restaurantName.includes(filter)) {
                item.style.display = '';
            } else {
                item.style.display = 'none';
            }
        });
    });
});