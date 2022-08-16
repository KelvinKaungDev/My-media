import axios from "axios"
import { mapGetters } from "vuex";

export default {
    name: 'HomeView',
    data () {
        return {
            posts : [],
            getPostTitle : "",
            categories : [],
            tokenStatus: false,
        }
    },
    computed: {
        ...mapGetters(["getToken"])
    },
    methods: {
        getPosts()
        {
            axios.get('http://localhost:8000/api/posts').then((response) => {
                this.posts = response.data.posts;
            })
        },
        searchPost()
        {
            let searchKey = {
                key : this.getPostTitle
            }
            axios.post('http://localhost:8000/api/posts/search', searchKey)
            .then( response => {
                this.posts = response.data.result
            })
            .catch( error => console.log(error))
        },
        searchPostByCategory(id)
        {
            let categoryId = {
                key : id
            }
            axios.post('http://localhost:8000/api/posts/searchByCategory', categoryId)
            .then (response => {
                this.posts = response.data.result;
            })
            .catch(error => console.log(error))
        },
        getCategory()
        {
            axios.get('http://localhost:8000/api/category')
            .then(response => {
                this.categories = response.data.result;
            })
            .catch( error => console.log(error))
        },
        viewDetail(id)
        {
            this.$router.push({
                name : 'detail',
                params : {
                    id : id
                }
            })
        },
        login()
        {
            this.$router.push({
                name : 'login'
            })
        },
        logout()
        {
            this.$store.dispatch("setToken", null);
            this.$router.push({
                name : 'login'
            })
        },
        home()
        {
            this.$router.push({
                name: 'home'
            })
        },
        checkToken() {
            if(this.getToken == null || this.getToken == undefined) {
                this.tokenStatus = false
            } else {
                this.tokenStatus = true
            }
        },
    },
    mounted() {
        this.checkToken();
        this.getPosts();
        this.getCategory();
    },
}

