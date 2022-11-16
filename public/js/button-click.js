const App = {
    data() {
        return {
            isClicked: 0,
        }
    },
    methods: {
        clickButton() {
            this.isClicked++
        },
    }
}

Vue.createApp(App).mount("#main-registration")