<template>
    <div>
        <header class="header-default">
            <nav class="navbar navbar-expand-lg">
                <div class="container-xl">
                    <!-- site logo -->
                    <inertia-link class="navbar-brand" href="/"><img v-if="settings.logo" :src="`/uploads/${settings.logo}`" :alt="settings.site_title" /></inertia-link>

                    <div class="collapse navbar-collapse">
                        <!-- menus -->
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item" v-if="menu" v-for="menu in menu.items" :key="menu.id">
                                <inertia-link class="nav-link" :href="menu.link">{{ menu.label }}</inertia-link>
                            </li>
                        </ul>
                    </div>

                    <!-- header right section -->
                    <div class="header-right">
                        <!-- social icons -->
                        <ul class="social-icons list-unstyled list-inline mb-0">
                            <li class="list-inline-item" v-if="settings.facebook_url"><a :href="settings.facebook_url"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="list-inline-item" v-if="settings.twitter_url"><a :href="settings.twitter_url"><i class="fab fa-twitter"></i></a></li>
                            <li class="list-inline-item" v-if="settings.instagram_url"><a :href="settings.instagram_url"><i class="fab fa-instagram"></i></a></li>
                            <li class="list-inline-item" v-if="settings.pinterest_url"><a :href="settings.pinterest_url"><i class="fab fa-pinterest"></i></a></li>
                            <li class="list-inline-item" v-if="settings.youtube_url"><a :href="settings.youtube_url"><i class="fab fa-youtube"></i></a></li>
                        </ul>
                        <!-- header buttons -->
                        <div class="header-buttons">
                            <button class="search icon-button">
                                <i class="icon-magnifier"></i>
                            </button>
                            <button class="burger-menu icon-button">
                                <span class="burger-icon"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </nav>


        </header>

        <!-- search popup area -->
        <div class="search-popup">
            <!-- close button -->
            <button type="button" class="btn-close" aria-label="Close"></button>
            <!-- content -->
            <div class="search-content">
                <div class="text-center">
                    <h3 class="mb-4 mt-0">Press ESC to close</h3>
                </div>
                <!-- form -->
                <form class="d-flex search-form">
                    <input class="form-control me-2" type="search" placeholder="Search and press enter ..." aria-label="Search">
                    <button class="btn btn-default btn-lg" type="submit"><i class="icon-magnifier"></i></button>
                </form>
            </div>
        </div>

        <!-- canvas menu -->
        <div class="canvas-menu d-flex align-items-end flex-column">
            <!-- close button -->
            <button type="button" class="btn-close" aria-label="Close"></button>

            <!-- logo -->
            <div class="logo">
                <img v-if="settings.logo" :src="`/uploads/${settings.logo}`" :alt="settings.site_title" />
            </div>

            <!-- menu -->
            <nav>
                <ul class="vertical-menu">
                    <li v-if="menu" v-for="menu in menu.items" :key="menu.id"><inertia-link :href="menu.link">{{ menu.label }}</inertia-link></li>
                </ul>
            </nav>


            <!-- social icons -->
            <ul class="social-icons list-unstyled list-inline mb-0 mt-auto w-100">
                <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a></li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Nav",
        computed: {
            menu() {
                return this.$page.props.menu
            },
            settings() {
                return this.$page.props.settings
            }
        }
    }
</script>

<style scoped>

</style>
