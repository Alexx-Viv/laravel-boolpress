<template>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li
                class="page-item"
                v-if="currentPage > 1"
                @click="$emit('onPageChange', currentPage - 1)"
            >
                <a class="page-link">Precedente</a>
            </li>
            <li
                v-for="i in lastPage"
                :key="i"
                class="page-item"
                :class="{ active: currentPage === i }"
                @click="$emit('onPageChange', i)"
            >
                <a class="page-link">{{ i }}</a>
            </li>
            <li
                class="page-item"
                v-if="currentPage < lastPage"
                @click="$emit('onPageChange', currentPage + 1)"
            >
                <a class="page-link">Successiva</a>
            </li>
        </ul>
    </nav>
</template>

<script>
export default {
    name: "Pagination",
    props: ["currentPage", "lastPage"]
};
</script>

<style scoped>
.page-item {
    cursor: pointer;
}
</style>
