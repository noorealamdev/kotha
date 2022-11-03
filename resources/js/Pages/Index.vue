<template>
    <div>
        <Layout>

            <Nav />
            <HeroSection :heroFeaturedPost="heroFeaturedPost" :heroPosts="heroPosts" />

            <!-- section main content -->
            <section class="main-content">
                <div class="container-xl">
                    <div class="row gy-4">
                        <div class="col-lg-8">
                            <EditorPicked :editorPicked="editorPicked" />
                            <HomeAd  />
                            <Trending :trending="trending" />
                            <CarouselHome :carousel="carousel" />
                            <LatestPosts :latestPosts="latestPosts" />
                        </div>
                        <div class="col-lg-4">
                            <Sidebar />
                        </div>

                    </div>
                </div>
            </section>

            <Footer />

        </Layout>
    </div>
</template>

<script>
    import Layout from "./Layout";
    import Nav from "./components/Nav";
    import HeroSection from "./components/HeroSection";
    import EditorPicked from "./components/EditorPicked";
    import Trending from "./components/Trending";
    import CarouselHome from "./components/CarouselHome";
    import LatestPosts from "./components/LatestPosts";
    import Footer from "./components/Footer";
    import Sidebar from "./components/Sidebar";
    import HomeAd from "./components/HomeAd";
    export default {
        components: {
            HomeAd, Sidebar, Footer, LatestPosts, CarouselHome, Trending, EditorPicked, HeroSection, Nav, Layout},
        props: {
            posts: Object,
            heroPosts: Object,
            heroFeaturedPost: Object,
            editorPicked: Object,
            trending: Object,
            carousel: Object,
            latestPosts: Object,
        }
    }
</script>
