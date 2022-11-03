<template>
    <div v-if="latestPosts.data.length">
        <!-- section header -->
        <div class="section-header">
            <h3 class="section-title">Latest Posts</h3>
            <img src="/frontend/images/wave.svg" class="wave" alt="wave" />
        </div>


        <div class="padding-30 rounded bordered">

            <div class="row">

                <div class="col-md-12 col-sm-6" v-for="post in latestPosts.data">
                    <!-- post -->
                    <div class="post post-list clearfix">
                        <div class="thumb rounded">
                            <inertia-link :href="route('post.single', `${post.slug}`)">
                                <div class="inner">
                                    <img v-if="post.featured_image" :src="`/uploads/${post.featured_image}`">
                                    <img class="carousel-img" v-else src="/img/no-image.jpg">
                                </div>
                            </inertia-link>
                        </div>
                        <div class="details">
                            <ul class="meta list-inline mb-3">
                                <li class="list-inline-item"><inertia-link :href="route('author', `${post.user.name}`)">{{ post.user.name }}</inertia-link></li>
                                <li class="list-inline-item"><inertia-link :href="route('archive', `${post.category.category_slug}`)">{{ post.category.name }}</inertia-link></li>
                                <li class="list-inline-item">{{ post.updated_at }}</li>
                            </ul>
                            <h5 class="post-title"><inertia-link :href="route('post.single', `${post.slug}`)">{{ post.title }}</inertia-link></h5>
                            <p class="excerpt mb-0">{{ post.excerpt }}</p>
                            <div class="post-bottom clearfix d-flex align-items-center">
                                <div class="social-share me-auto">
                                    <button class="toggle-button icon-share"></button>
                                    <ul class="icons list-unstyled list-inline mb-0">
                                        <li class="list-inline-item"><a :href="`https://www.facebook.com/sharer.php?u=${route('home')}/${post.slug}`"><i class="fab fa-facebook-f"></i></a></li>
                                        <li class="list-inline-item"><a :href="`https://twitter.com/share?url=${route('home')}/${post.slug}&text=${post.title}`"><i class="fab fa-twitter"></i></a></li>
                                        <li class="list-inline-item"><a :href="`https://www.linkedin.com/shareArticle?url=${route('home')}/${post.slug}&title=${post.title}`"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li class="list-inline-item"><a :href="`https://pinterest.com/pin/create/bookmarklet/?media=${route('home')}/uploads/${post.featured_image}&url=${route('home')}/${post.slug}&description=${post.title}`"><i class="fab fa-pinterest"></i></a></li>
                                        <li class="list-inline-item"><a :href="`https://www.facebook.com/sharer.php?u=${route('home')}/${post.slug}`"><i class="fab fa-telegram-plane"></i></a></li>
                                    </ul>
                                </div>
                                <div class="more-button float-end">
                                    <inertia-link :href="route('post.single', `${post.slug}`)"><span class="icon-options"></span></inertia-link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="spacer" data-height="50"></div>

    </div>
</template>

<script>
    export default {
        name: "LatestPosts",
        props: {
            latestPosts: Object
        }
    }
</script>

<style scoped>

</style>
