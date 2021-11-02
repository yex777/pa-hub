<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1></h1>
                <div class="card">
                    <div class="card-header">User Component</div>

                    <div class="card-body">
                        I'm an user component.
                    </div>

                    <router-view></router-view>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'user',
        data :function () {
            return {
                test : 'test',
            }
        },
        mounted() {
            console.log('user component mounted.')
        }
    }
</script>
