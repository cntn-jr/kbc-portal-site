<template>
    <div id="container-main">
        <div class="d-flex justify-content-between">
            <div class="list-group my-3" id="announcement-list">
                <div class="col-3 text-center text-muted list-group-item">
                    お知らせ
                </div>
                <div v-for="(announcement, index) in announcements" :key="index">
                    <announce-edit :announcement="announcement" :class_id="class_id" :csrf="csrf" v-if="is_teacher"></announce-edit>
                    <announcement-show :announcement="announcement" v-else></announcement-show>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import AnnounceEdit from './AnnouncementEdit.vue';
import AnnouncementShow from './AnnouncementShow.vue';

    export default {
        components: { AnnounceEdit, AnnouncementShow, },
        props: ['announcements', 'is_teacher', 'class_id', 'csrf']
    }
</script>

<style lang="scss">
    #container-main{
        width: 40%;
        #announcement-list{
            width: 95%
        }
    }
</style>
