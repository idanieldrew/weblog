<template>
  <div class="container">
    <div id="success" ref="success">
      <a href="#" @click.prevent="likePost"><i class="far fa-heart"></i> </a>
      <p>{{ likes }}</p>
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
          console.log(response);
          this.$refs.success.html(response.data.message);
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
          // console.log(response.data.post.like);
          console.log(response);

          this.likes = response.data.post.like;
        })
        .catch();
    },
  },
};
</script>
