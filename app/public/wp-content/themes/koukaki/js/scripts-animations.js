function nuages_mouvements() {
  const containerPlace = document.querySelector(".story #place");

  // Création et ajout des nuages
  const grosNuage = document.createElement("img");
  grosNuage.className = "gros_nuage";
  containerPlace.appendChild(grosNuage);

  const petitNuage = document.createElement("img");
  petitNuage.className = "petit_nuage";
  containerPlace.appendChild(petitNuage);

  // Intersection Observer pour l'animation
  const observerOptions = {
    root: null,
    threshold: Array.from({ length: 81 }, (_, i) => i / 100),
  };

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.intersectionRatio > 0.2) {
        window.addEventListener("scroll", handleScroll);
      } else {
        window.removeEventListener("scroll", handleScroll);
        resetNuagesPosition();
      }
    });
  }, observerOptions);

  observer.observe(containerPlace);

  function handleScroll() {
    const windowHeight = window.innerHeight;
    const sectionTop =
      containerPlace.getBoundingClientRect().top + window.scrollY;
    const sectionHeight = containerPlace.offsetHeight;

    const scrollTop = window.scrollY;
    const sectionVisibleHeight = Math.min(
      Math.max(scrollTop + windowHeight - sectionTop, 0),
      sectionHeight
    );

    const visibilityProgress = sectionVisibleHeight / sectionHeight;

    const maxTranslation = 700;
    const grosNuageTranslation = -maxTranslation * visibilityProgress;
    const petitNuageTranslation = -maxTranslation * 0.5 * visibilityProgress;

    grosNuage.style.transform = `translateX(${grosNuageTranslation}px)`;
    petitNuage.style.transform = `translateX(${petitNuageTranslation}px)`;
  }

  function resetNuagesPosition() {
    grosNuage.style.transform = "translateX(0)";
    petitNuage.style.transform = "translateX(0)";
  }
}

nuages_mouvements();

/*******Animation du buger menu*******/

const burgerMenuButton = document.querySelector(".burgerMenu");
const burgerMenuButtonIcon = document.querySelector(".burgerMenu i");
const burgerMenu = document.querySelector(".burger-menu");
const menuLinks = document.querySelectorAll(".burger-menu a"); // Sélectionner les liens du menu

burgerMenuButton.onclick = function () {
  burgerMenu.classList.toggle("open");
  const isOpen = burgerMenu.classList.contains("open");

  // Changer l'icône du bouton
  burgerMenuButtonIcon.classList = isOpen
    ? "fa-solid fa-xmark"
    : "fa-solid fa-bars";

  // Désactiver ou réactiver le scroll en fonction de l'état du menu
  document.body.style.overflow = isOpen ? "hidden" : "auto";
};

// Fermer le menu lorsqu'on clique sur un lien et réactiver le scroll
menuLinks.forEach((link) => {
  link.onclick = function () {
    burgerMenu.classList.remove("open");
    burgerMenuButtonIcon.classList = "fa-solid fa-bars"; // Remettre l'icône du burger
    document.body.style.overflow = "auto"; // Réactiver le scroll
  };
});