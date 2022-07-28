<template>
    <div>
        <select name="lesson_id" id="" class="form-control form-control-sm" v-model="selected_lesson.lesson_id" v-if="selected_lesson">
            <option v-for="lesson in lessons" :key="lesson.lesson_id" :value="lesson.lesson_id">
                {{ lesson.lesson_name }}
            </option>
        </select>
        <select name="lesson_id" id="" class="form-control form-control-sm" v-else>
            <option v-for="lesson in lessons" :key="lesson.lesson_id" :value="lesson.lesson_id">
                {{ lesson.lesson_name }}
            </option>
        </select>
    </div>
</template>

<script>
export default {
    props:['lessons', 'selected_lesson',]
}
</script>

<style scoped lang="scss">
</style>