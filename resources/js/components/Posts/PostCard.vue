<template>
    <div class="card my-3">
        <div class="card">
            <div class="card-header">
                {{ post.title }}
            </div>
            <div class="card-body">
                <p>
                    {{ post.content }}
                </p>
            </div>
            <footer class="card-footer d-flex justify-content-end">
                <small
                    >Creato il: {{ getFormattedDate(post.created_at) }}</small
                >
            </footer>
        </div>
    </div>
</template>

<script>
export default {
    name: "PostCard",
    props: ["post"],
    methods: {
        getFormattedDate(date) {
            const postDate = new Date(date);
            let day = postDate.getDate();
            let month = postDate.getMonth() + 1;
            const year = postDate.getFullYear();

            if (day < 10) day = "0" + day;
            if (month < 10) month = "0" + month;

            return `${day}/${month}/${year}`;
        }
    }
};
</script>
