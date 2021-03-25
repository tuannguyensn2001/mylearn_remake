@extends('backend.master')

@push('css')
    <link rel="stylesheet" type="text/css"
          href="{!! asset('assets/backend/admin/assets/libs/select2/dist/css/select2.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/backend/admin/assets/libs/quill/dist/quill.snow.css') !!}">
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
            <form class="form-horizontal" action="{{route('courses.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <h4 class="card-title">Danh mục</h4>
                    <div class="form-group row">
                        <label for="fname"
                               class="col-sm-3 text-end control-label col-form-label">Chủ đề</label>
                        <div class="col-sm-9">
                            <input type="text"
                                   class="form-control"
                                   id="name"
                                   name="name"
                                   value="{{old('name')}}"
                                   placeholder="Nhập tên danh mục">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fname"
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
                        <label class="col-sm-3 text-end control-label col-form-label">File Upload</label>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" name="file" class="custom-file-input" id="validatedCustomFile"
                                       required>
                            </div>
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
