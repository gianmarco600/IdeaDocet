<template>
    <div class="container"> 
        <nav class="navbar navbar-expand-lg navbar-light bg-light nav_edit">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <router-link to="/" class="nav-item nav-link _link">Users List</router-link>
                    <router-link to="/create" class="nav-item nav-link _link">Create User</router-link>
                </div>
            </div>
        </nav>

        <router-view> </router-view>
    </div>
</template>
 
<script>
    export default {}
</script>