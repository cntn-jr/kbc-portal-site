<template>
    <div id="main-content">
        <div class="list-group-item" @click="showModal">
            <h5 class="p-2 pb-0">{{ announcement.title }}</h5>
            <div class="text-truncate py-3 px-5">{{ announcement.content }}</div>
        </div>
        <div id="modal-bg" v-show="isShowModal" @click="exitModal"></div>
        <transition name="announcement-modal">
            <div class="card" v-show="isShowModal" id="modal-box">
                    <div class="card-body">
                        <div class="mt-4 mb-3 col-10 mx-auto">
                            <h5 class="text-center">{{ announcement.title }}</h5>
                        </div>
                        <div class="my-3 col-10 mx-auto">
                            <div class="">{{ announcement.content }}</div>
                        </div>
                    </div>
            </div>
        </transition>
    </div>
</template>

<script>

export default {
    data(){
        return{
            isShowModal: false,
        }
    },
    methods:{
        showModal(){
            this.isShowModal = true;
        },
        exitModal(){
            this.isShowModal = false;
        }
    },
    computed:{
    },
    props: ["announcement",],
}
</script>

<style scoped lang='scss'>
    *{
        margin: 0;
        padding: 0;
        color: #000;;
    }
    #main-content{
        #modal-bg{
            z-index: 1;
            height: 150%;
            width: 150%;
            top: 0;
            left: 0;
            background: #666;
            opacity: 0.4;
            position: fixed;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        #modal-box{
            position: fixed;
            z-index: 2;
            width: 40%;
            max-height: 50%;
            top: 20%;
            left: 30%;
            border-radius: .5rem;
            overflow: scroll;
            background: #fff;
            border-color: rgba(0, 184, 148, .5);
        }
    }

    .announcement-modal-enter{
        opacity: 0;
        transform: translateY(-20px);
    }
    .announcement-modal-leave{
        opacity: 0;
    }
    .announcement-modal-enter-active{
        transition: opacity 300ms ease-in, transform 300ms ease-in;
    }
    .announcement-modal-leave-active{
        transition: opacity 1000ms ease-out, transform 1000ms ease-out;
    }
    .announcement-modal-leave-to{
        opacity: 0;
        transform: scale(1);
    }
</style>