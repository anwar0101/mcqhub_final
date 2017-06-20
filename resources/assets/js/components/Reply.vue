<template>
  <div class="container">
    <h4>Add Comment</h4>
    <form action="" @submit.prevent="edit ? editComment(comment.id) : createComment()">
      <div class="input-group">
        <textarea name="body" v-model="comment.body" ref="textarea" class="form-control"></textarea>
      </div>
        <div class="input-group">
          <button type="submit" class="btn btn-primary" v-show="!edit">Add Comment</button>
          <button type="submit" class="btn btn-primary" v-show="edit">Edit Comment</button>
        </div>
    </form>
    <h4>Reply</h4>
      <ul class="list-group">
        <li class="list-group-item" v-for="comment in comments">
          {{comment.body}}
          <a class="btn btn-default" v-on:click=" showComment(comment.id)">Edit</a>
          <a class="btn btn-danger" v-on:click=" deleteComment(comment.id)">Delete</a>
        </li>
      </ul>
  </div>
</template>

<script>
  export default{
    props: ['pid'],
    data: function(){
      return {
        edit:false,
        comments:[],
        comment: {
          title:'',
          body: '',
          id: '',
        },
      }
    },

  created: function(){
      this.fetchComments();
  },
  ready: function(){
    this.fetchComments();
  },

  methods: {
    fetchComments: function(){
      axios.get("../api/post/"+this.pid+"/comments")
          .then( (response) => {
            this.comments = response.data;
          })
          .catch(response => console.log(response.data));
    },

    createComment: function(){
        axios.post("../api/post/"+this.pid+"/comment", this.comment)
            .then( (response) => {
              this.comment.body= '';
              this.fetchComments();
            })
            .catch(response => console.log(response.data));
    },

    editComment: function(comment_id){
      axios.patch("../api/post/"+this.pid+"/comment/"+comment_id, this.comment)
          .then( (response) => {
            this.comment.body= '';
            this.comment.id= '';
            this.fetchComments();
            this.edit = false;
          })
          .catch(response => console.log(response.data));
    },

    deleteComment: function(comment_id){
      axios.delete("../api/post/"+this.pid+"/comment/"+comment_id)
          .then(response => this.fetchComments())
          .catch(response => console.log(response.data));
    },

    showComment: function(comment_id){
      for (var i = 0; i < this.comments.length; i++) {
        if (this.comments[i].id == comment_id) {
          this.comment.body = this.comments[i].body;
          this.comment.id = this.comments[i].id;
          this.edit = true;
        }
      }
    }
  }
}
</script>

<style lang="scss">

</style>
