<template>
  <h3>書籍検索</h3>
  <div>
    <div v-if="isLoggedIn">
      <p>ログインしています。</p>
    </div>
    <div v-else>
      <p>貴様にこのページを表示する権利はない</p>
    </div>
  </div>

  <div>
    <label for="search" class="form-label">登録済の本を検索できます</label>
    <input type="text" name="search" id="" v-model="keyword" class="form-control">
    <button class="btn btn-primary" v-on:click="search">Search</button>
  </div>
  <div class="booklist" v-for="Book in Books" :key="Book.book_id">
    <p class="booklist_title">{{ Book.title }}</p>
    <p class="booklist_img">
      <!-- 画像データがなければダミー画像表示するv-if -->
      <span v-if="Book.largeImageUrl"><img :src="Book.largeImageUrl" alt=""></span>
      <span v-else><img :src="dummy" alt=""></span>
    </p>
    <div class="booklist_others">
      <p class="booklist_author">著者：{{ Book.author }}</p>
      <p class="booklist_publisher">出版社：{{ Book.publisherName }}</p>
      <p class="booklist_isbn">ISBN：{{ Book.isbn }}</p>
      <p class="booklist_gunre">説明：{{ Book.itemCaption }}</p>
      <p class="booklist_gunre">ジャンル：{{ Book.gunre }}</p>
      <p class="booklist_summary">{{ Book.myReview }}</p>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: 'BookSearch',
  data() {
    return {
      Books: '',
      dummy: '/images/bookicon.png',
      keyword: '',
      isLoggedIn: false,
    }
  },
  async mounted() {
    // const url = "/api/books";
    // const response = await axios.get(url);
    // this.data = response.data;
    // axios.get('/api/books')
    //   .then(response => this.Books = response.data)
    this.getBookData();
    this.loginCheck();
    this.getUser();
  },

  methods: {

    loginCheck() {
      // axios
      //   .get("api/loginCheck")
      //   .then(response => {
      //     console.log("☆☆☆" + response)
      //     this.isLoggedIn = true
      //   })
      //   .catch(error => {
      //     console.log("★★★" + error);
      //     this.isLoggedIn = false
      //   });

      if (document.cookie.includes('XSRF-TOKEN')) {
        this.isLoggedIn = true
                } else {
                  this.isLoggedIn = false
                }
    },

    getBookData() {
      axios.get('/api/books')
        .then(response => this.Books = response.data)
    },

    getUser(){
      const response = axios.get(`/api/user`);
        console.log("ゆーざー"+response);
    },
    async search() {
      console.log(this.keyword);
      const url = "/api/books/search";
      // axios.post('送信先のurl','データ')
      const response =
        await axios.post(
          url,
          { keyword: this.keyword }
        );
      console.log(response);

      this.Books = response.data;
    }
  },

}
</script>
<style></style>