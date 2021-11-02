<template>
    <div class="app">
        <Navbar></Navbar>
        <router-view></router-view>
    </div>
</template>

<script>

    export default {
        name: 'app',
        data() {
            return {
                test : 'a',
            }
        },
        components: {
        },
        mounted() {
            console.log("App component mounted");
        },
    }
</script>
