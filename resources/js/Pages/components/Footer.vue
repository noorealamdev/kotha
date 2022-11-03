<template>
    <footer>
        <div class="container-xl">
            <div class="footer-inner">
                <div class="row d-flex align-items-center gy-4">
                    <!-- copyright text -->
                    <div class="col-md-4">
                        <span class="copyright">© {{ settings.copyright }}</span>
                    </div>

                    <!-- social icons -->
                    <div class="col-md-4 text-center">
                        <ul class="social-icons list-unstyled list-inline mb-0">
                            <li class="list-inline-item" v-if="settings.facebook_url"><a :href="settings.facebook_url"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="list-inline-item" v-if="settings.twitter_url"><a :href="settings.twitter_url"><i class="fab fa-twitter"></i></a></li>
                            <li class="list-inline-item" v-if="settings.instagram_url"><a :href="settings.instagram_url"><i class="fab fa-instagram"></i></a></li>
                            <li class="list-inline-item" v-if="settings.pinterest_url"><a :href="settings.pinterest_url"><i class="fab fa-pinterest"></i></a></li>
                            <li class="list-inline-item" v-if="settings.youtube_url"><a :href="settings.youtube_url"><i class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>

                    <!-- go to top button -->
                    <div class="col-md-4">
                        <a href="#" id="return-to-top" class="float-md-end"><i class="icon-arrow-up"></i>Back to Top</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
    export default {
        name: "Footer",
        computed: {
            settings() {
                return this.$page.props.settings
            }
        }
    }
</script>

<style scoped>

</style>
