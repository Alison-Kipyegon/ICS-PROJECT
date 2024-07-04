function searchMenu() {
    const query = document.getElementById('searchBar').value;
    if (query === '') {
        alert('Please enter a search term');
        return;
    }
    
    fetch(`search_menu.php?q=${query}`)
        .then(response => response.json())
        .then(data => {
            const menuResults = document.getElementById('menuResults');
            menuResults.innerHTML = '';

            if (data.length === 0) {
                menuResults.innerHTML = '<p>No menu items found</p>';
            } else {
                data.forEach(item => {
                    const menuItem = document.createElement('div');
                    menuItem.innerHTML = `
                        <h3>${item.name}</h3>
                        <p>${item.description}</p>
                        <p>Price: $${item.price}</p>
                        <button onclick="bookTable(${item.id})">Book a Table</button>
                    `;
                    menuResults.appendChild(menuItem);
                });
            }
        })
        .catch(error => console.error('Error:', error));
}

function bookTable(menuId) {
    window.location.href = `booking.html?menuId=${menuId}`;
}
