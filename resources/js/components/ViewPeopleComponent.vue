<template>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Job</th>
            <th scope="col">Age</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody v-for="person in people">
        <tr>
            <th scope="row">{{ person.id }}</th>

            <td id="nameLink">
                <router-link :to="{ name: 'ViewPerson', params: {id : person.id} }">
                    {{ person.name }}
                </router-link>
            </td>

            <td>{{ person.job }}</td>
            <td>{{ person.age }}</td>
            <td id="nameLink">
                <router-link :to="{ name: 'EditPerson', params: { id : person.id } }">
                        Edit
                </router-link>
            </td>

            <td>
                <button class="btn btn-danger" @click.prevent="deletePerson(person.id)">Delete</button>
            </td>
        </tr>

        </tbody>
    </table>
</template>

<script>
export default {
    name: "ViewPeopleComponent",
    data() {
        return {
            name: null,
            age: null,
            job: null,
            people: null
        }
    },
    mounted() {
        this.getPeople()
    },
    methods: {
        getPeople() {
            axios.get('/api/person/getPeople').then(response => {
                this.people = response.data.data //utilizez .data.data pt ca folosesc clasa Resource (PersonResource).
            })
        },
        deletePerson(id) {
            axios.get(`/api/person/deletePerson/${id}`).then(response => this.getPeople());
        },

    }
}
</script>

<style scoped>

</style>
