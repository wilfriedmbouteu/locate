<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- <div class="card card-default">
                  -->  <div class="card-header">Articles</div>
<form @submit.prevent="addArticle" class="form" style="mb-5">
    <input type="text" name="title" class="form-control" placeholder="Title">


    <textarea v-model="articles.body" class="form-control" placeholder="Body..."></textarea>
<button class="btn btn-light btn-block"  type="submit">save</button>
</form>

                 <nav aria-label="Page navigation">
  <ul class="pagination">
    <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item">
      <a class="page-link" href="#" @click="fetchArticles(pagination.prev_page_url)" aria-label="Previous">
        <span aria-hidden="true">Previous </span>
      </a>
    </li>
    <li class="page-item disabled"><a class="page-link text-dark" href="#" >page {{pagination.current_page }} of {{pagination.last_page}} </a></li>
    <li v-bind:class="[{disabled: !pagination.next_page_url}]"  class="page-item" >
      <a class="page-link" @click="fetchArticles(pagination.next_page_url)" href="#" aria-label="Next" >
        <span aria-hidden="true"> Next</span>
      </a>
    </li>
  </ul>
</nav>
                    <div class="card card-body mb-2" v-for="article in articles" v-bind:key="article.id" >
                        <h3>{{article.title}} </h3>
                        <p>{{article.body}} </p>
                       <hr>
                       <button @click="deleteArticle(article.id)" class="btn btn-danger">Delete</button>

                    </div>
                 </div>
                <!--           </div> -->
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                articles: [],
                article: {
                    id: '',
                    title: '',
                    body: ''
                },
                article_id: '',
                pagination: {},
                edit: false
            }
        },
        created() {
            this.fetchArticles();
        },
        methods: {
            fetchArticles(page_url) {
                let vm = this;
                page_url = page_url || 'api/articles'
                fetch(page_url)
                 .then(res => res.json())
                  .then(res => {
                this.articles = res.data;
                this.makePagination(res.meta, res.links);
                  })
                  .catch(err => console.log(err));
            },
            makePagination(meta, links) {
             let pagination = {
                current_page: meta.current_page,
                last_page: meta.last_page,
                next_page_url: links.next,
                prev_page_url: links.prev

             };
             this.pagination = pagination;

            
        },
            deleteArticle(id) {
             if(confirm('Are you sure ?')) {
                fetch('.api/article/${id}', {
               method: 'delete'
                })
                .then(res => res.json())
                .then(data => { 
                    alert('Article removed'); 
                  this.fetchArticles();
                })
//                JSON.parse(theStringThatIsNotJson);
                .catch(err => console.log(err));
             }
            },
            addArticle()
            {
                if(this.edit === false) {
                    //Add
                    fetch('api/articles', {
                        method: 'post',
                        body: JSON.stringify(this.article),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.article.title = '';
                        this.article.body ='';
                        alert('Article added');
                       this.fetchArticles();
                    }) 
                }
            },

        mounted() {
            alert('articles mounted.')
        }
    }
}
</script>
