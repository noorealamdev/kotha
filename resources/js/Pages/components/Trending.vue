<template>
    <div>
        <!-- section header -->
        <div class="section-header" v-if="trending.length">
            <h3 class="section-title">Trending</h3>
            <img src="/frontend/images/wave.svg" class="wave" alt="wave" />
        </div>

        <div class="padding-30 rounded bordered" v-if="trending.length">
            <div class="row gy-5">
                <div class="col-sm-6">
                    <!-- post large -->
                    <div class="post" v-if="trending[0]">
                        <div class="thumb rounded">
                            <inertia-link :href="route('archive', `${trending[0].category.category_slug}`)" class="category-badge position-absolute">{{ trending[0].category.name }}</inertia-link>
                            <inertia-link :href="route('post.single', `${trending[0].slug}`)">
                                <div class="inner">
                                    <img v-if="trending[0].featured_image" :src="`/uploads/${trending[0].featured_image}`" :alt="trending[0].title" />
                                    <img v-else  src="/img/no-image.jpg">
                                </div>
                            </inertia-link>
                        </div>
                        <ul class="meta list-inline mt-4 mb-0">
                            <li class="list-inline-item"><inertia-link :href="route('author', `${trending[0].user.name}`)">{{ trending[0].user.name }}</inertia-link></li>
                            <li class="list-inline-item">{{ trending[0].updated_at }}</li>
                        </ul>
                        <h5 class="post-title mb-3 mt-3"><inertia-link :href="route('post.single', `${trending[0].slug}`)">{{ trending[0].title }}</inertia-link></h5>
                        <p class="excerpt mb-0">{{ trending[0].excerpt }}</p>
                    </div>
                    <!-- post -->
                    <div class="post post-list-sm square before-seperator" v-if="trending[2]">
                        <div class="thumb rounded">
                            <inertia-link :href="route('post.single', `${trending[2].slug}`)">
                                <div class="inner">
                                    <img v-if="trending[2].featured_image" :src="`/uploads/${trending[2].featured_image}`" :alt="trending[2].title" />
                                    <img v-else  src="/img/no-image.jpg">
                                </div>
                            </inertia-link>
                        </div>
                        <div class="details clearfix">
                            <h6 class="post-title my-0"><inertia-link :href="route('post.single', `${trending[2].slug}`)">{{ trending[2].title }}</inertia-link></h6>
                            <ul class="meta list-inline mt-1 mb-0">
                                <li class="list-inline-item">{{ trending[2].updated_at }}</li>
                            </ul>
                        </div>
                    </div>
                    <!-- post -->
                    <div class="post post-list-sm square before-seperator" v-if="trending[3]">
                        <div class="thumb rounded">
                            <inertia-link :href="route('post.single', `${trending[3].slug}`)">
                                <div class="inner">
                                    <img v-if="trending[3].featured_image" :src="`/uploads/${trending[3].featured_image}`" :alt="trending[3].title" />
                                    <img v-else  src="/img/no-image.jpg">
                                </div>
                            </inertia-link>
                        </div>
                        <div class="details clearfix">
                            <h6 class="post-title my-0"><inertia-link :href="route('post.single', `${trending[3].slug}`)">{{ trending[3].title }}</inertia-link></h6>
                            <ul class="meta list-inline mt-1 mb-0">
                                <li class="list-inline-item">{{ trending[3].updated_at }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <!-- post large -->
                    <div class="post" v-if="trending[1]">
                        <div class="thumb rounded">
                            <inertia-link :href="route('archive', `${trending[1].category.category_slug}`)" class="category-badge position-absolute">{{ trending[0].category.name }}</inertia-link>
                            <inertia-link :href="route('post.single', `${trending[1].slug}`)">
                                <div class="inner">
                                    <img v-if="trending[1].featured_image" :src="`/uploads/${trending[1].featured_image}`" :alt="trending[1].title" />
                                    <img v-else  src="/img/no-image.jpg">
                                </div>
                            </inertia-link>
                        </div>
                        <ul class="meta list-inline mt-4 mb-0">
                            <li class="list-inline-item"><inertia-link :href="route('author', `${trending[1].user.name}`)">{{ trending[1].user.name }}</inertia-link></li>
                            <li class="list-inline-item">{{ trending[1].updated_at }}</li>
                        </ul>
                        <h5 class="post-title mb-3 mt-3"><inertia-link :href="route('post.single', `${trending[1].slug}`)">{{ trending[1].title }}</inertia-link></h5>
                        <p class="excerpt mb-0">{{ trending[1].excerpt }}</p>
                    </div>
                    <!-- post -->
                    <div class="post post-list-sm square before-seperator" v-if="trending[4]">
                        <div class="thumb rounded">
                            <inertia-link :href="route('post.single', `${trending[4].slug}`)">
                                <div class="inner">
                                    <img v-if="trending[4].featured_image" :src="`/uploads/${trending[4].featured_image}`" :alt="trending[4].title" />
                                    <img v-else  src="/img/no-image.jpg">
                                </div>
                            </inertia-link>
                        </div>
                        <div class="details clearfix">
                            <h6 class="post-title my-0"><inertia-link :href="route('post.single', `${trending[4].slug}`)">{{ trending[4].title }}</inertia-link></h6>
                            <ul class="meta list-inline mt-1 mb-0">
                                <li class="list-inline-item">{{ trending[4].updated_at }}</li>
                            </ul>
                        </div>
                    </div>
                    <!-- post -->
                    <div class="post post-list-sm square before-seperator" v-if="trending[5]">
                        <div class="thumb rounded">
                            <inertia-link :href="route('post.single', `${trending[5].slug}`)">
                                <div class="inner">
                                    <img v-if="trending[5].featured_image" :src="`/uploads/${trending[5].featured_image}`" :alt="trending[5].title" />
                                    <img v-else  src="/img/no-image.jpg">
                                </div>
                            </inertia-link>
                        </div>
                        <div class="details clearfix">
                            <h6 class="post-title my-0"><inertia-link :href="route('post.single', `${trending[5].slug}`)">{{ trending[5].title }}</inertia-link></h6>
                            <ul class="meta list-inline mt-1 mb-0">
                                <li class="list-inline-item">{{ trending[5].updated_at }}</li>
                            </ul>
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
        name: "Trending",
        props: {
            trending: Object
        },
    }
</script>

<style scoped>

</style>
