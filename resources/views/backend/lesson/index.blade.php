@extends('backend.master')

@push('css')
    {{--    <link rel="stylesheet" type="text/css"--}}
    {{--          href="{!! asset('assets/backend/admin/assets/libs/select2/dist/css/select2.min.css') !!}">--}}
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <style>
        select {
            width: 100%;
        }

        .form-select:focus {
            border-color: #86b7fe;
            outline: 0;
            box-shadow: 0 0 0 0.25rem rgb(13 110 253 / 25%);
        }

    </style>
@endpush

@section('content')
    <div class="container" x-data="component()" x-init="init">
        <div class="row">
            <div class="col-lg-4">
                <label for="category">Chủ đề</label>
                <select id="category" class="form-select" x-model="category">
                    <option value="-1">Chọn chủ đề</option>
                    <template x-for="(item,index) in listCategory" :key="item.id">
                        <option x-bind:value="item.id" x-text="item.name"></option>
                    </template>
                </select>

            </div>
            <div class="col-lg-4">
                <label for="tag">Thể loại</label>
                <select id="tag" class="form-select" x-model="tag">
                    <option value="-1">Chọn thể loại</option>
                    <template x-for="(item,index) in listTag" :key="item.id">
                        <option x-bind:value="item.id" x-text="item.name"></option>
                    </template>
                </select>
            </div>
            <div class="col-lg-4">
                <label for="tag">Khóa học</label>
                <select id="tag" class="form-select" x-model="course">
                    <option value="-1">Chọn khóa học</option>
                    <template x-for="(item,index) in listCourse" :key="item.id">
                        <option x-bind:value="item.id" x-text="item.name"></option>
                    </template>
                </select>
            </div>
        </div>
        <div class="row">
            <template x-if="listChapter.length != 0">
                <button>Thêm mới chương học</button>
            </template>
            <template x-for="chapter in listChapter" :key="chapter.id">
                <div>
                    <h1 x-text="chapter.name"></h1>
                    <template x-for="lesson in chapter.lessons" :key="lesson.id">
                        <div class="d-flex">
                            <h4 x-text="lesson.name"></h4>
                            <button>Thêm mới bài giảng</button>
                            <div class="d-flex">
                                <button
                                    @click="editLesson(lesson.id)"
                                    class="btn btn-primary">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button
                                    class="btn btn-warning delete-category">
                                    <i class="fas fa-window-close"></i>
                                </button>
                            </div>

                        </div>
                    </template>
                </div>
            </template>
        </div>

        <div class="modal fade" id="editLesson" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa khóa học</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="lesson_name">Tên bài giảng</label>
                            <input type="text" class="form-control" id="lesson_name" x-model="currentLesson.name" >
                        </div>
                        <div class="form-group">
                            <label for="lesson_slug">Slug</label>
                            <input type="text" class="form-control" id="lesson_slug" x-model="currentLesson.slug" >
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <button type="button" @click="saveEditLesson"  class="btn btn-primary accept">Đồng ý</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('js')
    <script src="{!! asset('assets/backend/admin/assets/libs/select2/dist/js/select2.full.min.js') !!}"></script>
    <script src="{!! asset('assets/backend/admin/assets/libs/select2/dist/js/select2.min.js') !!}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"
            integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"
            integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG"
            crossorigin="anonymous"></script>
    <script>
        $(".select2").select2();

        const modalEdit = new bootstrap.Modal(document.querySelector('#editLesson'));

        function component() {
            return {
                listCategory: [],
                listTag: [],
                listCourse: [],
                listChapter: [],
                category: null,
                tag: null,
                course: null,
                currentLesson: {},
                init() {
                    axios.get('{{ route('categories.index',['api' => 'true']) }}')
                        .then(response => {
                            this.listCategory = response.data.data;
                        })
                        .catch(err => console.log(err));

                    this.$watch('category', value => {
                        this.listChapter = [];
                        axios.get(`/admin/categories/${value}?tag=true`)
                            .then(response => this.listTag = response.data.data)
                            .catch(err => console.log(err));
                    })

                    this.$watch('tag', value => {
                        axios.get(`/admin/tags/${value}?course=true`)
                            .then(response => this.listCourse = response.data.data)
                            .catch(err => console.log(err));
                    })

                    this.$watch('course', value => {
                        axios.get(`/admin/courses/${value}?lesson=true`)
                            .then(response => this.listChapter = response.data.data)
                            .catch(err => console.log(err));
                    })

                },
                editLesson(id)
                {
                    axios.get(`/admin/lessons/${id}`)
                    .then(response => {
                        this.currentLesson = response.data.data
                        modalEdit.show();
                    })
                    .catch(err => console.log(err));
                },
                saveEditLesson()
                {
                    console.log(this.currentLesson);
                }

            }
        }


    </script>
@endpush
