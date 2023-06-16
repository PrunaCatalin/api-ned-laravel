<template>
    <HeaderComponent ref="HeaderRef"></HeaderComponent>
    <div class="container-fluid">
        <SideBarComponent></SideBarComponent>
        <div class="main-container">
            <!-- Page header start -->
            <div class="page-header">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">{{ this.$route.name }}</li>
                </ol>
                <ul class="app-actions">
                    <li>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Print">
                            <i class="icon-print"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Download CSV">
                            <i class="icon-cloud_download"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="content-wrapper">
                <!-- Row starts -->
                <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <router-view></router-view>
                    </div>
                </div>
            </div>
        </div>
        <footer class="main-footer">&copy; {{new Date().getFullYear()}}</footer>
    </div>

</template>
<script>
import HeaderComponent from "../components/HeaderComponent";
import SideBarComponent from "../components/SideBarComponent";

export default {
    components: {
        HeaderComponent,
        SideBarComponent
    },
    methods : {

    }
};
</script>
<style scoped>
    @import "../../css/style.css";
</style>
