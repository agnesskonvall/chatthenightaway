require("./bootstrap");

Echo.channel(`chatroom`).listen("MessageSent", (e) => {
    console.log("message.content");
});

console.log("hej");
