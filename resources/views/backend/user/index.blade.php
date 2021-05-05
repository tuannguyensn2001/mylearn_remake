@extends('backend.master')

@push('css')
    <style>
        @import url('https://fonts.googleapis.com/css?family=Muli&display=swap');
        @import url('https://fonts.googleapis.com/css?family=Lato&display=swap');

        * {
            box-sizing: border-box;
        }

        .container {
            font-family: 'Lato', sans-serif;
        }

        .card {
            background-color: #fff;
            border-radius: 3px;
            padding: 30px;
            margin: 10px;
            text-align: center;
            width: 220px;
            max-width: 100%;
        }

        .card img {
            border-radius: 50%;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            width: 75px;
            height: 75px;
        }

        .card h4 {
            margin: 10px 0;
            height: 50px;
        }

        .card small {
            height: 50px;
            color: #777;
            display: block;
        }

        .card button {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 3px;
            color: #999;
            padding: 10px 25px;
            margin-top: 25px;
        }

    </style>
@endpush

@section('content')
    <div class="container" x-data="component()" x-init="init()">
        <div class="row">
            <template  x-for="user in listUsers" :key="user">
                <div class="col-6 col-sm-4 col-md-4 col-lg-2">
                    <div class="card">
                        <div>
                            <img x-bind:src="user.profile.media.source" alt="">
                        </div>
                        <h4 x-text="user.profile.fullname"></h4>
                        <small x-text="user.email"></small>
                        <p>Đã tham gia vào</p>
                        <p x-text="user.created_at"></p>
                        <a :href="convertRouteUserShow(user.id)" class="btn btn-primary">Xem chi tiết</a>
                    </div>
                </div>
            </template>
        </div>

        <div class="d-flex justify-content-end">
            <button class="btn btn-primary" @click="addMore()" >Xem thêm</button>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script>
        function component() {
            return {
                listUsers: [],
                currentPage: 1,
                init(){
                    this.fetchData(this.currentPage);


                    this.$watch('currentPage',value => this.fetchData(value));
                },
                fetchData(page){
                    axios.get(`/admin/users?page=${page}`)
                    .then(response => {
                        const users = response.data.data;
                        this.listUsers = [...this.listUsers,...users];
                        console.log(document.querySelector('.container').scrollHeight);
                        window.scrollTo(0,document.querySelector('.container').scrollHeight+200);
                    })
                    .catch(err => console.log(err));
                },
                addMore(){
                    this.currentPage++;
                },
                convertRouteUserShow(id){
                    return `/admin/users/${id}`;
                }
            }
        }
        function component(){return{listUsers:[],currentPage:1,init(){this.fetchData(this.currentPage),this.$watch("currentPage",t=>this.fetchData(t))},fetchData(t){axios.get(`/admin/users?page=${t}`).then(t=>{const e=t.data.data;this.listUsers=[...this.listUsers,...e],console.log(document.querySelector(".container").scrollHeight),window.scrollTo(0,document.querySelector(".container").scrollHeight+200)}).catch(t=>console.log(t))},addMore(){this.currentPage++},convertRouteUserShow:t=>`/admin/users/${t}`}}
    </script>
@endpush
