require("./bootstrap");
window.Echo.channel(`chatroom`).listen("MessageSent", (e) => {
    console.log("message.content");
});
