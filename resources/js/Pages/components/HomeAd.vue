<template>
    <div v-if="settings.homepage_ad_image">
        <!-- horizontal ads -->
        <div class="ads-horizontal text-md-center" v-if="settings.homepage_ad_image">
            <span class="ads-title">- Sponsored Ad -</span>
            <a :href="settings.homepage_ad_url" class="widget-ads">
                <img :src="`/uploads/${settings.homepage_ad_image}`">
            </a>
        </div>

        <div class="spacer" data-height="50"></div>
    </div>
</template>

<script>
    export default {
        name: "HomeAd",
        computed: {
            settings() {
                return this.$page.props.settings
            }
        }
    }
</script>

<style scoped>

</style>
