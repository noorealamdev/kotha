<template>
    <div>
        <Layout>
            <Nav />

            <PageHeader :title="archivePosts.data[0].category.name" />

            <!-- section main content -->
            <section class="main-content">
                <div class="container-xl">
                    <div class="row gy-4">
                        <div class="col-lg-8">
                            <Archive :archivePosts="archivePosts"/>
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
    import Archive from "./components/Archive";
    import PageHeader from "./components/PageHeader";
    import Footer from "./components/Footer";
    import Sidebar from "./components/Sidebar";
    export default {
        name: "ArchivePage",
        components: {Sidebar, Footer, PageHeader, Archive, Nav, Layout},
        props: {
            archivePosts: Object,
        }

    }
</script>

<style scoped>

</style>
