document.querySelector('input[name="address"]').addEventListener('input', function () {
  fetchTomTomSuggestions(this.value, 'address');
});

// Funzione per ottenere i suggerimenti da TomTom
function fetchTomTomSuggestions(query, field) {
  const apiKey = 'O8G3nbrrFXgXG05YvxpNGd9inXNQbAJp'; // In alternativa, puoi ottenere la chiave API da un'opzione di configurazione Laravel

  fetch(`https://api.tomtom.com/search/2/search/${query}.json?key=${apiKey}`)
    .then(response => response.json())
    .then(data => {
      const suggestions = data.results;
      const suggestionList = document.querySelector(`#${field}-suggestions`);

      suggestionList.innerHTML = '';

      suggestions.forEach(suggestion => {
        const suggestionItem = document.createElement('li');
        suggestionItem.classList.add("list-group-item")
        suggestionItem.textContent = suggestion.address.freeformAddress;
        suggestionItem.addEventListener('click', function () {
          document.querySelector(`input[name="${field}"]`).value = suggestion.address.freeformAddress;
          suggestionList.innerHTML = '';
        });
        suggestionList.appendChild(suggestionItem);
      });
    });
}