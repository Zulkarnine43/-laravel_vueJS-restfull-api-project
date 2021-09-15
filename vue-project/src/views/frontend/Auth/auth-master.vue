<template>
    <div>
        <div class="container">
            <div class="col-md-8 m-auto">
                <router-view class="mt-5"></router-view>
            </div>
        </div>
    </div>
</template>
<script>

export default {

    mounted() {
        var access_token = localStorage.getItem('AToken');
        if(access_token){
            this.$router.push('/dashboard')
        }
    },
    
}
</script>