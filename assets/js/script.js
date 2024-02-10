window.addEventListener('DOMContentLoaded', function () {

    const nav = document.querySelector('#header_menu');
    const supps = document.querySelectorAll('.select_button_container>p');
    const suppsContent = document.querySelectorAll('.select_button_container form div');
    const currentPage = window.location.pathname;
    console.log(currentPage);

    window.addEventListener('scroll', () => {
        const { scrollTop } = document.documentElement;

        if (scrollTop === 0) {
            nav.classList.remove('active');
        } else {
            nav.classList.add('active');
        }
    });

    // if (currentPage.includes("auxfoueela")) {
    //     document.querySelector(".accueil_li").style.backgroundColor = 'orange';
    //     document.querySelector(".accueil_li").style.borderRadius = '2px';
    //     document.querySelector(".accueil_li").style.hover = 'none';
    // } if (currentPage.includes("/auxfoueela/lesautrespages/menu.php")) {
    //     document.querySelector(".menu_li").style.backgroundColor = 'orange';
    //     document.querySelector(".menu_li").style.borderRadius = '2px';
    //     document.querySelector(".menu_li").style.hover = 'none';
    // }
    // document.querySelectorAll('.fouee_card').forEach((foueeCard) => {
    //     const suppsText = foueeCard.querySelector('.select_button_container > p');
    //     const suppsContent = foueeCard.querySelector('.select_button_container form div');

    //     if (suppsText && suppsContent) {
    //         suppsText.addEventListener('click', () => {
    //             suppsContent.classList.toggle('open');
    //         });
    //     }
    // });
    document.querySelector('.panier_button').addEventListener("click", function () {
        document.querySelector('.panier').classList.toggle('active');
    });
    document.querySelector('.croix').addEventListener("click", function () {
        document.querySelector('.panier').classList.toggle('active');
    });
    let fouee_edit_compteur = 0;
    let otherButtonsVisible = true;

    document.querySelectorAll('.edit_fouee_card_button').forEach(function (button) {
        button.addEventListener("click", function () {

            document.querySelectorAll('.edit_fouee_card_button').forEach(function (otherButton) {
                if (otherButton !== button) {
                    otherButton.style.display = otherButtonsVisible ? 'none' : 'block';
                }
            });

            if (fouee_edit_compteur === 0) {
                this.closest('.fouee_card').querySelector('.fouee_title').contentEditable = 'true';
                this.closest('.fouee_card').querySelector('.fouee_description').contentEditable = 'true';
                this.closest('.fouee_card').querySelector('.fouee_prix').contentEditable = 'true';
                this.closest('.fouee_card').querySelector('.fouee_title').classList.add('editing');
                this.closest('.fouee_card').querySelector('.fouee_description').classList.add('editing');
                this.closest('.fouee_card').querySelector('.fouee_prix').classList.add('editing');
                fouee_edit_compteur++;
                this.src = "./assets/img/icons/check.svg";
            } else {
                this.closest('.fouee_card').querySelector('.fouee_title').contentEditable = 'false';
                this.closest('.fouee_card').querySelector('.fouee_description').contentEditable = 'false';
                this.closest('.fouee_card').querySelector('.fouee_prix').contentEditable = 'false';
                this.closest('.fouee_card').querySelector('.fouee_title').classList.remove('editing');
                this.closest('.fouee_card').querySelector('.fouee_description').classList.remove('editing');
                this.closest('.fouee_card').querySelector('.fouee_prix').classList.remove('editing');
                fouee_edit_compteur = 0;
                this.src = "./assets/img/icons/edit.svg";
                // const new_fouee_title =this.closest('.fouee_card').querySelector('.fouee_title').textContent;
                // console.log(new_fouee_title);
            }


            otherButtonsVisible = !otherButtonsVisible;
        });
    });


    // $(document).ready(function () {
    //     $(".edit_fouee_card_button").click(function () {
    //         var new_fouee_title = $(this.closest('.fouee_card').querySelector('.fouee_title')).text();
    //         var new_fouee_description = $(this.closest('.fouee_card').querySelector('.fouee_description')).text();
    //         var new_fouee_prix = $(this.closest('.fouee_card').querySelector('.fouee_prix')).text();

    //         $.ajax({
    //             type: "POST",
    //             url: "edit_fouee.php",
    //             data: {
    //                 fouee_title: new_fouee_title,
    //                 fouee_description: new_fouee_description,
    //                 fouee_prix: new_fouee_prix
    //             },
    //             success: function (response) {
    //                 console.log(response);
    //             }
    //         });
    //     });
    // });
    document.querySelectorAll('.fouee_card').forEach((foueeCard) => {
        const suppsText = foueeCard.querySelector('.select_button_container > p');
        const suppsContent = foueeCard.querySelector('.select_button_container form div');

        if (suppsText && suppsContent) {
            suppsText.addEventListener('click', () => {
                suppsContent.classList.toggle('open');
            });
        }
    });
    const toggleLanguageButton = document.getElementById("toggleLanguageButton");

    if (toggleLanguageButton) {
        toggleLanguageButton.addEventListener("click", function () {
            // Parcourez tous les éléments de la page avec la classe "lang-fr" ou "lang-en"
            const elementsWithLangFr = document.querySelectorAll(".lang-fr");
            const elementsWithLangEn = document.querySelectorAll(".lang-en");

            elementsWithLangFr.forEach(function (element) {
                element.style.display = (element.style.display === "none") ? "block" : "none";
            });

            elementsWithLangEn.forEach(function (element) {
                element.style.display = (element.style.display === "none") ? "block" : "none";
            });
        });
    }
});