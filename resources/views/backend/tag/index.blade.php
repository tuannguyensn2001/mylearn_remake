@extends('backend.master')

@push('css')
    <link rel="stylesheet" type="text/css"
          href="{!! asset('assets/backend/admin/assets/extra-libs/multicheck/multicheck.css') !!}">
    <link href="{!! asset('assets/backend/admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') !!}"
          rel="stylesheet">

    <style>

    </style>
@endpush

@section('content')


    <div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Danh sách danh mục</h5>
                <div class="table-responsive">
                    <table id="myTable" class="table  table-bordered">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên</th>
                            <th>Slug</th>
                            <th>Danh mục</th>
                            <th>Thao tác</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tags as $key => $tag)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $tag->name }}</td>
                                <td>{{ $tag->slug }}</td>
                                <td>{{ $tag->category->name }}</td>
                                <td>
                                    <a href="{{route('tags.edit',['tag' => $tag->id])}}"
                                       class="btn btn-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{route('tags.destroy',['tag' => $tag->id])}}"
                                       class="btn btn-warning delete-category">
                                        <i class="fas fa-window-close"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>

                    </table>

                </div>
            </div>
        </div>

    </div>

    <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Xóa danh mục</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn chắc chắn muốn xóa danh mục chứ ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-primary accept">Đồng ý</button>
                </div>
            </div>
        </div>
    </div>



@endsection


@push('js')

    <script
        src="{!! asset('assets/backend/admin/assets/extra-libs/multicheck/datatable-checkbox-init.js') !!}"></script>
    <script src="{!! asset('assets/backend/admin/assets/extra-libs/multicheck/jquery.multicheck.js') !!}"></script>
    <script src="{!! asset('assets/backend/admin/assets/extra-libs/DataTables/datatables.min.js') !!}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"
            integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"
            integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG"
            crossorigin="anonymous"></script>
    <script>

        $(document).ready(function () {
            $('#myTable').DataTable({
                'language': {
                    'sLengthMenu': 'Xem _MENU_ bản',
                    'sSearch': 'Tìm kiếm',
                    "info": "Hiển thị trang _PAGE_ của _PAGES_",
                    "paginate": {
                        "previous": 'Trang trước',
                        'next': 'Trang sau'
                    }
                }
            });


            const modal = new bootstrap.Modal(document.querySelector('#categoryModal'));
            const deleteCategoryElement = $('.delete-category');
            const acceptDeleteCategoryElement = $('.accept');
            let categoryDeletePicked = null;

            // deleteCategoryElement.on('click', function (event) {
            //     event.preventDefault();
            //     modal.show();
            //     categoryDeletePicked = $(this).attr('href');
            // })

            $(document).on('click','.delete-category',function(event) {
                event.preventDefault();
                modal.show();
                categoryDeletePicked = $(this).attr('href') || $(this).closest('.delete-category').attr('href');
            })

            acceptDeleteCategoryElement.on('click', function () {
                if (!categoryDeletePicked) {
                    modal.close();
                    return;
                };


                axios.delete(categoryDeletePicked)
                    .then(response => window.location.reload())
                    .catch(err => {
                        console.log(categoryDeletePicked);
                        modal.hide();
                        toastr.error('Có lỗi đã xảy ra, vui lòng thử lại');
                    });

            })




        })
    </script>
@endpush
