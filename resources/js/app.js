import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import { functions } from 'lodash';
import.meta.glob([
    '../img/**'
])

function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

const buttons = document.querySelectorAll(".ms_btn_cancel");

if (buttons.length > 0) {
    buttons.forEach((button) => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            const deleteModal = new bootstrap.Modal(
                document.getElementById('delete-modal')
            );
            const title = button.getAttribute("data-title");
            
            document.getElementById("title").innerText = capitalizeFirstLetter(title);
             
            deleteModal.show();

            document.querySelector(".ms_btn").addEventListener("click", function() {
                button.parentElement.submit();
            })
        });
    });
}

document.addEventListener("DOMContentLoaded", function() {
    const confirmMessage = document.getElementById("ms_message")
    if (confirmMessage) {
        setTimeout(function() {
            confirmMessage.classList.add("d-none")
        }, 5000);
    }
})

// aggiungo funzionalità per visualizzare l'immagine inserita dall'input come preview
// prelevo l'input 
const inputImage = document.getElementById("image-input");
// prelevo l'image preview
const previewImage = document.getElementById("image-preview");
const previewContainer = document.getElementById("preview-container")
// se l'input è vuoto non visualizzo nulla
if (inputImage && previewImage) {
    // gestisco l'event listener al cambio dell'inputImage
    inputImage.addEventListener("change", function() {
        console.log('immagine inserita');
        // prelevo l'immagine selezionata
        const file = this.files[0];

        const reader = new FileReader();
        reader.addEventListener('load', function() {
            previewImage.src = reader.result;
            // tolgo il display none dalla previewImage
            previewImage.classList.remove("d-none");
            previewContainer.classList.remove("d-none");
        });
        reader.readAsDataURL(file);
    });
}
