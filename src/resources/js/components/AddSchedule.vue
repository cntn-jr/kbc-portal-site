<template>
    <div id="content-modal">
        <div id="modal-bg" @click="exitAddModal"></div>
        <transition name="add-modal" appear>
            <div id="modal-box">
                <div id="modal-header">
                    予定を追加する
                </div>
                <div class="container" id="modal-body">
                    <form :action="redirect_pass" method="POST">
                        <input type="hidden" name="_method" value="post">
                        <input type="hidden" name="_token" :value="csrf">
                        <div class="form-group mt-5 mb-3 col-8 mx-auto">
                            <input type="date" class="form-control" name="schedule_date" value="" autocomplete="schedule_date" required>
                        </div>
                        <div class="form-group my-3 col-8 mx-auto">
                            <textarea class="form-control" name='detail' placeholder="○○会社説明会" rows="3" required></textarea>
                        </div>
                        <div class="form-group my-3 col-8 mx-auto">
                            <button type="submit" id="add-btn">
                                追加する
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </transition>
    </div>
</template>

<script>
export default {
    methods: {
        exitAddModal(){
            // 親コンポーネントのis_add_modalにfalseを渡す
            this.$emit('exitAddModal', false);
        }
    },
    props:['csrf', 'redirect_pass'],
}
</script>

<style scoped lang="scss">
#content-modal{
    *{
        margin: 0;
        padding: 0;
    }
    #modal-bg{
        z-index: 5;
        height: 150%;
        width: 150%;
        top: 0;
        left: 0;
        background: rgba(223, 230, 233, .4);
        position: fixed;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    #modal-box{
        position: fixed;
        z-index: 6;
        width: 40%;
        height: 40%;
        top: 20%;
        left: 30%;
        border-radius: .5rem;
        overflow: scroll;
        background: #eee;
        border: 1px solid rgba(9, 132, 227, .2);
        #modal-header{
            font-size: 1.1rem;
            background: rgba(9, 132, 227, .5);
            color: #fff;
            padding: .6rem;
        }
        #modal-body{
            button{
                border-radius: .4rem;
                background: rgba(9, 132, 227, .5);
                padding: .2rem .5rem;
                color: #fff;
                border: none;
                margin: 0 auto;
                &:hover{
                    opacity: .7;
                }
            }
        }
    }
}
.add-modal-enter{
    opacity: 0;
    transform: translateY(-20px);
}
.add-modal-leave{
    opacity: 0;
}
.add-modal-enter-active{
    transition: opacity 300ms ease-in, transform 300ms ease-in;
}
.add-modal-leave-active{
    transition: opacity 500ms ease-out, transform 500ms ease-out;
}
.add-modal-leave-to{
    opacity: 0;
    transform: scale(1);
}
</style>