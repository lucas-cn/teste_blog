<template>
  <div>
    <div class="row justify-content-around">
      <div class="col-10 input-group mb-4">
        <input type="text" class="form-control"  v-model="search.autor" placeholder="autor">
        <input type="text" class="form-control"  v-model="search.titulo" placeholder="titulo">
        <input type="text" class="form-control"  v-model="search.categoria" placeholder="categoria">
        <div class="input-group-append">
          <button class="btn btn-outline-secondary" type="button" v-on:click="search(search)">Buscar</button>
        </div>
      </div>
    </div>
    <div class="row justify-content-around">
      <div class="card mb-4" v-for="(post,key) in posts" v-bind:key="key">
        <div class="card-body">
          <h4 class="card-title">{{ post.titulo }}</h4>
          <p class="card-text">{{ post.conteudo }}</p> 
          <a target="_self" :href="'/post/'+post.id" class="btn btn-primary">Vizualizar</a>
        </div>
        <footer class="card-footer">
          Autor: <em>{{ post.autor }}</em><br>
          Data: <em>{{post.publicacao | formatDate}}</em>
        </footer>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data: function() {
    return {
      search: {
        "autor":'',
        "titulo":'',
        "categoria":''
      },
      posts: {}
    }
  },
  filters: {
    formatDate: function(date) {
      if (date) {
        return moment(String(date)).format('DD/MM/YYYY hh:mm')
      }
    }
  },
  mounted: function() {
    // Posts
    axios
    .get("/api/post")
    .then(response => response.data)
    .then(data => {
      this.posts = data;
    });
  },
  watch: {
    
  },
  methods: {
    search: function(search) {
      // Posts
      axios
      .get("/api/post")
      .then(response => response.data)
      .then(data => {
        this.posts = data;
      });
    }
  }
};
</script>
<style></style>