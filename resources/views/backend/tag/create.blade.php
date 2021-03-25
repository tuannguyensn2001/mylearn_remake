@extends('backend.master')

@push('css')
    <link rel="stylesheet" type="text/css"
          href="{!! asset('assets/backend/admin/assets/libs/select2/dist/css/select2.min.css') !!}">
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
            <form class="form-horizontal" action="{{route('tags.store')}}" method="post">
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
                        <label for="cono1"
                               class="col-sm-3 text-end control-label col-form-label">Danh mục</label>
                        <div class="col-sm-9">
                            <select class="select2 form-select shadow-none"
                                    value="{{old('category_id')}}"
                                    name="category_id"
                                    style="width: 100%; height:36px;">

                                @foreach($categories as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach

                            </select>
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
    <script>
        $(".select2").select2();
        $(document).ready(function () {
            const name = document.querySelector('input[name="name"]');
            const slug = document.querySelector('input[name="slug"]');

            name.oninput = event => slug.value = string_to_slug(event.target.value);
        });
    </script>
@endpush
