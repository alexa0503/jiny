<template>
    <form class="m-t" role="form" action="#" method="post" @submit.prevent="login()">
        <div class="form-group" v-bind:class="{'has-error':errors.name}">
            <input v-model="name" type="name" class="form-control" placeholder="用戶名" required="">
            <label v-if="errors.name" class="help-block">{{ errors.name[0] }}</label>
        </div>
        <div class="form-group" v-bind:class="{'has-error':errors.password}">
            <input v-model="password" type="password" class="form-control" placeholder="Password" required="">
            <label v-if="errors.password" class="help-block">{{ errors.password[0] }}</label>
        </div>
        <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
    </form>
</template>

<script>
    export default {
        name: 'login',
        data() {
            return {
                name: null,
                password: null,
                errors: {}
            }
        },
        methods: {
            login() {
                var _this = this;
                axios.post('/login',{
                    name: this.name,
                    password: this.password
                })
                .then((response) => {
                    window.location.reload();
                })
                .catch(function (error) {
                    if( error.response.status === 422 ){
                        _this.errors = error.response.data.errors;
                    }
                    else{
                        alert('服务器异常，请联系管理员');
                    }
                });
            }
        }
    }
</script>
