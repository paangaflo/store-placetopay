<template>
    <div>
        <Cards :products="products" />
        <div class="vld-parent">
            <loading :active.sync="isloading"
                     :can-cancel="canCancel"
                     :color="color"
                     :is-full-page="fullPage"></loading>
        </div>
    </div>
</template>

<script>
    import Loading from 'vue-loading-overlay';
    import 'vue-loading-overlay/dist/vue-loading.css';
    import Cards from './Cards';

    export default {
        components: {
            Cards,
            Loading
        },
        data() {
            return {
                products: [],
                isloading: true,
                fullPage: true,
                canCancel: false,
                color: "blue"
            }
        },
        created() {
            axios
                .get('/products')
                .then(response => (this.products = response.data.data))
                .catch(error => {this.isloading = true})
                .finally(() => this.isloading = false);
        }
    }
</script>
