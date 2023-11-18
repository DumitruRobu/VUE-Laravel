<template>
    <div id="addPersonDiv">
        <div id="indemn">Let's edit the person:</div>
        <div><input id="inpt" v-model="name" type="text" placeholder="name..."></div>
        <div><input id="inpt" v-model="job" type="text" placeholder="job..."></div>
        <div><input id="inpt" v-model="age" type="number" placeholder="age..."></div>

        <div id="buttonsAdd">
            <div> <button :disabled="!(isPopulated)" @click.prevent="updatePerson()" class="btn btn-success">Edit</button> </div>
            <div id="cancelBtn" class="btn btn-danger">
                <router-link :to="{ name: 'ViewPerson', params: {id:this.id} }">
                    Cancel
                </router-link>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "EditPersonComponent",
    data(){
        return{
            name: null,
            job:null,
            age:null,
            id:null,
        }
    },
    mounted() {
        this.getPerson()
    },
    methods:{
        getPerson(){
            axios.get(`/api/person/editPerson/${this.$route.params.id}`)
                .then(response =>{
                     this.name = response.data.data.name  //utilizez .data.data pt ca folosesc clasa Resource (PersonResource).
                     this.job = response.data.data.job
                     this.age = response.data.data.age
                     this.id = response.data.data.id
                });
        },
        updatePerson(){
            axios.post(`/api/person/updatePerson/${this.id}`,
                {name: this.name, job: this.job, age:this.age})
                .then(response => this.$router.push({name: 'ViewPerson', params: {id: this.id}})
            );
        },

    },
    computed: {
        isPopulated(){
            return this.name && this.job && this.age
        }
    }
}
</script>

<style scoped>

</style>
