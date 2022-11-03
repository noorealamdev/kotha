<template>
    <div>
        <!-- section header -->
        <div class="section-header" v-if="editorPicked.length">
            <h3 class="section-title">Editor’s Pick</h3>
            <img src="/frontend/images/wave.svg" class="wave" alt="wave" />
        </div>

        <div class="padding-30 rounded bordered" v-if="editorPicked.length">
            <div class="row gy-5">
                <div class="col-sm-6">
                    <!-- post -->
                    <div class="post">
                        <div class="thumb rounded">
                            <inertia-link :href="route('post.single', `${editorPicked[0].slug}`)">
                                <div class="inner">
                                    <img v-if="editorPicked[0].featured_image" :src="`/uploads/${editorPicked[0].featured_image}`" :alt="editorPicked[0].title" />
                                    <img v-else class="inner data-bg-image thumb-image" src="/img/no-image.jpg">
                                </div>
                            </inertia-link>
                        </div>
                        <ul class="meta list-inline mt-4 mb-0">
                            <li class="list-inline-item"><inertia-link :href="route('author', `${editorPicked[0].user.name}`)">{{ editorPicked[0].user.name }}</inertia-link></li>
                            <li class="list-inline-item">{{ editorPicked[0].updated_at }}</li>
                        </ul>
                        <h5 class="post-title mb-3 mt-3"><inertia-link :href="route('post.single', `${editorPicked[0].slug}`)">{{ editorPicked[0].title }}</inertia-link></h5>
                        <p class="excerpt mb-0">{{ editorPicked[0].excerpt }}</p>
                    </div>
                </div>

                <div class="col-sm-6">
                    <!-- post -->
                    <div class="post post-list-sm square" v-for="post in editorPicked.slice(1)">
                        <div class="thumb rounded">
                            <inertia-link :href="route('post.single', `${post.slug}`)">
                                <div class="inner">
                                    <img v-if="post.featured_image" :src="`/uploads/${post.featured_image}`">
                                    <img v-else src="/img/no-image.jpg">
                                </div>
                            </inertia-link>
                        </div>
                        <div class="details clearfix">
                            <h6 class="post-title my-0"><inertia-link :href="route('post.single', `${post.slug}`)">{{ post.title }}</inertia-link></h6>
                            <ul class="meta list-inline mt-1 mb-0">
                                <li class="list-inline-item">{{ post.updated_at }}</li>
                            </ul>
                        </div>
                    </div>
                    <!-- post -->

                </div>
            </div>
        </div>

        <div class="spacer" data-height="50"></div>

    </div>
</template>

<script>
    export default {
        name: "EditorPicked",
        props: {
            editorPicked: Object,
        }
    }
</script>

<style scoped>

</style>
