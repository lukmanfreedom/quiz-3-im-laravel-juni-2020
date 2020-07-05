@extends('layouts.master')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Articles</h1>

<div class="card">
    <div class="card-header">
        <a href="/article/create" class="btn btn-primary"><i class="fa fa-plus"></i> Add</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Created by</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($articles as $key => $article)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->created_by }}</td>
                    <td class="text-center">
                        <a href="/article/{{ $article->id }}" class="btn btn-success btn-sm"><i class="fa fa-search"></i> Detail</a>
                        <a href="/article/{{ $article->id }}/edit" class="btn btn-primary btn-sm"><i class="far fa-edit"></i> Edit</a>
                        <form action="/article/{{ $article->id }}" method="POST" style="display: inline;">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin nih mau dihapus?')"><i class="far fa-trash-alt"></i> Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script>
    $(function () {
        $("#example1").DataTable();
    });

    Swal.fire({
        title: 'Berhasil!',
        text: 'Memasangkan script sweet alert',
        icon: 'success',
        confirmButtonText: 'Cool'
    })
</script>
@endpush
