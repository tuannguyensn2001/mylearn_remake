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

        .list-lesson > div {
            background-color: #fff;
            outline: 0;
            border: none;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
        }

        .chapter-item {
            margin-top: 20px;
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
                <div class="add_chapter d-flex justify-content-end">
                    <button @click="addChapter" class="btn btn-primary">Thêm mới chương học</button>
                </div>
            </template>
            <div class="list-chapter">
                <template x-for="chapter in listChapter" :key="chapter.id">
                    <div class="chapter-item">
                        <div class="d-flex justify-content-between">
                            <h2 @click="editChapter(chapter.id)" x-text="chapter.name"></h2>
                            <button @click="addLesson(chapter.id)" class="btn btn-success">Thêm mới bài giảng</button>
                        </div>
                        <div class="list-lesson" x-bind:data-id="chapter.id">
                            <template x-for="lesson in chapter.lessons" :key="lesson.id">
                                <div class="lesson-item d-flex justify-content-between" x-bind:data-id="lesson.id">
                                    <h4 x-text="lesson.name"></h4>
                                    <div class="d-flex ">
                                        <button
                                            @click="editLesson(lesson.id)"
                                            class="btn btn-primary ">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button
                                            class="btn btn-warning delete-lesson">
                                            <i class="fas fa-window-close"></i>
                                        </button>
                                    </div>

                                </div>
                            </template>
                        </div>
                    </div>
                </template>
            </div>

        </div>

        <div class="modal fade" id="editLesson" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" x-text="statusForm()"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="lesson_name">Tên bài giảng</label>
                            <input type="text" class="form-control" id="lesson_name" x-model="currentLesson.name">
                        </div>
                        <div class="form-group">
                            <label for="lesson_slug">Slug</label>
                            <input type="text" class="form-control" id="lesson_slug" x-model="currentLesson.slug">
                        </div>
                        <div class="form-group">
                            <label for="lesson_description">Mô tả</label>
                            <textarea type="text" class="form-control" id="lesson_description"
                                      x-model="currentLesson.description">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="lesson_chapter">Mô tả</label>
                            <select id="lesson_chapter" class="form-select" x-model="currentLesson.chapter_id"
                                    :disabled="!!currentLesson.chapter_id">
                                <template x-for="chapter in listChapter" :key="chapter.id">
                                    <option :value="chapter.id" x-text="chapter.name"></option>
                                </template>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="lesson_video">Video</label>
                            <input type="text" class="form-control" id="lesson_video" x-model="currentLesson.video_url">
                        </div>
                        <div class="form-group">
                            <label for="lesson_status">Trạng thái</label>
                            <select class="form-select" id="lesson_status" x-model="currentLesson.status">
                                @foreach($_status as $key=>$item)
                                    <option value="{{$key}}">{{$item}}</option>
                                @endforeach
                            </select>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <button type="button" @click="submit" class="btn btn-primary accept">Đồng ý</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editChapter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" x-text="statusForm()"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="chapter_name">Tên chương học</label>
                            <input class="form-control" type="text" id="chapter_name" x-model="currentChapter.name">
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <button type="button" @click="submitChapter" class="btn btn-primary accept">Đồng ý</button>
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
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{!! asset('assets/backend/js/helper/string_to_slug.js') !!}"></script>
    <script>


        const modalEdit = new bootstrap.Modal(document.querySelector('#editLesson'));
        const modalEditChapter = new bootstrap.Modal(document.querySelector('#editChapter'));

        function debounce(func, wait) {
            let timeout;

            return function () {
                const context = this,
                    args = arguments;

                const executeFunction = function () {
                    func.apply(context, args);
                };

                clearTimeout(timeout);
                timeout = setTimeout(executeFunction, wait);
            };
        };

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
                currentChapter: {},
                isEdit: false,
                isEditChapter: false,
                statusForm() {
                    return this.isEdit ? 'Chỉnh sửa bài giảng' : 'Thêm mới bài giảng'
                },
                init() {
                    $('.list-chapter').sortable({
                        update: (event, ui) => {
                            const id = [];
                            $('.list-lesson').each(function () {
                                id.push($(this).attr('data-id'));
                            })
                            this.listChapter = id.map(item => {
                                return this.listChapter.find(index => parseInt(item) === index.id);
                            });
                            debounce(updateAll, 5000)();
                        }
                    });
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
                                .then(response => {
                                    this.listChapter = response.data.data;
                                })
                                .catch(err => console.log(err));
                        }
                    )

                    this.$watch('listChapter', value => {
                        const _this = this;
                        $('.list-lesson').sortable({
                            update: (event, ui) => {
                                debounce(updateAll, 5000)();
                            },
                        });

                    })

                    this.$watch('currentLesson.name', value => this.currentLesson.slug = string_to_slug(value));

                },
                editLesson(id) {
                    axios.get(`/admin/lessons/${id}`)
                        .then(response => {
                            this.isEdit = true;
                            this.currentLesson = response.data.data
                            modalEdit.show();
                        })
                        .catch(err => console.log(err));
                }
                ,
                addLesson(id) {
                    this.isEdit = false;
                    this.currentLesson = {
                        id: null,
                        name: null,
                        slug: null,
                        description: null,
                        chapter_id: id,
                        video_url: null,
                        status: null,
                    }
                    modalEdit.show();
                },
                submit() {
                    this.isEdit ? this.saveEditLesson() : this.saveAddLesson();
                },
                submitChapter() {
                    this.isEditChapter ? this.saveEditChapter() : this.saveAddChapter();
                },
                saveEditLesson() {
                    axios.put(`/admin/lessons/${this.currentLesson.id}`, {
                        lesson: this.currentLesson
                    })
                        .then(response => {
                            toastr.success('Cập nhật bài giảng thành công');

                            const chapter = this.listChapter.find(item => item.id === parseInt(this.currentLesson.chapter_id));

                            const lesson = chapter.lessons.findIndex(lesson => lesson.id === parseInt(this.currentLesson.id))

                            chapter.lessons[lesson] = response.data.data;

                            modalEdit.hide();

                        })
                        .catch(err => toastr.error('Cập nhật không thành công'));
                },
                saveAddLesson() {
                    axios.post('/admin/lessons', {
                        lesson: this.currentLesson
                    })
                        .then(response => {
                            toastr.success('Thêm mới bài giảng thành công');

                            const chapter = this.listChapter.find(item => item.id === parseInt(this.currentLesson.chapter_id));
                            chapter.lessons.push(response.data.data);
                            modalEdit.hide();
                        })
                        .catch(err => toastr.error('Thêm mới không thành công'));
                },
                addChapter() {
                    this.isEditChapter = false;
                    this.currentChapter = {
                        name: null,
                        course_id: this.course,
                    };
                    modalEditChapter.show();
                },
                saveAddChapter() {
                    axios.post('{{route('chapters.store')}}', this.currentChapter)
                        .then(response => {
                            const chapter = response.data.data;
                            this.listChapter.push(chapter);
                            modalEditChapter.hide();
                        })
                        .catch(err => toastr.error(err.response.message));
                },
                editChapter(id) {
                    this.isEditChapter = true;
                    this.currentChapter = {...this.listChapter.find(item => item.id === id)};
                    modalEditChapter.show();
                },
                saveEditChapter() {
                    axios.put(`/admin/chapters/${this.currentChapter.id}`, {
                        chapter: this.currentChapter
                    })
                        .then(response => {
                            const chapter = response.data.data;
                            const index = this.listChapter.findIndex(item => item.id === chapter.id);
                            this.listChapter[index] = chapter;
                            toastr.success(response.data.message);
                        })
                        .catch(err => toastr.error(error.response.data.message))
                        .finally(() => {
                            modalEditChapter.hide();
                        })
                }

            }
        }

        function updateAll() {
            const listChapter = [];

            $('.list-lesson').each(function (index) {
                const chapter = {};

                chapter.id = parseInt($(this).attr('data-id'));
                chapter.lessons = [];

                $(this).find('.lesson-item').each(function () {
                    chapter.lessons.push(parseInt($(this).attr('data-id')));
                })

                listChapter.push(chapter);
            })

            axios.put('/lessons/order', {
                data: listChapter
            })
                .then(response => {
                    const chapters = response.data.data;
                    console.log('update');
                })
                .catch(err => {
                });

        }


    </script>
@endpush
