(function () {
    setTimeout(function () {
        $("#cookieConsent").fadeIn(200);
    }, 4000);
    $("#closeCookieConsent, .cookieConsentOK").click(function () {
        $("#cookieConsent").fadeOut(200);
    });
})();

let cookie = getCookie('hidden');
if (!cookie) {
    setTimeout(function () {
        $('#myPopupModal').modal();
    }, 5000);
}
$("#time-closed-modal").click(function () {
    setCookie("hidden", "myPopupModal", 5)
});
