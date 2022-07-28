<template>
    <div id="main-content">
        <div v-if="getSchedule.count > 0" id="multiple-schedule">
            <div class="show-btn text-truncate" @click="showModal">
                <span v-if="getSchedule.count > 1">{{getSchedule.count}}件の予定</span>
                <span v-else>{{getSchedule.schedules[0].detail}}</span>
            </div>
            <div id="modal-bg" v-show="isShowModal" @click="exitModal"></div>
            <transition name="schedule-modal">
                <div class="card" v-show="isShowModal" id="modal-box">
                    <div class="card-header modal-header">
                        {{this.date.month}}月{{this.date.day}}日
                    </div>
                    <div class="card-body">
                        <div class="schedule-date-modal">
                            <div v-for="(schedule, index) in getSchedule.schedules" :key="index" class="one-schedule d-flex flex-row">
                                    <edit-schedule :csrf="csrf" v-if="is_teacher" :schedule="schedule" :class_id="class_id" />
                                <div class="content mx-auto">
                                    {{schedule.detail}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </transition>
        </div>
    </div>
</template>

<script>
import EditSchedule from './EditSchedule.vue';

const moment = require('moment')

export default {
  components: { EditSchedule },
    data(){
        return{
            isShowModal: false,
            changeInput: false,
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
        getSchedule(){
            const schedule_info = {
                count: 0,
                schedules: [],
                is_input: false,
            };
            const strDate = String(this.date.year) + '-' + String(this.date.month) + '-' + String(this.date.day);
            let calendarDate = moment(strDate, "YYYY-MM-DD");
            for(let key in this.schedules){
                let scheduleDate = moment(this.schedules[key].scheduledDate);
                if(
                    calendarDate.year() === scheduleDate.year() &&
                    calendarDate.month() === scheduleDate.month() &&
                    calendarDate.date() === scheduleDate.date()
                ){
                    schedule_info.count++;
                    schedule_info.schedules.push(this.schedules[key]);
                }
            }
            return schedule_info;
        }
    },
    props: ["schedules", "date", "is_teacher", "csrf", 'class_id'],
}
</script>

<style scoped lang='scss'>
    *{
        margin: 0;
        padding: 0;
        color: #000;;
    }
    #main-content{
        #multiple-schedule{
            .show-btn{
                width: 80%;
                max-height: 2.5rem;
                max-width: 3.0rem;
                font-size: 0.5rem;
                background: rgba($color: #dfe6e9, $alpha: .4);
                color: #333;
                border-radius: .5rem;
                padding: .2rem;
                margin: .2rem auto 0;
                cursor: pointer;
                text-align: center;
                overflow: scroll;
                &:hover{
                    opacity: .7;
                }
                .fa-angle-up{
                    padding: 0 .3rem;
                }
            }
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
                position: fixed;
                z-index: 2;
                padding: .5rem;
                width: 30%;
                max-height: 50%;
                top: 20%;
                left: 35%;
                border-radius: .5rem;
                overflow: scroll;
                background: #fff;
                .modal-header{
                    font-size: 1.1rem;
                }
                .schedule-date-modal{
                    font-size: 1.0rem;
                    color: #333;
                    margin: 1rem;
                    padding: 1rem;
                    .one-schedule{
                        text-align: center;
                        margin: .2rem auto;
                    }
                }
            }
        }
    }

    .schedule-modal-enter{
        opacity: 0;
        transform: translateY(-20px);
    }
    .schedule-modal-leave{
        opacity: 0;
    }
    .schedule-modal-enter-active{
        transition: opacity 300ms ease-in, transform 300ms ease-in;
    }
    .schedule-modal-leave-active{
        transition: opacity 500ms ease-out, transform 500ms ease-out;
    }
    .schedule-modal-leave-to{
        opacity: 0;
        transform: scale(1);
    }
</style>