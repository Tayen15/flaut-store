document.addEventListener("DOMContentLoaded", function () {
     const navbar = document.getElementById("navbar");
     const mobNavdiv = document.getElementById("mobNavdiv");
     const ahref = document.getElementById("text-nav");
     const mobNav = document.getElementById("mob-nav");
     const logoImage = document.querySelector("#navbar img");
     const element = document.getElementById('flaut');

     if (!navbar || !mobNavdiv || !element) return;

     function setNavbarColor(scrollPosition) {
          const isScrolled = scrollPosition > 0;
          const isCatalogPage = window.location.pathname.includes("/catalog");
          const isAboutusgPage = window.location.pathname.includes("/about-us");

          if (isScrolled || isCatalogPage || isAboutusgPage) {
               navbar.classList.replace("bg-transparent", "bg-neutral-950");
               navbar.classList.add("shadow-lg");
               mobNavdiv.classList.replace("bg-transparent", "bg-neutral-950");
               mobNavdiv.classList.add("shadow-lg");
               [ahref, mobNav].forEach(element => element.classList.add("text-white"));
               logoImage.classList.add("mt-1");
          } else {
               navbar.classList.replace("bg-neutral-950", "bg-transparent");
               navbar.classList.remove("shadow-lg");
               mobNavdiv.classList.replace("bg-neutral-950", "bg-transparent");
               mobNavdiv.classList.remove("shadow-lg");
               mobNav.forEach(element => element.classList.remove("text-white"));
               logoImage.classList.remove("mt-1");
          }
     }

     function handleScroll() {
          setNavbarColor(window.scrollY);
          scrollToTopBtn.classList.toggle('hidden', window.scrollY === 0);
     }

     setNavbarColor(window.scrollY);
     window.addEventListener("scroll", handleScroll);

});
