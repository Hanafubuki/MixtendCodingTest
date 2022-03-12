<template>
    <div class="d-flex">
        <ul v-for="day in days" :key="day">        
            <li class="dates d-flex justify-content-center align-items-center">
                {{ formatDate(day) }} 
            </li>
            <li class="box" v-for="hour in working_hours" :key="hour">
                <div v-for="(data, i) in meetings[day]" :key="i">                    
                    <div v-if="startsNow(data.start, hour)" >
                        <div
                        class="box-green" 
                        :style="'height: '+getHeight(data) + 'px; margin-top: '+getMinuteDifference(data.start, hour) + 'px'">
                        {{data.summary}}
                        </div>
                    </div>
                </div>                
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    props: ['meetings', 'working_hours'],

    data() {
        return{
            days: ['2021-03-22', '2021-03-23', '2021-03-24'],
        }
    },

    methods:{
        formatDate(date){
            const now = new Date(date)
            const month = now.getMonth() + 1
            const day = now.getDate()
            const day_of_the_week = '日月火水木金土'.charAt(now.getDay())
            return `${month}/${day} (${day_of_the_week})`;
        },
        getHeight(data){
            let h = (data.end).substring(0, 2) -(data.start).substring(0, 2);
            let m  = this.getMinuteDifference(data.end, data.start); 
            let height = 100 * h + m;
            return height;
        },
        
        getMinuteDifference(end, start){
            let m  = end.substring(3, 5) - start.substring(3, 5);
            if(m > 0){
                m = (m * 100) / 60;
            }
            return m;
        },

        startsNow(start, hour){
            return start.substring(0, 2) == hour.substring(0, 2);
        },
    }
}
</script>

<style scoped>
    .box{
        border-bottom: 2px solid rgb(204, 204, 204);
        border-right: 2px solid rgb(204, 204, 204);
        width: 280px;
        text-align: center;
        position: relative;
    }
    .box-green{
        height: 100px;
        width: 280px;
        background-color: #49B5A9;
        color: white;        
        text-align: left;
        padding: .7em;
        position: absolute;
        top: 0;
        z-index: 1;
    }
    
</style>