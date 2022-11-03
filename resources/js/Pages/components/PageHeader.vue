<template>
    <section class="page-header">
        <div class="container-xl">
            <div class="text-center">
                <h1 class="mt-0 mb-2">{{ title }}</h1>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        name: "PageHeader",
        props: ['title']
    }
</script>

<style scoped>

</style>
