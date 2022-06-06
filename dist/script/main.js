const iconMenu = document.querySelector(".icon-menu");
const sidebar = document.querySelector(".sidebar");
const firstName = document.querySelector(".error.firstName");
const lastName = document.querySelector(".error.lastName");
const button = document.querySelector(".button");
const main = document.querySelector(".main");
const form = document.querySelector(".form");
var contenido;
iconMenu.addEventListener("click", function() {
    sidebar.classList.toggle("scroll-menu");

    const existScrollMenu = document.querySelector(".scroll-menu.scroll-menu-span");
    if (existScrollMenu) {
        sidebar.classList.remove("scroll-menu-span");
        main.classList.add("shadow");

        /*
      
      
          setTimeout(function() {
              existScrollMenu.addEventListener("mouseover", function(e) {
                  sidebar.style.transition = "0s";
                  sidebar.classList.remove("scroll-menu");

                  sidebar.classList.add("scroll-menu-span");
                  setTimeout(function() {
                      sidebar.style.transition = "1s ease-in-out";
                  }, 100);
              });
          }, 1000);*/
    } else {


        setTimeout(function() {
            /* 
                    existScrollMenu.removeEventListener("mouseover", function(e) {}); */
            sidebar.classList.add("scroll-menu-span");

            main.classList.remove("shadow");
        }, 1100);

    }

});





/* 
firstName.insertAdjacentHTML("afterend", '<span class"text-error lastName"> Text field is invalid </span> ');*/

if (firstName) {


    /*  const textFirstName = document.querySelector(".text-error.lastName");

      if (!textFirstName) {
          firstName.insertAdjacentHTML("afterend", '<div class"text-error lastName"> Text field is invalid </div> ');

      } */

    firstName.addEventListener("input", function(e) {
        contenido = e.target.value;
        if (contenido.length == 0) {



            firstName.classList.remove("notError");
        } else {


            firstName.classList.add("notError");


        }
    });
}




if (lastName) {



    lastName.addEventListener("input", function(e) {
        contenido = e.target.value;
        if (contenido.length == 0) {

            lastName.classList.remove("notError");
        } else {

            lastName.classList.add("notError");
        }
    });
}


if (button) {

    button.addEventListener("click", function() {
        button.style.pointerEvents = 'none';
    });
}