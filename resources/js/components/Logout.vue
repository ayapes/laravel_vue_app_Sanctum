<template>
    <div class="container">
      <button type="button" class="btn btn-info" v-on:click="send">ログアウト</button>
    </div>
  </template>
  <script>
    import axios from 'axios';
  
    export default {
      name: 'Logout',
      methods: {
        async send() {
          const url = '/api/logout';
          // axios.post('送信先のurl','データ')
          const response = await axios.post(url);
          console.log("ログアウト"+response);
  
          // ログアウトに成功したら、X-CSRFクッキーを削除する
          document.cookie = 'XSRF-TOKEN=; expires=0;';
  
          // ログアウトに成功したら、ログインページに遷移する
          this.$router.push('/');
        },
      },
    };
  </script>