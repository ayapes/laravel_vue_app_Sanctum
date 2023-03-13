<template>
    <h2>ログインページ</h2>
    <div>
        <label for="email">メールアドレス</label>
        <input type="text" name="email" id="email" v-model="email">
    </div>
    <div>
        <label for="password">パスワード</label>
        <input type="password" name="password" id="password" v-model="password">
    </div>
    <!-- Javascriptを動作させるので type="submit"ではないぞ！ -->
    <div><button type="button" class="btn" v-on:click="login">ログイン</button></div>
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

            const response = axios.post('/login', {
                email: this.email,
                password: this.password,
            })
            console.log(response);
        }

    },
}
</script>