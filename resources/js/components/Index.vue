<template>
    <div id="navBar">
        <div id="btnNav"><router-link :to="{name: 'AddPerson'}">Add person</router-link></div>
        <div id="btnNav"><router-link :to="{name: 'ViewPeople'}">View people</router-link></div>
    </div>

    <router-view></router-view>
</template>

<script>
export default {
    name: "Index"
}
</script>

<style scoped>

</style>
