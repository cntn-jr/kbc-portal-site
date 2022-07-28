<template>
    <div>
        <div class="card"  @click="showCurriculumShow" id="curriculum-box">
            <div class="card-body" v-if="lesson">
                <h5 class="card-title mt-2 text-center" id="lesson-name">
                    {{ lesson.lesson_name }}
                </h5>
                <div class="card-text text-center" id="lesson-teacher">{{ lesson.teacher_name }}</div>
            </div>
        </div>
        <div id="curriculum-show-content-modal">
            <div id="curriculum-show-modal-bg" @click="exitCurriculumShowModal" v-show="is_curriculum_show"></div>
            <transition name="curriculum-show-modal">
                <div id="curriculum-show-modal-box" class="card" v-show="is_curriculum_show">
                    <div class="card-header" id="curriculum-show-modal-header">
                        {{day_of_the_week}}曜日{{period}}限目
                    </div>
                    <div class="curriculum-show-modal-body card-body">
                        <div id="curriculum-show-form">
                            <h5 class="show-row">{{ lesson.lesson_name }}</h5>
                            <div class="show-row">
                                {{ lesson.teacher_name }}
                            </div>
                            <div class="show-row">
                                連絡先：{{ lesson.email }}<v-icon @click="copyToClipboard(lesson.email)" class="mdi-content-copy">mdi-content-copy</v-icon>
                            </div>
                            <div class="show-row">
                                {{ lesson.outline }}
                            </div>
                        </div>
                    </div>
                </div>
            </transition>
        </div>
    </div>
</template>

<script>

export default {
    data(){
        return {
            is_curriculum_show: false,
        }
    },
    methods: {
        exitCurriculumShowModal(){
            this.is_curriculum_show = false;
        },
        showCurriculumShow(){
            this.is_curriculum_show = true;
        },
        copyToClipboard(text) {
            navigator.clipboard.writeText(text)
        }
    },
    props:['lesson', 'day_of_the_week', 'period',]
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

    #curriculum-show-content-modal{
        font-size: .9rem;
        background: #6c5ce7;
        #curriculum-show-modal-bg{
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
        #curriculum-show-modal-header{
            text-align: center;
            font-size: 1.1rem;
            background: rgba(9, 132, 227, .5);
            color: #fff;
            padding: .6rem;
        }
        #curriculum-show-modal-box{
            border-color: #74b9ff;
            border-radius: .5rem;
            position: fixed;
            z-index: 4;
            width: 30%;
            height: 35%;
            top: 20%;
            left: 35%;
            overflow: scroll;
            .curriculum-show-modal-body{
                padding: .5rem;
                #curriculum-show-form{
                    height: 100%;
                    display:flex;
                    flex-flow: column;
                    justify-content: center;
                    text-align: center;
                    .show-row{
                        width: 90%;
                        margin: .5rem auto;
                        .mdi-content-copy{
                            margin-left: .4rem;
                        }
                    }
                }
            }
        }
    }

    .curriculum-show-modal-enter{
        opacity: 0;
        transform: translateY(-20px);
    }
    .curriculum-show-modal-leave{
        opacity: 0;
    }
    .curriculum-show-modal-enter-active{
        transition: opacity 300ms ease-in, transform 300ms ease-in;
    }
    .curriculum-show-modal-leave-active{
        transition: opacity 500ms ease-out, transform 500ms ease-out;
    }
    .curriculum-show-modal-leave-to{
        opacity: 0;
        transform: scale(1);
    }
</style>