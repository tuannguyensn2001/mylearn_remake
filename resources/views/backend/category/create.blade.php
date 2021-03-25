@extends('backend.master')


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
            <form class="form-horizontal" action="{{route('categories.store')}}" method="post">
                @csrf
                <div class="card-body">
                    <h4 class="card-title">Danh mục</h4>
                    <div class="form-group row">
                        <label for="fname"
                               class="col-sm-3 text-end control-label col-form-label">Tên danh mục</label>
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
                               class="col-sm-3 text-end control-label col-form-label">Mô tả</label>
                        <div class="col-sm-9">
                            <textarea
                                name="description"
                                class="form-control"
                                name="description"
                                value="{{old('description')}}"
                                placeholder="Nhập mô tả" ></textarea>
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

    <script src="{!! asset('assets/backend/js/helper/string_to_slug.js') !!}"></script>
    <script>
        $(document).ready(function(){
            const name = document.querySelector('input[name="name"]');
            const slug = document.querySelector('input[name="slug"]');

            name.oninput = event => slug.value = string_to_slug(event.target.value);
        });
    </script>
@endpush
