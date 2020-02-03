<template>
    <div class="card" style="width: 100%; height:100%;">
        <img class="card-img-top" :src="product.image" :alt="product.name">
        <div class="card-body">
            <h5 class="card-title text-info">{{ product.name }}</h5>
            <p><span class="font-weight-bold text-primary">Category:</span><span class="text-danger"> {{ product.categories_id }}</span></p>
            <p class="card-text">{{ product.description }}</p>
            <p><span class="font-weight-bold text-primary">Price:</span><span class="text-danger"> $ {{ product.price }}</span></p>
            <p><span class="font-weight-bold text-primary">Stock:</span><span class="text-danger"> {{ product.stock }}</span></p>

            <div class="row">
                <div class="col text-center" v-if="product.stock > 0">
                    <button class="btn btn-primary" @click="order(product.id)">Buy Now</button>
                </div>
                <div class="col text-center" v-else>
                    <button class="btn btn-secondary" disabled>Buy Now</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['product'],
        methods: {
            order(id) {
                window.location.href = "/checkout/" + id + '/create';
            }
        }
    }
</script>
