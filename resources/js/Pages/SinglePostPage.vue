<template>
    <div>
        <Layout>
            <Nav />
            <!-- section main content -->
            <section class="main-content mt-3">
                <div class="container-xl">
                    <div class="spacer" data-height="50"></div>
                    <div class="row gy-4">
                        <div class="col-lg-8">
                            <SinglePost :singlePost="singlePost" :comments="comments"/>
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
    import SinglePost from "./components/SinglePost";
    import Footer from "./components/Footer";
    import Sidebar from "./components/Sidebar";
    export default {
        name: "SinglePostPage",
        components: {Sidebar, Footer, SinglePost, Nav, Layout},
        props: {
            singlePost: Object,
            comments: Object,
        }

    }
</script>

<style scoped>

</style>
