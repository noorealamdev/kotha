<template>
    <div>
        <!-- post single -->
        <div class="post post-single">
            <!-- post header -->
            <div class="post-header">
                <h1 class="title mt-0 mb-3">{{ singlePost.title }}</h1>
                <ul class="meta list-inline mb-0">
                    <li class="list-inline-item"><inertia-link :href="route('author', `${singlePost.user.name}`)">{{ singlePost.user.name }}</inertia-link></li>
                    <li class="list-inline-item"><inertia-link :href="route('archive', `${singlePost.category.category_slug}`)">{{ singlePost.category.name }}</inertia-link></li>
                    <li class="list-inline-item">{{ singlePost.updated_at }}</li>
                </ul>
            </div>
            <!-- featured image -->
            <div class="featured-image">
                <img :src="`/uploads/${singlePost.featured_image}`" :alt="singlePost.title" />
            </div>


            <!-- post content -->
            <div class="post-content clearfix" v-html="singlePost.content"></div>



            <!-- post bottom section -->
            <div class="post-bottom">
                <div class="row d-flex align-items-center">
                    <div class="col-md-6 col-12 text-center text-md-start">
                        <!-- tags -->
<!--                        <a href="#" class="tag">#Trending</a>-->
<!--                        <a href="#" class="tag">#Video</a>-->
<!--                        <a href="#" class="tag">#Featured</a>-->
                    </div>
                    <div class="col-md-6 col-12">
                        <!-- social icons -->
                        <ul class="social-icons list-unstyled list-inline mb-0 float-md-end">
                            <li class="list-inline-item"><a :href="`https://www.facebook.com/sharer.php?u=${route('home')}/${singlePost.slug}`"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="list-inline-item"><a :href="`https://twitter.com/share?url=${route('home')}/${singlePost.slug}&text=${singlePost.title}`"><i class="fab fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a :href="`https://www.linkedin.com/shareArticle?url=${route('home')}/${singlePost.slug}&title=${singlePost.title}`"><i class="fab fa-linkedin-in"></i></a></li>
                            <li class="list-inline-item"><a :href="`https://pinterest.com/pin/create/bookmarklet/?media=${route('home')}/uploads/${singlePost.featured_image}&url=${route('home')}/${singlePost.slug}&description=${singlePost.title}`"><i class="fab fa-pinterest"></i></a></li>
                            <li class="list-inline-item"><a :href="`https://www.facebook.com/sharer.php?u=${route('home')}/${singlePost.slug}`"><i class="fab fa-telegram-plane"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

        <div class="spacer" data-height="50"></div>

        <div class="about-author padding-30 rounded">
            <div class="thumb" v-if="singlePost.user.profile_photo_path">
                <img style="width: 100px; height: 100px" v-if="singlePost.user.profile_photo_path" :src="`/uploads/${singlePost.user.profile_photo_path}`">
                <img style="width: 100px; height: 100px" v-else src="/img/no-image.jpg">
            </div>
            <div class="details">
                <h4 class="name"><inertia-link :href="route('author', `${singlePost.user.name}`)">{{ singlePost.user.name }}</inertia-link></h4>
                <p>{{ singlePost.user.about }}</p>
                <!-- social icons -->
                <ul class="social-icons list-unstyled list-inline mb-0">
                    <li class="list-inline-item" v-if="singlePost.user.facebook_url"><a :href="singlePost.user.facebook_url"><i class="fab fa-facebook-f"></i></a></li>
                    <li class="list-inline-item" v-if="singlePost.user.twitter_url"><a :href="singlePost.user.twitter_url"><i class="fab fa-twitter"></i></a></li>
                    <li class="list-inline-item" v-if="singlePost.user.instagram_url"><a :href="singlePost.user.instagram_url"><i class="fab fa-instagram"></i></a></li>
                    <li class="list-inline-item" v-if="singlePost.user.pinterest_url"><a :href="singlePost.user.pinterest_url"><i class="fab fa-pinterest"></i></a></li>
                    <li class="list-inline-item" v-if="singlePost.user.youtube_url"><a :href="singlePost.user.youtube_url"><i class="fab fa-youtube"></i></a></li>
                </ul>
            </div>
        </div>

        <div class="spacer" data-height="50"></div>

        <!-- section header -->
        <div class="section-header" v-if="comments.length">
            <h3 class="section-title">Comments ({{ comments.length }})</h3>
            <img src="/frontend/images/wave.svg" class="wave" alt="wave" />
        </div>
        <!-- post comments -->
        <div class="comments bordered padding-30 rounded">

            <ul class="comments">
                <!-- comment item -->
                <li :class="`comment ${comment.child_id ? 'child' : '' } rounded`" v-for="comment in comments" :key="comment.id">
                    <div class="thumb">
                        <img :src="`https://www.gravatar.com/avatar/${comment.guest_email}.jpg?s=64`" alt="John Doe" />
                    </div>
                    <div class="details">
                        <h4 class="name">{{ comment.guest_name }}</h4>
                        <span class="date">{{ moment(comment.updated_at).format("DD-MM-YYYY")}}</span>
                        <p>{{ comment.comment }}</p>
                    </div>
                </li>
            </ul>
        </div>

        <div class="spacer" data-height="50"></div>

        <!-- section header -->
        <div class="section-header">
            <h3 class="section-title">Leave Comment</h3>
            <img src="/frontend/images/wave.svg" class="wave" alt="wave" />
        </div>

        <!-- comment form -->
        <div class="comment-form rounded bordered padding-30">

            <form @submit.prevent="postComment" id="comment-form" class="comment-form" method="post">

                <div class="messages"></div>

                <div class="row">

                    <div class="column col-md-12">
                        <!-- Comment textarea -->
                        <div class="form-group">
                            <textarea v-model="message" name="message" id="InputComment" class="form-control" rows="4" placeholder="Your comment here..." required="required"></textarea>
                        </div>
                    </div>

                    <div class="column col-md-6">
                        <!-- Name input -->
                        <div class="form-group">
                            <input v-model="name" type="text" class="form-control" id="InputName" name="name" placeholder="Your name" required="required">
                        </div>
                    </div>

                    <div class="column col-md-6">
                        <!-- Email input -->
                        <div class="form-group">
                            <input v-model="email" type="email" class="form-control" id="InputEmail" name="email" placeholder="Email address" required="required">
                        </div>
                    </div>

                </div>

                <button type="submit" name="submit" id="submit" value="Submit" class="btn btn-default">Submit</button><!-- Submit Button -->

            </form>

            <div v-if="notify" class="alert alert-success mt-5">{{ notify }}</div>
        </div>
    </div>
</template>

<script>
    import Sidebar from "./Sidebar";
    import moment from "moment";

    export default {
        name: "SinglePost",
        components: {Sidebar},
        data() {
            return {
                name: '',
                email: '',
                message: '',
                notify: '',
                moment: moment
            }
        },
        props: {
            singlePost: Object,
            comments: Object,
        },

        methods: {
            postComment() {
                this.$inertia.post('/comments', {
                    commentable_type: 'App\\Models\\Post',
                    commentable_id: this.singlePost.id.toString(),
                    guest_name: this.name,
                    guest_email: this.email,
                    message: this.message,
                });
                this.notify = 'Thanks for the comment';
                this.name = '';
                this.email = '';
                this.message = '';
            }
        },

    }
</script>

<style scoped>

</style>
