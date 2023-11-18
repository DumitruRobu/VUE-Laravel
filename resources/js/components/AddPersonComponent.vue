<template>

    <div id="addPersonDiv">
        <div id="indemn">Let's add a new person:</div>
        <div><input id="inpt" v-model="name" type="text" placeholder="name..."></div>
        <div><input id="inpt" v-model="job" type="text" placeholder="job..."></div>
        <div><input id="inpt" v-model="age" type="number" placeholder="age..."></div>
        <div id="buttonsAdd">
            <div><input :disabled="!(isEmpty)" @click.prevent="addPerson()" class="btn btn-success" value="Add"></div>
            <!--            <div> <input @click.prevent="cancelOperation()" class="btn btn-danger" value="Cancel"> </div>-->
            <div id="cancelBtn" class="btn btn-danger">
                <router-link :to="{ name: 'ViewPeople' }">
                    Cancel
                </router-link>
            </div>
        </div>
        <div class="success-message" v-if="flag" @animationend="flagChange">Person added successfully!</div>
    </div>
</template>

<script>
export default {
    name: "AddPersonComponent",
    data() {
        return {
            name: null,
            job: null,
            age: null,
            flag: false,
        }
    },
    methods: {
        addPerson() {
            axios.post('/api/person/add', {'name': this.name, 'job': this.job, 'age': this.age})
                .then(response => {
                    this.name = null
                    this.age = null
                    this.job = null
                    this.flag = true
                    console.log(this.flag)
                });
        },
        cancelOperation() {
            this.age = null
            this.name = null
            this.job = null
            this.$router.push({name: 'View'})
        },
        flagChange() {
            this.flag = false;
            console.log(`Now the flag is ${this.flag}`)
        }

    },
    computed: {
        isEmpty() {
            return (this.age && this.name && this.job);
        }
    }
}
</script>

<style scoped>

</style>
