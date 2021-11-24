<template>
    <div>
        <h2 class="text-center">Users List</h2>
        <table class="table">
            <thead>
            <tr>
                <th >ID</th>
                <th >Name</th>
                <th >Surname</th>
                <th>Email</th>
                <th>Age</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr class="line" v-for="user in users" :key="user.id">
                <td >{{ user.id }}</td>
                <td >{{ user.name }}</td>
                <td >{{ user.surname }}</td>

                <td >{{ user.email }}</td>
                <td >{{ user.age }}</td>
                <td></td>
                <td >
                    <div class="" role="group">
                        <router-link :to="{name: 'edit', params: { id: user.id }}" class="btn btn_custom">Edit</router-link>
                        <button class="btn btn_custom" @click="deleteUser(user.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
        









  
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                users: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/users/')
                .then(response => {
                    this.users = response.data;
                    console.log(response.data);
                });
                console.log(this.users)
        }
        
        ,
        methods: {
            deleteUser(id) { 
                this.axios
                    .delete(`http://localhost:8000/api/users/destroy/${id}`)
                    .then(response => {
                        let i = this.users.map(data => data.id).indexOf(id);
                        this.users.splice(i, 1)
                    });
            }
        }
    }
</script>