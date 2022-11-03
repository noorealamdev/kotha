<template>

    <!-- sidebar -->
    <div class="sidebar">
        <!-- widget about -->
        <div class="widget rounded">
            <div class="widget-about data-bg-image text-center" style="background-image: url(/frontend/images/map-bg.png)">
                <img class="about-img mb-4" v-if="settings.logo" :src="`/uploads/${settings.logo}`">
                <p class="mb-4">{{ settings.site_description }}</p>
                <ul class="social-icons list-unstyled list-inline mb-0">
                    <li class="list-inline-item" v-if="settings.facebook_url"><a :href="settings.facebook_url"><i class="fab fa-facebook-f"></i></a></li>
                    <li class="list-inline-item" v-if="settings.twitter_url"><a :href="settings.twitter_url"><i class="fab fa-twitter"></i></a></li>
                    <li class="list-inline-item" v-if="settings.instagram_url"><a :href="settings.instagram_url"><i class="fab fa-instagram"></i></a></li>
                    <li class="list-inline-item" v-if="settings.pinterest_url"><a :href="settings.pinterest_url"><i class="fab fa-pinterest"></i></a></li>
                    <li class="list-inline-item" v-if="settings.youtube_url"><a :href="settings.youtube_url"><i class="fab fa-youtube"></i></a></li>
                </ul>
            </div>
        </div>

        <!-- widget popular posts -->
        <div class="widget rounded" v-if="popularPosts && popularPosts.length">
            <div class="widget-header text-center">
                <h3 class="widget-title">Popular Posts</h3>
                <img src="/frontend/images/wave.svg" class="wave" alt="wave" />
            </div>
            <div class="widget-content">
                <!-- post -->
                <div class="post post-list-sm circle" v-for="post in popularPosts" :key="post.id">
                    <div class="thumb circle">
                        <inertia-link :href="route('post.single', `${post.slug}`)">
                            <div class="inner">
                                <img class="inner data-bg-image thumb-image" v-if="post.featured_image" :src="`/uploads/${post.featured_image}`">
                                <img class="inner data-bg-image thumb-image" v-else src="/img/no-image.jpg">
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
            </div>
        </div>

        <!-- widget categories -->
        <div class="widget rounded" v-if="categories && categories.length">
            <div class="widget-header text-center">
                <h3 class="widget-title">Explore Topics</h3>
                <img src="/frontend/images/wave.svg" class="wave" alt="wave" />
            </div>
            <div class="widget-content">
                <ul class="list">
                    <div v-for="category in categories">
                        <li v-if="category.posts.length">
                            <inertia-link :href="route('archive', `${category.category_slug}`)">{{ category.name }}</inertia-link><span>({{ category.posts.length}})</span>
                        </li>
                    </div>

                </ul>
            </div>

        </div>

        <!-- widget newsletter -->
<!--        <div class="widget rounded">-->
<!--            <div class="widget-header text-center">-->
<!--                <h3 class="widget-title">Newsletter</h3>-->
<!--                <img src="/frontend/images/wave.svg" class="wave" alt="wave" />-->
<!--            </div>-->
<!--            <div class="widget-content">-->
<!--                <span class="newsletter-headline text-center mb-3">Join 70,000 subscribers!</span>-->
<!--                <form>-->
<!--                    <div class="mb-2">-->
<!--                        <input class="form-control w-100 text-center" placeholder="Email address…" type="email">-->
<!--                    </div>-->
<!--                    <button class="btn btn-default btn-full" type="submit">Sign Up</button>-->
<!--                </form>-->
<!--                <span class="newsletter-privacy text-center mt-3">By signing up, you agree to our <a href="#">Privacy Policy</a></span>-->
<!--            </div>-->
<!--        </div>-->

        <!-- widget post carousel -->
        <div class="widget rounded" v-if="carouselSidebar && carouselSidebar.length">
            <div class="widget-header text-center">
                <h3 class="widget-title">Celebration</h3>
                <img src="/frontend/images/wave.svg" class="wave" alt="wave" />
            </div>
            <div class="widget-content">
                <div class="post-carousel-widget">
                    <!-- post -->
                    <div class="post post-carousel" v-for="post in carouselSidebar" :key="post.id">
                        <div class="thumb rounded">
                            <inertia-link :href="route('archive', `${post.category.category_slug}`)" class="category-badge position-absolute">{{ post.category.name }}</inertia-link>
                            <inertia-link :href="route('post.single', `${post.slug}`)">
                                <div class="inner">
                                    <img v-if="post.featured_image" :src="`/uploads/${post.featured_image}`">
                                    <img v-else src="/img/no-image.jpg">
                                </div>
                            </inertia-link>
                        </div>
                        <h5 class="post-title mb-0 mt-4"><inertia-link :href="route('post.single', `${post.slug}`)">{{ post.title }}</inertia-link></h5>
                        <ul class="meta list-inline mt-2 mb-0">
                            <li class="list-inline-item"><inertia-link :href="route('author', `${post.user.name}`)">{{ post.user.name }}</inertia-link></li>
                            <li class="list-inline-item">{{ post.updated_at }}</li>
                        </ul>
                    </div>
                </div>
                <!-- carousel arrows -->
                <div class="slick-arrows-bot">
                    <button type="button" data-role="none" class="carousel-botNav-prev slick-custom-buttons" aria-label="Previous"><i class="icon-arrow-left"></i></button>
                    <button type="button" data-role="none" class="carousel-botNav-next slick-custom-buttons" aria-label="Next"><i class="icon-arrow-right"></i></button>
                </div>
            </div>
        </div>

        <!-- widget advertisement -->
        <div class="widget no-container rounded text-md-center" v-if="settings.sidebar_ad_image">
            <span class="ads-title">- Sponsored Ad -</span>
            <a :href="settings.sidebar_ad_url" class="widget-ads">
                <img :src="`/uploads/${settings.sidebar_ad_image}`">
            </a>
        </div>

    </div>
</template>

<script>
    export default {
        name: "Sidebar",
        computed: {
            settings() {
                return this.$page.props.settings
            },
            popularPosts() {
                return this.$page.props.popularPosts
            }
            ,
            categories() {
                return this.$page.props.categories
            }
            ,
            carouselSidebar() {
                return this.$page.props.carouselSidebar
            }
        }
    }
</script>

<style scoped>

</style>
