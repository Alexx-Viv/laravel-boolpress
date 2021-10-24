<template>
    <section id="post-list">
        <h2>I miei Post</h2>
        <Loader v-if="isLoading" />
        <div v-else>
            <Pagination
                :lastPage="pagination.lastPage"
                :currentPage="pagination.currentPage"
                @onPageChange="getPosts"
            />
            <PostCard v-for="post in posts" :key="post.id" :post="post" />
        </div>
    </section>
</template>

<script>
import PostCard from "./PostCard.vue";
import Loader from "../Loader.vue";
import Pagination from "../Pagination.vue";
export default {
    name: "PostList",
    components: {
        PostCard,
        Loader,
        Pagination
    },
    data() {
        return {
            baseUri: "http://127.0.0.1:8000",
            posts: [],
            isLoading: false,
            pagination: {}
        };
    },
    methods: {
        getPosts(page) {
            this.isLoading = true;
            axios
                .get(`${this.baseUri}/api/posts?page=${page}`)
                .then(res => {
                    console.log(res.data);
                    const { data, current_page, last_page } = res.data;
                    this.posts = data;
                    this.pagination = {
                        currentPage: current_page,
                        lastPage: last_page
                    };
                })
                .catch(err => {
                    console.error(err);
                })
                .then(() => {
                    this.isLoading = false;
                });
        }
    },
    created() {
        this.getPosts(1);
    }
};
</script>

<style scoped>
.page-item {
    cursor: pointer;
}
</style>
