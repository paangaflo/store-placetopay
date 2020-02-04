<template>
    <div class="row">
        <div class="col-md-4 mb-3" v-for="product in products" :key="product.id">
            <Card :product="product" />
        </div>
    </div>
</template>

<script>
    import Card from './Card';
    export default {
        props: ['products'],
        components: {
            Card
        }
    }
</script>
