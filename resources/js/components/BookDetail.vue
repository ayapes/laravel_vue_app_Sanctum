<template>
  <h3>
    書籍詳細情報
  </h3>
  <!-- <h4>{{bookData}}</h4> -->
  <div class="booklist">
    <input type="text" v-model="bookData.title" id="bookData.title" name="bookData.title">
    <p class="booklist_title">{{ bookData.title }}</p>
    <p class="booklist_img">
      <!-- 画像データがなければダミー画像表示するv-if -->
      <span v-if="bookData.largeImageUrl"><img :src="bookData.largeImageUrl" alt=""></span>
      <span v-else><img :src="dummy" alt=""></span>
    </p>
    <div class="booklist_others">
      <p class="booklist_author">著者：{{ bookData.author }}</p>
      <p class="booklist_publisher">出版社：{{ bookData.publisherName }}</p>
      <p class="booklist_isbn">ISBN：{{ bookData.isbn }}</p>
      <p class="booklist_gunre">ジャンル：{{ bookData.gunre }}</p>
      <p class="booklist_summary">{{ bookData.itemCaption }}</p>
    </div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
      この本を借りる
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">この本を借りる</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            （２週間後の日付）まで借りる or （レンタル中のため）借りることが出来ないことを表示
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">キャンセル</button>
            <button type="button" class="btn btn-primary" v-on:click="rentBook" data-bs-dismiss="modal">決定</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import axios from "axios";

export default {
  name: 'BookDetail',
  data() {
    return {
      bookData: {},
      dummy: '/images/bookicon.png',
    }
  },
  async mounted() {
    // const url = `/api/books/${this.$route.params.id}`;
    // const response = await axios.get(url);
    // this.bookData = response.data;

    // ↓api/books/1はBookControllerのshow()で指定されるようになった。
    axios.get(`/api/books/${this.$route.params.id}`)
      .then(response => this.bookData = response.data)
  },
  methods: {
    

    },
  }
</script>