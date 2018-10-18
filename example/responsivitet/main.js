(function () {
    var pagestyle = document.getElementById("page-style");
    var buttons = document.getElementsByClassName("style-button");

    function swapSheet() {
        pagestyle.setAttribute("href", this.dataset.style);
    }

    for (var i = 0; i < buttons.length; i++) {
        buttons[i].addEventListener("click", swapSheet);
    }
})();
