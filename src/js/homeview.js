import axios from "axios"
export default {
    name: 'HomeView',
    data () {
        return {
            posts : [],
            getPostTitle : ""
        }
    },
    methods: {
        getPosts() {
            axios.get('http://localhost:8000/api/posts').then((response) => {
                this.posts = response.data.posts;
            })
        },
        searchPost() {
            let postKey = {
                key : this.getPostTitle
            }
            axios.post('http://localhost:8000/api/post/search', postKey).then((response) => {
                console.log(response.data)
            })
        }
    },
    mounted() {
        this.getPosts();
    },
}

