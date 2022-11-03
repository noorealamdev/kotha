<template>
    <div>
        <!-- section header -->
        <div class="section-header" v-if="carousel.length">
            <h3 class="section-title">{{ carousel[0].category.name }}</h3>
            <img src="/frontend/images/wave.svg" class="wave" alt="wave" />
            <div class="slick-arrows-top">
                <button type="button" data-role="none" class="carousel-topNav-prev slick-custom-buttons" aria-label="Previous"><i class="icon-arrow-left"></i></button>
                <button type="button" data-role="none" class="carousel-topNav-next slick-custom-buttons" aria-label="Next"><i class="icon-arrow-right"></i></button>
            </div>
        </div>


        <div class="row post-carousel-twoCol post-carousel" v-if="carousel.length">
            <!-- post -->
            <div class="post post-over-content col-md-6" v-for="post in carousel">
                <div class="details clearfix">
                    <inertia-link :href="route('archive', `${post.category.category_slug}`)" class="category-badge">{{ post.category.name }}</inertia-link>
                    <h4 class="post-title"><inertia-link :href="route('post.single', `${post.slug}`)">{{ post.title }}</inertia-link></h4>
                    <ul class="meta list-inline mb-0">
                        <li class="list-inline-item"><inertia-link :href="route('author', `${post.user.name}`)">{{ post.user.name }}</inertia-link></li>
                        <li class="list-inline-item">{{ post.updated_at }}</li>
                    </ul>
                </div>
                <inertia-link :href="route('post.single', `${post.slug}`)">
                    <div class="thumb rounded">
                        <div class="inner">
                            <img style="min-height: 238px" v-if="post.featured_image" :src="`/uploads/${post.featured_image}`">
                            <img style="min-height: 238px" class="carousel-img" v-else src="/img/no-image.jpg">
                        </div>
                    </div>
                </inertia-link>
            </div>
        </div>

        <div class="spacer" data-height="50"></div>

    </div>
</template>

<script>
    export default {
        name: "CarouselHome",
        props: {
            carousel: Object
        }
    }
</script>

<style scoped>

</style>
