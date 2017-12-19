<template>
    <div class="container">
            <div class="row">
            <div class="col-lg-3 border border-bottom-0 border-left-0 border-top-0">
                <form action="search" method="post"  v-on:submit.prevent="search('/search/' + query)">
                    <div class="col-sm-12 mb-2">
                      <label class="sr-only" for="query">Query</label>
                      <div class="input-group mb-2 mb-sm-0"> 
                        <input type="text" class="form-control" name="q" v-model="query" id="query" placeholder="Search">
                          <button type="submit" class="btn btn-secondary"><i class="fa fa-search" aria-hidden="true"></i></button>
                      </div>
                    </div>
                    <h5 class="text-center">Refine Search By</h5>
                    <div class="card mb-4 p-3">
                        <h6>Genre</h6>
                        <div v-for="genre in genres">
                            <div class="d-flex justify-content-start">
                                <input type="radio" name="input_genre" v-model="input_genre" :value='genre.id' :id='genre.name' class="mr-5"><label :for="genre.name">{{genre.name}}</label>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4 p-3">
                        <h6>Language</h6>
                        <div v-for="language in languages">
                            <div class="d-flex justify-content-start">
                                <input type="radio" name="input_language" v-model="input_language" :value='language.id' :id='language.name' class="mr-5"><label :for="language.name">{{language.name}}</label>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4 p-3">
                        <h6>Date Of Screening</h6>
                        <div class="">
                            <label>Start Date</label>
                            <input type="date" name="start_date" v-model="start_date" class="mr-5 mb-2">
                            <label>End Date</label>
                            <input type="date" name="end_date" v-model="end_date" class="mr-5">
                            <input type="text" id="datepicker" class="d-none">
                        </div>
                    </div>
                </form>
            </div>
            <!--second column-->
            <div class="col-lg-9">
                <h1 class="text-center display-2 text-muted mt-5" v-show="not_loaded">Your Search Results Appear Here</h1>
                <div v-show="loaded">
                <h1 class="text-center display-5 text-muted mt-5">Search Results</h1>
                <div v-if="movies.length > 0">
                  <div class="row mb-4" v-for="movie in movies">
                      <div class="col-lg-3">
                      <a :href="'/movie/' + movie.id">  <img :src="'/uploads/movies/' + movie.image" class="img-fluid rounded" style="height:140px;"> </a>
                      </div>
                      <div class="col-lg-9">
                        <h5><a :href="'/movie/' + movie.id"> {{movie.title}} </a></h5>
                        <p>{{movie.description}}</p>
                      </div>
                  </div>
              </div>
              <div v-else>
                <h6>No events screening at this time</h6>
              </div>
              </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                not_loaded: true,
                loaded: false,
                genres: '',
                languages: '',
                 csrf: '',
                 query: '',
                 input_genre: '',
                 input_language: '',
                 start_date: '',
                 end_date: '',
                 movies: '',
                 query: ''
            }
        },
        created() {
            this.not_loaded = true,
            this.loaded = false,
            self = this 
            axios.post('/browse')

            .then(function(response) { 
              //  self.loading = false,
                //self.loaded = true,
               // alert(response.data);
              //  console.log(response.data[0])
                self.genres = response.data[0],
                self.languages = response.data[1],
                self.auth = response.data[2]
                }); 
        },
        methods: {
             search(searchurl) {
                  this.not_loaded = true,
                  this.loaded = false,
                  self = this 
               //   alert(`${this.input_genre} ${this.input_language} ${this.start_date} ${this.end_date}`)
                  axios({ 
                      method: 'post',
                      url: searchurl,
                      data: {
                        q: self.query,
                        input_genre: self.input_genre,
                        input_language: self.input_language,
                        start_date: self.start_date,
                        end_date: self.end_date
                      }
                    })
                  .then(function(response) {
                    //  self.countstartups = response.data.length,
                      self.not_loaded = false,
                      self.loaded = true,
                      self.movies = response.data,
                      console.log(response.data)
                    });  
                },
        },
         mounted(){
            this.csrf = window.Laravel.csrfToken
        }
    }
</script>
