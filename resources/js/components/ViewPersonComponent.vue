<template>
    <div id="viewPerson" v-if="person">
        <div>Name: {{ person.name }}</div>
        <div>Job: {{ person.job }}</div>
        <div>Age: {{ person.age }}</div>
        <div id="options">

            <router-link :to="{ name: 'EditPerson', params: { id : person.id } }">
                <button id="editBtn">
                    Edit
                </button>
            </router-link>

            <router-link :to="{ name: 'ViewPeople' }">
                <button id="backBtn">
                    Back
                </button>
            </router-link>

        </div>

    </div>
</template>

<script>

export default {
    name: "ViewPersonComponent",
    data() {
        return {
            person: null
        }
    },
    mounted() {
        this.getPerson()
    },
    methods: {
        getPerson() {
            axios.get(`/api/person/getPerson/${this.$route.params.id}`)
                .then(response => {
                    //console.log(response.data);
                    this.person = response.data.data
                })
        }
    }
}
</script>

<style scoped>

</style>
