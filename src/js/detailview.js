import axios from "axios"
import { mapGetters } from "vuex"
export default {
    name : 'DetailView',
    data() {
        return {
            id : this.$route.params.id,
            post : {},
            viewCount : 0
        }
    },
    computed: {
        ...mapGetters(['getToken', 'getId'])
    },
    methods: {
        getDetail () {
            let getId = {
                key : this.id
            }
            axios.post('http://localhost:8000/api/post/detail', getId)
            .then(response => {
                this.post = response.data.result
            })
            .catch ( error => console.log(error))
        },
        getViewCount()
        {
            let data = {
                post_id: this.id,
                user_id: this.getId
            }
            axios.post('http://localhost:8000/api/action-log', data)
            .then(response => {
                this.viewCount = response.data.result.length
            })
            .catch(error => console.log(error))
        },
        back() {
            history.back();
        }
    },
    mounted() {
        this.getViewCount()
        this.getDetail()
    },
}
