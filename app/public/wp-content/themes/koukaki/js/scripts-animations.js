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

/* Apparitions des titres h2*/

document.addEventListener("DOMContentLoaded", function () {
  const h2Elements = document.querySelectorAll("h2");

  const observerOptions = {
    root: null,
    threshold: 0.1, // 10% du h2 visible
    rootMargin: "0px 0px -10% 0px", // On ajoute une marge pour éviter une détection trop rapide
  };

  const observer = new IntersectionObserver((entries, observer) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        const h2 = entry.target;
        h2.classList.add("animated"); // Ajouter la classe "animated" au h2
        splitWordsAndAnimate(h2);
        observer.unobserve(h2); // On stoppe l'observation une fois l'animation déclenchée
      }
    });
  }, observerOptions);

  h2Elements.forEach((h2) => {
    observer.observe(h2);
  });
});

function splitWordsAndAnimate(h2) {
  const words = h2.innerText.split(" ");
  h2.innerHTML = ""; // On vide le h2

  words.forEach((word, index) => {
    const span = document.createElement("span");
    span.innerText = word;
    span.style.opacity = 0; // Initialement caché
    span.style.display = "inline-block";

    // Si c'est le premier mot, on ajoute un délai de 1s
    const delay = index === 0 ? 1 : 1 + index * 1; // 1s pour le premier mot, puis 1s pour les autres

    span.style.animation = `fadeInUp 0.5s ease forwards ${delay}s`; // Appliquer le délai
    h2.appendChild(span);
    h2.appendChild(document.createTextNode(" ")); // Espace entre les mots
  });
}
