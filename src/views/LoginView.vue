<template>
    <div class="d-flex justify-content-center mt-5">
        <button type="button" class="btn btn-danger mr-30" @click="home()">Home</button>

        <div v-if="tokenStatus">
            <button type="button" class="btn btn-secondary" @click="logout()">Logout</button>
        </div>

        <div v-else>
            <button type="button" class="btn btn-secondary" @click="login()">Login</button>
        </div>
    </div>

    <div class="container col-md-6 p-5">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" v-model="userData.email">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" v-model="userData.password">
        </div>

        <button class="btn btn-primary" @click="login()">
            Login
        </button>

    </div>
</template>

<script src="../js/loginview.js"></script>
