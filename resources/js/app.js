require("./bootstrap");

$id = GET("id");
window.Echo.channel(`chatroom`).listen("MessageSent", (e) => {
    const messageDiv = document.querySelector(".card-body");
    const message = document.createElement("p");
    message.innerText = e.user.username + ": " + e.message.content;
    document.querySelector(".card-body").appendChild(message);
});

window.Echo.channel(`chatroom`).listen("MessageDeleted", (e) => {
    const message = document.getElementById(`${id}`);
    message.remove();
});
