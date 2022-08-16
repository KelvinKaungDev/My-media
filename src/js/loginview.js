import axios from "axios"
import { mapGetters } from "vuex"

export default {
    name : 'LoginView',
    data () {
        return {
            userData : {
                email: "",
                password : ""
            },
            tokenStatus : false
        }
    },
    computed:{
        ...mapGetters(["getToken"])
    },
    methods: {
        login () {
            axios.post('http://localhost:8000/api/login', this.userData)
            .then(response => {
                let token = response.data.result.original.token;
                let id = response.data.result.original.id;

                if(token == null)
                {
                    this.$store.dispatch("setToken", null);
                    this.checkToken()
                } else {
                    this.$store.dispatch("setToken", token);
                    this.$store.dispatch("setId", id)
                    this.checkToken()
                    this.home()
                }
            })
            .catch(error => console.log(error.response.status))
        },
        checkToken() {
            if(this.getToken == null || this.getToken == undefined) {
                this.tokenStatus = false
            } else {
                this.tokenStatus = true
            }
        },
        logout() {
            this.$store.dispatch("setToken", null);
            this.$router.push({
                name : 'login'
            })
        },
        check() {
            console.log(this.getToken)
        },
        home() {
            this.$router.push({
                name : 'home'
            })
        }
    }
}
