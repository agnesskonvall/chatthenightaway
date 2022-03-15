require("./bootstrap");

Echo.channel(`chatroom`).listen("MessageSent", (e) => {
    console.log(e);
});
