<template lang="html">
    <div class="is-pulled-right">
        <i class="green" v-if="checkUser()">Online</i>
        <i class="red" v-else>Offline</i>
    </div>
</template>

<script>
    export default {
        props: ['friend', 'onlineusers'],
        methods:{
          checkUser: function(){
            return _.find(this.onlineusers,{id: this.friend.id});
          }
        }


    }
</script>

<style lang="css">
    .red {
        color: red;
    }
    .green {
        color: green;
    }
</style>
