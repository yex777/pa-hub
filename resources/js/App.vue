<template>
    <div class="app">
        <Navbar></Navbar>
        <router-view></router-view>
    </div>
</template>

<script>
    import Navbar from "./components/Navbar";
/*
    import './Styles/app.scss'
*/

    export default {
        name: 'app',
        data() {
            return {
                test : 'a',
            }
        },
        components: {
          Navbar,
        },
        mounted() {
            console.log("App component mounted");
        },
    }
</script>
