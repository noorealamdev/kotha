<template>
    <div class="page-content bordered rounded padding-30" v-html="singlePage.content">

    </div>
</template>

<script>
    export default {
        name: "PageComponent",
        props: {
            singlePage: Object
        }
    }
</script>

<style scoped>

</style>
