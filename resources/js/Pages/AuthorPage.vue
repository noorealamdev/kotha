<template>
    <div>
        <Layout>
            <Nav :settings="settings" />

            <PageHeader title="Author Posts"/>

            <!-- section main content -->
            <section class="main-content">
                <div class="container-xl">
                    <div class="row gy-4">
                        <div class="col-lg-8">
                            <Author :authorPosts="authorPosts" />
                        </div>
                        <div class="col-lg-4">
                            <Sidebar
                                :popularPosts="popularPosts"
                                :categories="categories"
                                :carouselSidebar="carouselSidebar"
                                :settings="settings"
                            />
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
    import Author from "./components/Author";
    import PageHeader from "./components/PageHeader";
    import Sidebar from "./components/Sidebar";
    import Footer from "./components/Footer";
    export default {
        name: "AuthorPage",
        components: {Footer, Sidebar, PageHeader, Author, Nav, Layout},
        props: {
            authorPosts: Object,
        }

    }
</script>

<style scoped>

</style>
