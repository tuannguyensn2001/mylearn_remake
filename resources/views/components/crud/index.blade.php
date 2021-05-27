<div>
    <table id="myTable" class="table  table-bordered">
        <thead>
        <tr>
            @foreach($title as $item)
                <th>{{$item}}</th>
            @endforeach
        </tr>
        </thead>
        <tbody>

        @foreach($input as $key => $item)
            <tr>
                {{--                <td>{{ $key + 1 }}</td>--}}
                {{--                <td>{{ $category->name }}</td>--}}
                {{--                <td>{{ $category->slug }}</td>--}}
                {{--                <td>{{ $category->description }}</td>--}}
                {{--                <td>--}}
                {{--                    <a href="{{route('categories.edit',['category' => $category->id])}}"--}}
                {{--                       class="btn btn-primary">--}}
                {{--                        <i class="fas fa-edit"></i>--}}
                {{--                    </a>--}}
                {{--                    <a href="{{route('categories.destroy',['category' => $category->id])}}"--}}
                {{--                       class="btn btn-warning delete-category">--}}
                {{--                        <i class="fas fa-window-close"></i>--}}
                {{--                    </a>--}}
                {{--                </td>--}}
                @foreach($rows as $number=>$row)
                    <td>{!! $row($item,$key) !!}</td>
                @endforeach
            </tr>
        @endforeach

        </tbody>

    </table>
</div>
