<template>
    <div>
        <Layout>
            <Nav />
            <PageHeader :title="singlePage.title"/>
            <!-- section main content -->
            <section class="main-content mt-3">
                <div class="container-xl">
                    <div class="spacer" data-height="50"></div>
                    <div class="row gy-4">
                        <div class="col-lg-8">
                            <PageComponent :singlePage="singlePage "/>
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
    import Footer from "./components/Footer";
    import Sidebar from "./components/Sidebar";
    import PageComponent from "./components/PageComponent";
    import PageHeader from "./components/PageHeader";
    export default {
        name: "Page",
        components: {PageHeader, PageComponent, Sidebar, Footer, Nav, Layout},
        props: {
            singlePage: Object,
        }

    }
</script>

<style scoped>

</style>
