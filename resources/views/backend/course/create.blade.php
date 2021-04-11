@extends('backend.master')

@push('css')
    <link rel="stylesheet" type="text/css"
          href="{!! asset('assets/backend/admin/assets/libs/select2/dist/css/select2.min.css') !!}">
    <link rel="stylesheet" type="text/css"
          href="{!! asset('assets/backend/admin/assets/libs/quill/dist/quill.snow.css') !!}">
    <style>
        ul{
            margin: 0;
        }
    </style>
@endpush



@section('content')



    <div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card">
            <form class="form-horizontal" action="{{route('courses.store')}}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <h4 class="card-title">Khóa học</h4>
                    <div class="form-group row">
                        <label for="name"
                               class="col-sm-3 text-end control-label col-form-label">Tên khóa học</label>
                        <div class="col-sm-9">
                            <input type="text"
                                   class="form-control"
                                   id="name"
                                   name="name"
                                   value="{{old('name')}}"
                                   placeholder="Nhập tên khóa học">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="slug"
                               class="col-sm-3 text-end control-label col-form-label">Slug</label>
                        <div class="col-sm-9">
                            <input type="text"
                                   class="form-control"
                                   id="slug"
                                   name="slug"
                                   value="{{old('slug')}}"
                                   placeholder="Nhập slug">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="cono1"
                               class="col-sm-3 text-end control-label col-form-label">Mô tả</label>
                        <div class="col-sm-9">
                            <textarea
                                id="description"
                                name="description"
                                class="form-control"
                                value="{{old('description')}}"
                                placeholder="Nhập mô tả"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="price"
                               class="col-sm-3 text-end control-label col-form-label">Giá</label>
                        <div class="col-sm-9">
                            <input type="text"
                                   class="form-control"
                                   id="price"
                                   name="price"
                                   value="{{old('price')}}"
                                   placeholder="Nhập giá khóa học">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tag_id"
                               class="col-sm-3 text-end control-label col-form-label">Chủ đề</label>
                        <div class="col-sm-9">
                            <select class="select2 form-select shadow-none" name="tag_id" id="tag_id">
                                @foreach($tags as $key=>$item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 text-end control-label col-form-label">File Upload</label>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" name="file" class="custom-file-input" id="validatedCustomFile"
                                       >
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="price"
                               class="col-sm-3 text-end control-label col-form-label">Độ khó</label>
                        <div class="col-sm-9">
                            <select class="select2 form-select shadow-none" name="level" id="level">
                                @foreach($_levels as $key=>$level)
                                    <option value="{{ $key }}">{{ $level }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="status" class="col-sm-3 text-end control-label col-form-label">Trạng thái</label>
                        <div class="col-md-9">

                            @foreach($_status as $key=>$status)

                                <div class="form-check">
                                    <input type="radio" class="form-check-input"
                                      value="{{ $key }}"     id="{{ $key }}" name="status" >
                                    <label class="form-check-label mb-0" for="{{ $key }}">
                                        {{ $status }}</label>
                                </div>

                            @endforeach


                        </div>
                    </div>




                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Thêm mới</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection


@push('js')
    <script src="{!! asset('assets/backend/admin/assets/libs/select2/dist/js/select2.full.min.js') !!}"></script>
    <script src="{!! asset('assets/backend/admin/assets/libs/select2/dist/js/select2.min.js') !!}"></script>
    <script src="{!! asset('assets/backend/js/helper/string_to_slug.js') !!}"></script>
    <script src="{!! asset('assets/backend/admin//assets/libs/quill/dist/quill.min.js') !!}"></script>
    <script>
        $(".select2").select2();
        $(document).ready(function () {
            const name = document.querySelector('input[name="name"]');
            const slug = document.querySelector('input[name="slug"]');

            name.oninput = event => slug.value = string_to_slug(event.target.value);
        });
    </script>
@endpush
