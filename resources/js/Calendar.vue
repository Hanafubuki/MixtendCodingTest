<template>
    <div class="container content mt-3">
        <Header />
        <div v-if="error">データが表示できません。</div>
        <div class="d-flex justify-content-center w-100 mt-2" v-else>
            <TimeColumn :working_hours="working_hours" />
            <DayColumns
                :meetings="events.meetings"
                :working_hours="working_hours"
            />
        </div>
    </div>
</template>

<script>
Vue.component('Header', require('./components/Header.vue').default);
Vue.component('TimeColumn', require('./components/TimeColumn.vue').default);
Vue.component('DayColumns', require('./components/DayColumns.vue').default);
export default {
    data() {
        return{
            working_hours: [],
            error: false,
            events: ''
        }
    },
    mounted(){
        this.getEvents()
    },
    methods:{
        getEvents(){
            let page_url = '/api/schedule';
            let headers = new Headers({
                "Accept"       : "application/json",
                "Content-Type" : "application/json",
                "User-Agent"   : "Mixtend Coding Test"
            });
            fetch(page_url, {
                method  : 'GET', 
                headers : headers 
            })
                .then(res => res.json())
                .then(res => {
                    this.events = res
                    this.getWorkingHours()
                })
                .catch(err => {
                    this.error=true;
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
        color: #424242;
    }
    ul{
        padding: 0 !important;
    }
    li{
        list-style-type: none; 
        height: 100px;
    }
    .content{
        max-width: 1140px;
    }
    .dates{
        height: 70px;
        border-top: 2px solid rgb(204, 204, 204);
        border-bottom: 2px solid rgb(204, 204, 204);
        border-right: 2px solid rgb(204, 204, 204);
        widows: 170px;
        text-align: center;
    }
    .time{    
        border-bottom: 2px solid rgb(204, 204, 204);
        border-right: 2px solid rgb(204, 204, 204);
        border-left: 2px solid rgb(204, 204, 204);
        width: 190px;
        text-align: center;
    }
    .border-left{
        border-left: 2px solid rgb(204, 204, 204);
    }

</style>