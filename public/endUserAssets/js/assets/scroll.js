window.addEventListener("load", function () {
    const btn = document.getElementById("scroll-to-top");
    const whatsapp_chat = document.getElementById("whatsapp_chat");
    this.window.addEventListener("scroll", function () {
        if (window.scrollY >= 200) {
            btn.style.bottom = "40px";
            whatsapp_chat.style.bottom = "40px";
        } else {
            btn.style.bottom = "-60px";
            whatsapp_chat.style.bottom = "-60px";
        }
    });
});
