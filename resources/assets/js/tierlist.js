var heroes = document.querySelectorAll('.heroSelector');
for (var i = 0; i < heroes.length; i++) {
    heroes[i].addEventListener('click', function(e) {
        // First reset the visibility of all the popups.
        for (var j = 0; j < heroes.length; j++) {
            var menu = heroes[j].querySelector('.tierMenu');
            menu.style.visibility = "hidden";
        }

        var menu = this.querySelector('.tierMenu');
        menu.style.visibility = "visible";
    })
}
