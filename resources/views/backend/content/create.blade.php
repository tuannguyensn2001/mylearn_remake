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

        <?php

        $data = \App\Models\Course::all()->map(function ($item) {
            return [
                'key' => $item->id,
                'value' => $item->name
            ];
        })->toArray();

        $input = [
            [
                'label' => 'Nội dung',
                'name' => 'content',
                'id' => 'content',
                'element' => 'input',
                'type' => 'text',
                'value' => old('content'),
                'placeholder' => 'Nhập nội dung',
                'class' => 'form-control'
            ],
            [
                'label' => 'Loại nội dung',
                'name' => 'type',
                'id' => 'type',
                'element' => 'input',
                'type' => 'text',
                'value' => old('type'),
                'placeholder' => 'Nhập loại nội dung',
                'class' => 'form-control'
            ],
            [
                'element' => 'select',
                'label' => 'Khóa học',
                'id' => 'course_id',
                'name' => 'course_id',
                'value' => old('course_id'),
                'placeholder' => 'Chọn khóa học',
                'class' => null,
                'data' => $data
            ]
        ];

        $action = route('contents.store')

        ?>
        <div class="card">
            <form class="form-horizontal" action="{{$action}}" method="post">
                @csrf
                <div class="card-body">
                    <h4 class="card-title">Danh mục</h4>

                    <x-crud.form :input="$input"/>
                    {{--                    <div class="form-group row">--}}
                    {{--                        <label for="fname"--}}
                    {{--                               class="col-sm-3 text-end control-label col-form-label">Tên danh mục</label>--}}
                    {{--                        <div class="col-sm-9">--}}
                    {{--                            <input type="text"--}}
                    {{--                                   class="form-control"--}}
                    {{--                                   id="name"--}}
                    {{--                                   name="name"--}}
                    {{--                                   value="{{old('name')}}"--}}
                    {{--                                   placeholder="Nhập tên danh mục">--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}

                    {{--                    <div class="form-group row">--}}
                    {{--                        <label for="fname"--}}
                    {{--                               class="col-sm-3 text-end control-label col-form-label">Slug</label>--}}
                    {{--                        <div class="col-sm-9">--}}
                    {{--                            <input type="text"--}}
                    {{--                                   class="form-control"--}}
                    {{--                                   id="slug"--}}
                    {{--                                   name="slug"--}}
                    {{--                                   value="{{old('slug')}}"--}}
                    {{--                                   placeholder="Nhập slug">--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}

                    {{--                    <div class="form-group row">--}}
                    {{--                        <label for="cono1"--}}
                    {{--                               class="col-sm-3 text-end control-label col-form-label">Mô tả</label>--}}
                    {{--                        <div class="col-sm-9">--}}
                    {{--                            <textarea--}}
                    {{--                                name="description"--}}
                    {{--                                class="form-control"--}}
                    {{--                                name="description"--}}
                    {{--                                value="{{old('description')}}"--}}
                    {{--                                placeholder="Nhập mô tả" ></textarea>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
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
        $(document).ready(function () {
            const name = document.querySelector('input[name="name"]');
            const slug = document.querySelector('input[name="slug"]');

            name.oninput = event => slug.value = string_to_slug(event.target.value);
        });
    </script>
@endpush
