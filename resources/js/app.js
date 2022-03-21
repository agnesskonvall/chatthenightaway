require("./bootstrap");

window.Echo.channel(`chatroom`).listen("MessageSent", (e) => {
    const messageDiv = document.querySelector(".card-body");
    const message = document.createElement("p");
    message.innerText = e.user.username + ": " + e.message.content;
    document.querySelector(".card-body").appendChild(message);
    console.log(e.message.id);
});

window.Echo.channel(`chatroom`).listen("MessageDeleted", (e) => {
    // const deletedmessage = document.getElementById(e.sentmessage.id);
    // deletedmessage.remove();
    console.log(e);
});
