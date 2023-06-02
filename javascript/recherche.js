document.addEventListener("DOMContentLoaded", function() {
    var searchInput = document.getElementById("searchInput");
    var searchResults = document.getElementById("searchResults");

    searchInput.addEventListener("input", function() {
        var term = searchInput.value.trim();

        // Effectuer une requête AJAX vers le fichier PHP
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "php/recherche.php?term=" + term, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                // Mettre les résultats dans la balise avec l'id "search-results"
                searchResults.innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    });
});