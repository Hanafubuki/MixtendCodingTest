<template>
    <ul>
        <li class="dates border-left"></li>
        <li class="time"
            v-for="hour in working_hours"
            :key="hour"
        >{{ hour }}
        </li>
    </ul>
</template>

<script>
export default {
    props: ['working_hours'],

}
</script>

<style>

</style>