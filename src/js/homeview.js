import axios from "axios"
export default {
    name: 'HomeView',
    data () {
        return {
            posts: []
        }
    },
    methods: {
        getPosts() {
            axios.get('http://localhost:8000/api/posts').then((response) => {
                this.posts = response.data.posts;
            })
        }
    },
    mounted() {
        this.getPosts();
    },
}

