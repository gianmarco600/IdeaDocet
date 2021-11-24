<template>
    <div>
        <h3 class="text-center">Edit User</h3>
        <div class="row justify-content-center">
            <div class="col-md-6 _box">
                <form @submit.prevent="updateUser">
                    <div class="form-group form_edit " :class="{error_field : field_error['name']}">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="user.name">
                    </div>
                    <div class="form-group form_edit " :class="{error_field : field_error['surname']}">
                        <label>Surname</label>
                        <input type="text" class="form-control" v-model="user.surname">
                    </div>
                    <div class="form-group form_edit " :class="{error_field : field_error['email']}">
                        <label>Email</label>
                        <input type="text" class="form-control" v-model="user.email">
                    </div>
                    <div class="form-group form_edit " :class="{error_field : field_error['age']}">
                        <label>age</label>
                        <input type="number" class="form-control" v-model="user.age">
                    </div>
                    <button type="submit" class="btn btn_custom">Update</button>
                    <div v-if="errors.length >= 1">
                        <div class="error_badge" v-for="(error, i) in errors" :key="i" >
                            {{error}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                user: {},
                errors: [],
                field_error: {
                    name : 0,
                    surname : 0,
                    age : 0,
                    email : 0
                }
            }
        },
        created() {
           
            
            this.axios
                .get(`http://localhost:8000/api/users/show/${this.$route.params.id}`)
                .then((res) => {
                    
                    this.user = res.data;
                });
                console.log(this.user);
        },
        methods: {
            updateUser() {

                this.errors = [];

                if(this.user.name === undefined || this.user.surname === undefined || this.user.email === undefined || this.user.age === undefined || this.user.name === '' || this.user.surname === '' || this.user.email === '' || this.user.age === ''){
                    this.errors.push('Complete all the fields');
                    if(this.user.name === undefined || this.user.name === ''){
                        this.field_error.name = true;
                    }
                    if(this.user.surname === undefined || this.user.surname === ''){
                        this.field_error.surname = true;
                    }
                    if(this.user.age === undefined || this.user.age === ''){
                        this.field_error.age = true;
                    }
                    if(this.user.email === undefined || this.user.email === ''){
                        this.field_error.email = true;
                    }
                    console.log(this.field_error)
                    return false
                }
                this.axios
                    .patch(`http://localhost:8000/api/users/edit/${this.user.id}`, this.user)
                    .then((res) => {
                        this.$router.push({ name: 'home' });
                    });
            }
        }
    }
</script>