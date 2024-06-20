// Get the search input field
const searchInput = document.querySelector('.input');

// Get the list element to display the results
const list = document.querySelector('.results-list');

// Define the data for the restaurants
const restaurants = [
  { name: 'Becky\'s Cafe' },
  { name: 'Bistro 123' },
  { name: 'The Restaurant' },
  // Add more restaurants to the list
];

// Function to filter the restaurants based on the search input
function filterRestaurants(value) {
  return restaurants.filter(restaurant => {
    return restaurant.name.toLowerCase().includes(value.toLowerCase());
  });
}

// Function to display the search results
function displayResults(results) {
  clearList();
  for (const restaurant of results) {
    const resultItem = document.createElement('li');
    resultItem.classList.add('result-item');
    const text = document.createTextNode(restaurant.name);
    resultItem.appendChild(text);
    list.appendChild(resultItem);
  }
  if (results.length === 0) {
    noResults();
  }
}

// Function to clear the search results
function clearList() {
  while (list.firstChild) {
    list.removeChild(list.firstChild);
  }
}

// Function to display no results message
function noResults() {
  const error = document.createElement('li');
  error.classList.add('error-message');
  const text = document.createTextNode('No results found. Sorry!');
  error.appendChild(text);
  list.appendChild(error);
}

// Add event listener to the search input field
searchInput.addEventListener('input', (e) => {
  let value = e.target.value;
  if (value && value.trim().length > 0) {
    value = value.trim().toLowerCase();
    displayResults(filterRestaurants(value));
  } else {
    clearList();
  }
});