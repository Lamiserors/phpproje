
    document.getElementById("edit-button").addEventListener("click", function() {
        window.location.href = "hayvanlarin_listesi.php";
    });

    // Mevcut hayvan sayısını ve doluluk oranını almak için AJAX kullan
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = JSON.parse(xhr.responseText);
            document.getElementById("animal-count").innerHTML = "Mevcut Hayvan Sayısı: " + response.animalCount;
            document.getElementById("fill-percentage").innerHTML = "Doluluk Oranı: %" + response.fillPercentage;
        }
    };
    xhr.open("GET", "doluluk.php", true);
    xhr.send();

