<template>
    <div>

        <div class="row gy-4">

            <div class="col-sm-6" v-for="post in archivePosts.data" :key="post.id">
                <!-- post -->
                <div class="post post-grid rounded bordered">
                    <div class="thumb top-rounded">
                        <div class="category-badge position-absolute">{{ post.category.name }}</div>
                        <inertia-link :href="route('post.single', `${post.slug}`)">
                            <div class="inner">
                                <img v-if="post.featured_image" :src="`/uploads/${post.featured_image}`">
                                <img v-else src="/img/no-image.jpg">
                            </div>
                        </inertia-link>
                    </div>
                    <div class="details">
                        <ul class="meta list-inline mb-0">
                            <li class="list-inline-item"><inertia-link :href="route('author', `${post.user.name}`)">{{ post.user.name }}</inertia-link></li>
                            <li class="list-inline-item">{{ post.updated_at }}</li>
                        </ul>
                        <h5 class="post-title mb-3 mt-3"><inertia-link :href="route('post.single', `${post.slug}`)">{{ post.title }}</inertia-link></h5>
                        <p class="excerpt mb-0">{{ post.excerpt}}</p>
                    </div>
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

        <!-- load more button -->
        <div class="text-center" style="margin-top: 60px" v-if="archivePosts && archivePosts.next_page_url">
            <inertia-link :href="nextPageLink" class="btn btn-simple" @click="loadMorePosts">Next Page</inertia-link>
        </div>

    </div>
</template>

<script>
    export default {
        name: "Archive",
        data() {
            return {
                nextPageLink: String,
            };
        },
        props: {
            archivePosts: Object
        },
        mounted() {
            this.nextPageLink = this.archivePosts.next_page_url
        },

        methods: {
            loadMorePosts() {
                this.nextPageLink = this.archivePosts.next_page_url;
            }
        }
    }
</script>

<style scoped>

</style>
