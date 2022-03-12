<template>
    <div class="container mt-3">
        <Header />
        <div v-if="error">データが表示できません。</div>
        <div class="d-flex justify-content-center w-100 mt-2" v-else>
            <div class="">
                <ul>
                    <li class="dates"></li>
                    <li class="time"
                        v-for="hour in working_hours"
                        :key="hour"
                    >{{ hour }}
                    </li>
                </ul>
            </div>
            <EventDayItem
                :meetings="events.meetings"
                :working_hours="working_hours"
            />
        </div>
    </div>
</template>

<script>
Vue.component('Header', require('./components/Header.vue').default);
Vue.component('EventDayItem', require('./components/EventDayItem.vue').default);
export default {
    data() {
        return{
            working_hours: [],
            error: '',
            events: {
                "working_hours":{
                    "start": "10:00",
                    "end": "19:00"
                },
                "meetings":{
                    "2021-03-22":[
                        {
                            "summary":"Meeting 1",
                            "start":"10:00",
                            "end":"11:00",
                            "timezone":"Asia/Tokyo"
                        }
                    ],
                    "2021-03-23":[
                        {
                            "summary":"Meeting 2",
                            "start":"14:00",
                            "end":"15:00",
                            "timezone":"Asia/Tokyo"
                        },
                        {
                            "summary":"Meeting 3",
                            "start":"16:00",
                            "end":"17:00",
                            "timezone":"Asia/Tokyo"
                        }
                    ],
                    "2021-03-24":[
                        {
                            "summary":"Meeting 4",
                            "start":"10:30",
                            "end":"12:10",
                            "timezone":"Asia/Tokyo"
                        }
                    ]
                }
            },
        }
    },
    mounted(){
        this.getWorkingHours()
    },
    methods:{
        getEvents(){
            page_url = '/api/events';
            fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.events = res.data
                })
                .catch(err => {
                    console.log(err);
                });
        },

        getWorkingHours(){
            let start = (this.events.working_hours.start).substring(0, 2);
            let end = (this.events.working_hours.end).substring(0, 2);
            let hour_difference = end - start;        
            for(let i = 0; i <= hour_difference; i++){
                this.working_hours.push(parseInt(start) + i +':00')
            }    
        }
    }
}
</script>

<style>
*{
    font-size: 22px;
}
ul{
    padding: 0 !important;
}
li{
    list-style-type: none; 
    height: 100px;
}
.dates{
    height: 70px;
    border-top: 2px solid rgb(167, 167, 167);
    border-bottom: 2px solid rgb(167, 167, 167);
    border-left: 2px solid rgb(167, 167, 167);
    widows: 170px;
}
.time{    
    border-bottom: 2px solid rgb(167, 167, 167);
    border-right: 2px solid rgb(167, 167, 167);
    border-left: 2px solid rgb(167, 167, 167);
    width: 170px;
    text-align: center;
}

</style>