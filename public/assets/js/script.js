$(document).ready(function () {
    var megaMenu = $(".mega-drop-down");

    $(".yorichi, .mega-drop-down").hover(
        function () {
            megaMenu.css("display", "block");
        },
        function () {
            megaMenu.css("display", "none");
        }
    );
});
