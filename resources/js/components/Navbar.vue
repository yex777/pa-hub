<template>
    <div>
        <div class="menu-background">

        </div>
        <input class="menu-icon" type="checkbox" id="menu-icon" :value="menuCheckBox" name="menu-icon"/>
        <label for="menu-icon"></label>
        <nav class="nav">
            <ul class="pt-5">
                <li @click="menuCheckBox === 0"><router-link :to="{ name: 'home'}">Home</router-link></li>
                <li><router-link :to="{ name: 'user'}">User</router-link></li>
                <li><router-link :to="{ name: 'userSongs'}">My songs</router-link></li>
            </ul>

        </nav>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                menuCheckBox : 0,
            }
        },
        mounted() {
        }
    }
</script>
