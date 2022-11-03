<template>
    <section id="hero">

        <div class="container-xl">

            <div class="row gy-4">

                <div class="col-lg-8">

                    <!-- featured post large -->
                    <div class="post featured-post-lg" v-if="heroFeaturedPost.length">
                        <div class="details clearfix">
                            <inertia-link :href="route('archive', `${heroFeaturedPost[0].category.category_slug}`)" class="category-badge">{{ heroFeaturedPost[0].category.name }}</inertia-link>
                            <h2 class="post-title"><inertia-link :href="route('post.single', `${heroFeaturedPost[0].slug}`)">{{ heroFeaturedPost[0].title}}</inertia-link></h2>
                            <ul class="meta list-inline mb-0">
                                <li class="list-inline-item"><inertia-link :href="route('author', `${heroFeaturedPost[0].user.name}`)">{{ heroFeaturedPost[0].user.name}}</inertia-link></li>
                                <li class="list-inline-item">{{ heroFeaturedPost[0].updated_at}}</li>
                            </ul>
                        </div>
                        <inertia-link :href="route('post.single', `${heroFeaturedPost[0].slug}`)">
                            <div class="thumb rounded">
                                <img v-if="heroFeaturedPost[0].featured_image" class="inner data-bg-image" :src="`/uploads/${heroFeaturedPost[0].featured_image}`">
                                <img v-else class="inner data-bg-image" src="/img/no-image.jpg">
                            </div>
                        </inertia-link>
                    </div>

                </div>

                <div class="col-lg-4">

                    <!-- post tabs -->
                    <div class="post-tabs rounded bordered">
<!--                        &lt;!&ndash; tab navs &ndash;&gt;-->
<!--                        <ul class="nav nav-tabs nav-pills nav-fill" id="postsTab" role="tablist">-->
<!--                            <li class="nav-item" role="presentation"><button aria-controls="popular" aria-selected="true" class="nav-link active" data-bs-target="#popular" data-bs-toggle="tab" id="popular-tab" role="tab" type="button">Popular</button></li>-->
<!--                            <li class="nav-item" role="presentation"><button aria-controls="recent" aria-selected="false" class="nav-link" data-bs-target="#recent" data-bs-toggle="tab" id="recent-tab" role="tab" type="button">Recent</button></li>-->
<!--                        </ul>-->
                        <!-- tab contents -->
                        <div class="tab-content" id="postsTabContent">
                            <!-- loader -->
                            <div class="lds-dual-ring"></div>
                            <!-- recent posts -->
                            <div aria-labelledby="popular-tab" class="tab-pane fade show active" id="popular" role="tabpanel">
                                <!-- post -->
                                <div class="post post-list-sm circle" v-for="post in heroPosts" :key="post.id">
                                    <div class="thumb circle">
                                        <inertia-link :href="route('post.single', `${post.slug}`)">
                                            <div class="inner">
                                                <img v-if="post.featured_image" class="inner data-bg-image thumb-image" :src="`/uploads/${post.featured_image}`">
                                                <img v-else class="inner data-bg-image thumb-image" src="/img/no-image.jpg">
                                            </div>
                                        </inertia-link>
                                    </div>
                                    <div class="details clearfix">
                                        <h6 class="post-title my-0"><inertia-link :href="route('post.single', `${post.slug}`)">{{ post.title }}</inertia-link></h6>
                                        <ul class="meta list-inline mt-1 mb-0">
                                            <li class="list-inline-item">{{ post.updated_at}}</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- post -->
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
</template>

<script>
    export default {
        name: "HeroSection",
        props: {
            heroPosts: Object,
            heroFeaturedPost: Object,
        }
    }
</script>

<style scoped>

</style>
