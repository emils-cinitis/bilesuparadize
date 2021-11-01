const image = document.getElementById("generatedImage");

function generateCollage() {
    image.src = '';

    const url = 'generateImage.php';
    const xmlHttp = new XMLHttpRequest();

    // Setup http GET request
    xmlHttp.open("GET", url, true);
    // Send http request
    xmlHttp.send();

    // Listen for response
    xmlHttp.onreadystatechange = function() { 
        if(xmlHttp.readyState === XMLHttpRequest.DONE) {
            setGeneratedImage(xmlHttp.responseText);
        }
    }
}

function setGeneratedImage(path) {
    image.src = path;

    image.parentElement.classList.remove('hidden');
}

document.getElementById('generateCollage').addEventListener("click", generateCollage);

