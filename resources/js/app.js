require("./bootstrap");

window.Echo.channel(`chatroom`).listen("MessageSent", (e) => {
    const messageDiv = document.querySelector(".card-body");
    const message = document.createElement("p");
    message.innerHTML =
        `<span style="color: ${e.user.color}"><b>${e.user.username}</b></span>` +
        ": " +
        e.message.content;
    message.setAttribute("id", e.message.id);
    document.querySelector(".card-body").appendChild(message);
    console.log(e.message.id);
});

window.Echo.channel(`chatroom`).listen("MessageDeleted", (e) => {
    const deletedmessage = document.getElementById(e.id);
    console.log(deletedmessage);
    deletedmessage.remove();
    console.log(e);
});

window.Echo.channel(`chatroom`).listen("NudgeSent", (e) => {
    const chatbox = document.querySelector(".container");
    chatbox.classList.toggle("nudge");
    console.log(e);
});
