<template>
    <div>
        <button v-if="!friend" class="btn btn-primary" @click="addFriend()" :disabled="saving">
            Follow
        </button>
        
        <button v-else class="btn btn-default" @click="removeFriend()" :disabled="saving">
            Unfollow
        </button>
    </div>
</template>

<script>
    export default {
        name : "FriendToggle",
        props : ['userId', 'isFriend'],
        mounted() {
            if(this.isFriend != undefined){
                this.friend = this.isFriend;
            }
        },
        data(){
            return {
                saving : false,
                friend : false,
            };
        },
        methods : {
            addFriend(){
                this.saving = true;
                axios.post('/api/user/${this.userId}/add_friend')
                    .then(response => {
                        this.friend = true;
                        this.saving = false;
                    })
                    .catch(error => {
                        this.saving = false;
                    })
            },
            removeFriend(){
                this.saving = true;
                axios.post('/api/user/${this.userId}/remove_friend')
                    .then(response => {
                        this.friend = false;
                        this.saving = false;
                    })
                    .catch(error => {
                        this.saving = false;
                    })
            }
        }
    }
</script>
