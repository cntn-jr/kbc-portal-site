<template>
    <div>
        <div class="card"  @click="showCurriculumCreate" id="curriculum-box">
            <div class="card-body">
                <h5 class="card-title mt-2 text-center" id="curriculum-name">
                    空きコマ
                </h5>
            </div>
        </div>
        <div id="curriculum-create-content-modal">
            <div id="curriculum-create-modal-bg" @click="exitCurriculumCreateModal" v-show="is_curriculum_create"></div>
            <transition name="curriculum-create-modal">
                <div id="curriculum-create-modal-box" class="card" v-show="is_curriculum_create">
                    <div class="card-header" id="curriculum-create-modal-header">
                        {{dayOfTheWeeks[day_of_the_week_num]}}曜日{{period}}限目
                    </div>
                    <div class="curriculum-create-modal-body card-body">
                        <form :action="curriculum_store_url" method="post" id="curriculum-create-form">
                            <input type="hidden" name="_token" :value="csrf">
                            <input type="hidden" name="dayOfTheWeek" :value="day_of_the_week_num">
                            <input type="hidden" name="period" :value="period">
                            <input type="hidden" name="redirectFrom" value="show_class">
                            <div class="form-row">
                                <lessons-selectbox :lessons="lessons" />
                            </div>
                            <div class="form-row">
                                <div class="form-btn">
                                    <button type="submit">
                                        追加する
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </transition>
        </div>
    </div>
</template>

<script>
import LessonsSelectbox from './LessonsSelectbox.vue';

export default {
    components: { LessonsSelectbox },
    data(){
        return {
            is_curriculum_create: false,
            dayOfTheWeeks: ['月', '火', '水', '木', '金'],
        }
    },
    methods: {
        exitCurriculumCreateModal(){
            this.is_curriculum_create = false;
        },
        showCurriculumCreate(){
            this.is_curriculum_create = true;
        },
    },
    props:['csrf', 'day_of_the_week_num', 'period', 'curriculum_store_url', 'lessons']
}
</script>

<style scoped lang="scss">
    #curriculum-box{
        width: 10rem;
        height: 10rem;
        #curriculum-name{
            height: 4rem;
        }
        #lesson-teacher{
            height: 3rem;
        }
        &:hover{
            opacity: .7;
        }
    }

    #curriculum-create-content-modal{
        font-size: .9rem;
        background: #6c5ce7;
        #curriculum-create-modal-bg{
            z-index: 3;
            height: 150%;
            width: 150%;
            top: 0;
            left: 0;
            background: #444;
            opacity: 0.4;
            position: fixed;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        #curriculum-create-modal-header{
            text-align: center;
            font-size: 1.1rem;
            background: rgba(9, 132, 227, .5);
            color: #fff;
            padding: .6rem;
        }
        #curriculum-create-modal-box{
            border-color: #74b9ff;
            border-radius: .5rem;
            position: fixed;
            z-index: 4;
            width: 20%;
            height: 25%;
            top: 20%;
            left: 40%;
            overflow: scroll;
            .curriculum-create-modal-body{
                padding: .5rem;
                #curriculum-create-form{
                    height: 100%;
                    display:flex;
                    flex-flow: column;
                    justify-content: center;
                    .form-row{
                        width: 90%;
                        margin: auto;
                        .form-content{
                            width: 80%;
                            margin: 1rem auto;
                            input{
                                width: 100%;
                                border: 1px solid #444;
                                outline: none;
                                border-radius: .2rem;
                                color: #444;
                                padding: .2rem;
                            }
                        }
                        .form-btn{
                            display: flex;
                            width: 80%;
                            button{
                                border-radius: .4rem;
                                background: #74b9ff;
                                padding: .2rem .5rem;
                                color: #fff;
                                border: none;
                                margin: 0 .5rem;
                                &:hover{
                                    opacity: .7;
                                    background: #0984e3;
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    .curriculum-create-modal-enter{
        opacity: 0;
        transform: translateY(-20px);
    }
    .curriculum-create-modal-leave{
        opacity: 0;
    }
    .curriculum-create-modal-enter-active{
        transition: opacity 300ms ease-in, transform 300ms ease-in;
    }
    .curriculum-create-modal-leave-active{
        transition: opacity 500ms ease-out, transform 500ms ease-out;
    }
    .curriculum-create-modal-leave-to{
        opacity: 0;
        transform: scale(1);
    }
</style>