<template>
    <div class="center m-4">カレンダーUI</div>
</template>

<script>
export default {
}
</script>

<style scoped>
li{
    list-style-type: none; 
}
.dates {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
}

.dates > * {
  text-align: center;
  padding-right: 5px;
}
</style>