require("./bootstrap");

Vue.component(
    "chat-messages",
    require("./components/ChatMessages.vue").default
);
Vue.component("chat-form", require("./components/ChatForm.vue").default);

const app = new Vue({
    el: "#app",
    data: {
        messages: [],
    },
    created() {
        this.fetchMessages();
    },
    methods: {
        fetchMessages() {
            axios.get("/messages").then((response) => {
                this.messages = response.data;
            });
        },
        addMessage(message) {
            this.messages.push(message);
            axios.post("/messages", message).then((response) => {
                console.log(response.data);
            });
        },
    },
});
