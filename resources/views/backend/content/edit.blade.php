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


        $action = route('contents.update',['content' => $content->id])

        ?>
        <div class="card">
            <form class="form-horizontal" action="{{$action}}" method="post">
                {{method_field('PUT')}}
                @csrf
                <div class="card-body">
                    <h4 class="card-title">Danh mục</h4>

                    <x-crud.form :instance="$content" isEdit="true" :input="$fields"/>
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
