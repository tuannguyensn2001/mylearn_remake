@extends('backend.master')

@push('css')
    <style>
        h1 {
            color: red;
        }
    </style>
@endpush

@section('content')

    <div>
        <?php

        $title = [
            'STT',
            'Tên',
            'Loại nội dung',
            'Khóa học',
            'Thao tác'
        ];

        $rows = [
            function ($row, $key) {
                return $key + 1;
            },
            function ($row, $key) {
                return $row->content;
            },
            function ($row, $key) {
                return \App\Defines\Content::getLists()[$row->type];
            },
            function ($row, $key) {
                return $row->course->name;
            },
            function ($row, $key) {
                $routeEdit = route('contents.edit', ['content' => $row->id]);
                return "<a href='{$routeEdit}' class='btn btn-primary'><i class='fas fa-edit'></i></a>
                            <a href='#'  class='btn btn-warning delete-category'><i class='fas fa-window-close'></i></a>";
            }
        ];

        $input = \App\Models\Content::all();

        ?>
        <x-crud.index :rows="$rows" :title="$title" :input="$input"/>
    </div>

@endsection


@push('js')
    <script>

    </script>
@endpush
