<template>
    <div id="main-content">
        <div class="list-group-item" @click="showModal">
            <h6 class="p-2 pb-0">{{ announcement.title }}</h6>
            <div class="text-truncate py-3 px-5">{{ announcement.content }}</div>
        </div>
        <div id="modal-bg" v-show="isShowModal" @click="exitModal"></div>
        <transition name="announcement-modal">
            <div class="card" v-show="isShowModal" id="modal-box">
                <form method="POST" :action="getRoute">
                    <div class="card-body">
                        <div class="form-group mt-4 mb-3 col-10 mx-auto">
                            <input type="text" class="form-control" name="title" :value="announcement.title"  required>
                        </div>
                        <div class="form-group my-3 col-10 mx-auto">
                            <textarea class="form-control" name='content' rows="5" :value="announcement.content" required></textarea>
                        </div>
                        <div class="form-group mt-3 mb-4 col-10 mx-auto d-flex justify-content-end">
                            <button type="submit" id="add-btn">
                                更新する
                            </button>
                        </div>
                    </div>
                    <input type="hidden" name="_method" value="put">
                    <input type="hidden" name="_token" :value="csrf">
                </form>
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
        getRoute(){
            return '/kbc_teacher/class/' + this.class_id + '/announcement/' + this.announcement.id + '/update';
        }
    },
    props: ["announcement", "csrf", "class_id",],
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
            background: #ddd;
            opacity: 0.4;
            position: fixed;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        #modal-box{
            padding: 2rem 0;
            position: fixed;
            z-index: 2;
            width: 40%;
            max-height: 50%;
            top: 20%;
            left: 30%;
            border-radius: .5rem;
            overflow: scroll;
            background: #fff;
            input, textarea{
                padding: .5rem
            }
            button{
                border-radius: .4rem;
                background: rgba(9, 132, 227, .5);
                padding: .2rem .5rem;
                color: #fff;
                border: none;
                &:hover{
                    opacity: .7;
                }
            }
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
        transition: opacity 500ms ease-out, transform 500ms ease-out;
    }
    .announcement-modal-leave-to{
        opacity: 0;
        transform: scale(1);
    }
</style>