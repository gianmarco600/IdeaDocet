<template>
    <div>
        <h3 class="text-center">Create User</h3>
        <div class="row justify-content-around">
            <div class="_box col-md-6">
                <form @submit.prevent="addUser">
                    
                    <div class="form-group form_edit " :class="{error_field : field_error['name']}">
                        <div><label>Name</label></div>
                        <input pattern="^[a-zA-Z0-9]+$" type="text" class="form-control " v-model="user.name"
                        name="name">
                    </div>
                    <div class="form-group form_edit " :class="{error_field : field_error['surname']}">
                        <div><label>Surname</label></div>
                        <input pattern="^[a-zA-Z0-9]+$" type="text" class="form-control " v-model="user.surname"
                        name="name">
                    </div>
                    <div class="form-group form_edit " :class="{error_field : field_error.email}">
                        <div><label>email</label></div>
                        <input type="email" class="form-control " v-model="user.email"
                        name="email">
                    </div>
                    <div class="form-group form_edit " :class="{error_field : field_error.age}">
                        <div><label>age</label></div>
                        <input type="number" class="form-control " v-model="user.age"
                        name="age">
                    </div>
                    <button type="submit" class="btn btn_custom">Create</button>
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
                errors:[],
                field_error: {                  
                    name : 0,
                    surname : 0,
                    age : 0,
                    email : 0
                }
            }
        },
        methods: {
            addUser() {
                this.field_error = {
                    name : 0,
                    surname : 0,
                    age : 0,
                    email : 0
                };
                //check input function start
                this.errors = [];
                if(this.user.name === undefined || this.user.surname === undefined || this.user.email === undefined || this.user.age === undefined || this.user.name === '' || this.user.surname === '' || this.user.email === '' || this.user.age === ''){
                    this.errors.push('Complete all the field_errors');
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
                // check input function end
                this.axios
                
                    .post('http://localhost:8000/api/users/create/', this.user)
                    .then(response => (
                        this.$router.push({ name: 'home' })
                    ))
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>