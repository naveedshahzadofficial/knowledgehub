<template>
    <div class="wrapping-searching">
        <div class="row mt-3">
            <div class="error-template">
                <h1>
                    Oops!</h1>
                <h2>
                    404 Not Found</h2>
                <div class="error-details">
                    Sorry, an error has occured, Requested page not found!
                </div>
                <div class="error-actions">
                    <router-link :to="{ name: 'home'}" class="btn btn-primary btn-lg">
                    <span class="glyphicon glyphicon-home"></span>
                        Take Me Home </router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "PageNotFound"
}
</script>

<style scoped>
.error-template {padding: 40px 15px;text-align: center;}
.error-actions {margin-top:15px;margin-bottom:15px;}
.error-actions .btn { margin-right:10px; }
</style>
