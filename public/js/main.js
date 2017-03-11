$(function(){

    // fonction d'affichage/masquage du menu
    $("#menuIcon").on('click', function(){
        $('.sous-menu').css('z-index', 99999);
        $('.sous-menu').slideToggle();
    })

    // fonction d'affichage de la barre de progression du scroll
    function progressBar(){

      // détection scroll dans la page
            var yScroll = window.pageYOffset;
      // debug
            console.log(yScroll);

      // détection hauteur document
      var hauteurBody = document.body.clientHeight;
      // debug
      //console.log(hauteurBody);

      // détection hauteur intérieure browser
      var fenetre = window.innerHeight;
      // debug
      //console.log(fenetre);

      // calcul du pourcentage de scroll
      var scrollPercent = (yScroll / (hauteurBody-fenetre)) * 100;
      // debug
      //console.log(scrollPercent);

      document.getElementById("bar").style.width = scrollPercent + "%";
    }

    // fonction de soft-scroll
    $('.sous-menu .scrollTo').on('click', function() { // Au clic sur un élément
                $('.sous-menu').slideUp(300);
                            var page = $(this).attr('href'); // Page cible
                            var speed = 600; // Durée de l'animation (en ms)
                            $('html, body').animate( { scrollTop: $(page).offset().top }, speed ); // Go
                            return false;
    });

    // ajout listeners sur évènement scroll
    $(window).scroll(progressBar);

});
