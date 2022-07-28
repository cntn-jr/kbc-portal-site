<template>
    <div>
        <div class="card"  @click="showCurriculumEdit" id="curriculum-box">
            <div class="card-body" v-if="lesson">
                <h5 class="card-title mt-2 text-center" id="lesson-name">
                    {{ lesson.lesson_name }}
                </h5>
                <div class="card-text text-center" id="lesson-teacher">{{ lesson.teacher_name }}</div>
            </div>
        </div>
        <div id="curriculum-edit-content-modal">
            <div id="curriculum-edit-modal-bg" @click="exitCurriculumEditModal" v-show="is_curriculum_edit"></div>
            <transition name="curriculum-edit-modal">
                <div id="curriculum-edit-modal-box" class="card" v-show="is_curriculum_edit">
                    <div class="card-header" id="curriculum-edit-modal-header">
                        {{day_of_the_week}}曜日{{period}}限目
                    </div>
                    <div class="curriculum-edit-modal-body card-body">
                        <div id="curriculum-edit-form">
                            <form :action="curriculum_update_url" method="post">
                                <input type="hidden" name="_method" value="put">
                                <input type="hidden" name="_token" :value="csrf">
                                <input type="hidden" name="redirectFrom" value="show_class">
                                <div class="form-row">
                                    <lessons-selectbox :lessons="lessons" :selected_lesson="lesson" />
                                </div>
                                <div class="form-row">
                                    <div class="form-btn">
                                        <button type="submit">
                                            変更する
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <form :action="curriculum_destroy_url" method="post">
                                <input type="hidden" name="_method" value="delete">
                                <input type="hidden" name="_token" :value="csrf">
                                <input type="hidden" name="redirectFrom" value="show_class">
                                <div class="form-row">
                                    <div class="form-btn">
                                        <button type="submit" class="delete-btn">
                                            空き授業にする
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </transition>
        </div>
    </div>
</template>

<script>
import LessonsSelectbox from '../LessonsSelectbox.vue';

export default {
    components: { LessonsSelectbox },
    data(){
        return {
            is_curriculum_edit: false,
        }
    },
    methods: {
        exitCurriculumEditModal(){
            this.is_curriculum_edit = false;
        },
        showCurriculumEdit(){
            this.is_curriculum_edit = true;
        },
    },
    props:['csrf', 'lesson', 'lessons', 'day_of_the_week', 'period', 'curriculum_update_url', 'curriculum_destroy_url']
}
</script>

<style scoped lang="scss">
    #curriculum-box{
        width: 10rem;
        height: 10rem;
        #lesson-name{
            height: 4rem;
        }
        #lesson-teacher{
            height: 3rem;
        }
        &:hover{
            opacity: .7;
        }
    }

    #curriculum-edit-content-modal{
        font-size: .9rem;
        background: #6c5ce7;
        #curriculum-edit-modal-bg{
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
        #curriculum-edit-modal-header{
            text-align: center;
            font-size: 1.1rem;
            background: rgba(9, 132, 227, .5);
            color: #fff;
            padding: .6rem;
        }
        #curriculum-edit-modal-box{
            border-color: #74b9ff;
            border-radius: .5rem;
            position: fixed;
            z-index: 4;
            width: 20%;
            height: 30%;
            top: 20%;
            left: 40%;
            overflow: scroll;
            .curriculum-edit-modal-body{
                padding: .5rem;
                #curriculum-edit-form{
                    height: 100%;
                    display:flex;
                    flex-flow: column;
                    justify-content: center;
                    .form-row{
                        width: 90%;
                        margin: .5rem auto;
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
                            .delete-btn{
                                background: #95a5a6;
                                &:hover{
                                    opacity: .7;
                                    background: #7f8c8d;
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    .curriculum-edit-modal-enter{
        opacity: 0;
        transform: translateY(-20px);
    }
    .curriculum-edit-modal-leave{
        opacity: 0;
    }
    .curriculum-edit-modal-enter-active{
        transition: opacity 300ms ease-in, transform 300ms ease-in;
    }
    .curriculum-edit-modal-leave-active{
        transition: opacity 500ms ease-out, transform 500ms ease-out;
    }
    .curriculum-edit-modal-leave-to{
        opacity: 0;
        transform: scale(1);
    }
</style>