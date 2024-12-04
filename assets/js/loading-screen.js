document.addEventListener("DOMContentLoaded", function () {
    window.addEventListener("load", function () {
        const loadingScreen = document.getElementById("loading-screen");
        if (loadingScreen) {
            loadingScreen.classList.add("hidden");
            setTimeout(() => {
                loadingScreen.style.display = "none";
            }, 500); // Tiempo de la animación de desvanecimiento
        }
    });
});
