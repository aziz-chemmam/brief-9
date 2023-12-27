function toggleOverlay() {
    var overlay = document.getElementById("overlay");
    overlay.classList.toggle("hidden");
}

function handleFormSubmit(event) {

}

document.getElementById("adduser").addEventListener("click", toggleOverlay);




document.getElementById("remove").addEventListener("click", function(event) {
    event.preventDefault();
    toggleOverlay();
});

document.getElementById("overlay").addEventListener("click", function(event) {
    if (event.target.id === "overlay") {
        toggleOverlay();
    }
});

document.getElementById("overlay-form").addEventListener("submit", handleFormSubmit);



