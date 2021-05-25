<template>
  <div class="container">
    <div id="success" ref="success">
      <h1>LIKE</h1>
      <a
        href="#"
        @click.prevent="likePost"
        data-toggle="tooltip"
        data-placement="right"
        title="Likes"
        ><i class="far fa-heart"></i>
      </a>
      <p>{{ post.like }}</p>
    </div>
  </div>
</template>

<script>
export default {
  props: ["post"],
  data() {
    return {
      likes: "",
    };
  },
  mounted() {
    this.renderLike();
  },

  methods: {
    likePost() {
      axios
        .post("/like/" + this.post, {
          post: this.post,
        })
        .then((response) => {
          this.renderLike();
          console.log("ok1");
          $("#success").html(response.data.message);
          // this.$refs.success.html(response.data.message);
        })
        .catch();
    },
    renderLike() {
      axios
        .post("/like", {
          post: this.post,
        })
        .then((response) => {
          // console.log(response);
          console.log(response.data.post.like);
          this.likes = response.data.post.like;
        })
        .catch();
    },
  },
};
</script>
