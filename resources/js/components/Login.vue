<template>
    <h3>ユーザーログインページ</h3>
    <div class="container">
        <div>
            <label for="email" class="form-label">メールアドレス</label>
            <input type="email" id="email" class="form-control" v-model="email">
        </div>
        <div>
            <label for="password" class="form-label">パスワード</label>
            <input type="password" id="password" class="form-control" v-model="password">
        </div>
        <button type="button" class="btn btn-info" v-on:click="login">ログイン</button>
    </div>
</template>
<script>
import axios from "axios";

export default {
    name: "Login",
    date() {
        return {
            email: '',
            password: '',
        }
    },

    methods: {
        async login() {
            // getでアクセスするだけでcookieがもらえる
            const csrfCookie = await axios.get('/sanctum/csrf-cookie');
            console.log(csrfCookie);

            const response = axios.post('/api/login', {
                email: this.email,
                password: this.password,
            })
            console.log(response);
        }

    },
}
</script>