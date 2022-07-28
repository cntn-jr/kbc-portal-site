<template>
    <div class="d-flex flex-row my-3 justify-content-center">
        <div class="justify-content-center" v-for="(curriculum_week, day_of_the_week_num) in curriculum" :key="day_of_the_week_num">
            <div class="card text-center" style="width: 10rem; height: 3rem;">
                <h4 class="my-auto">{{ dayOfTheWeeks[day_of_the_week_num] }}</h4>
            </div>
            <div v-for="(lesson, period) in curriculum_week" :key="period">
                <div v-if="is_class_teacher">
                    <curriculum-edit :csrf="csrf" :lessons="class_lessons" :lesson="lesson" :day_of_the_week="dayOfTheWeeks[day_of_the_week_num]" :period="parseInt(period, 10)" v-if="lesson" :curriculum_update_url="curriculum_update_url(class_id, lesson.curriculum_id)" :class_id="class_id" :curriculum_destroy_url="curriculum_destroy_url(class_id, lesson.curriculum_id)" />
                    <curriculum-create :csrf="csrf" :day_of_the_week_num="day_of_the_week_num" :period="parseInt(period, 10)" :curriculum_store_url="curriculum_store_url" :lessons="class_lessons" v-else />
                </div>
                <div v-else>
                    <curriculum-show :day_of_the_week="dayOfTheWeeks[day_of_the_week_num]" :period="parseInt(period, 10)" :lesson="lesson" v-if="lesson" />
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import CurriculumEdit from './CurriculumEdit.vue'
import CurriculumCreate from './CurriculumCreate.vue'
import CurriculumShow from './CurriculumShow.vue'

export default {
    components: { CurriculumEdit, CurriculumCreate, CurriculumShow },
    data(){
        return {
            dayOfTheWeeks: ['月', '火', '水', '木', '金'],
        }
    },
    computed: {
        curriculum_update_url (){
            return (class_id, curriculum_id) => {
              return '/kbc_teacher/class/' + class_id + '/curriculum/' + curriculum_id + '/update';
            }
        },
        curriculum_destroy_url (){
            return (class_id, curriculum_id) => {
              return '/kbc_teacher/class/' + class_id + '/curriculum/' + curriculum_id + '/destroy';
            }
        },
    },
    props:['csrf', 'curriculum', 'curriculum_store_url', 'class_lessons', 'class_id', 'is_class_teacher']
}
</script>

<style scoped lang="scss">
</style>