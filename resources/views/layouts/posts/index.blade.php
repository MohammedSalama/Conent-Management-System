@extends('layouts.admin.master')
@section('css')
@endsection

@section('title')
    Posts
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6"> Posts <h4 class="mb-0"> </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color"> Postss </a></li>
                    <li class="breadcrumb-item active">Settings</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @include('message')
    <!-- row -->
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    <button class="btn btn-success btn-sm" title="create" data-toggle="modal"
                            data-target="#createpost" >
                        Create Post </button>
                    @include('layouts.posts.create')
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Photo</th>
                                <th>Category name</th>
                                <th>Processes</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $posts)
                                <tr>
                                    <td>{{ $loop -> iteration }}</td>
                                    <td>{{ $posts -> title }}</td>
                                    <td>{{ $posts -> content }}</td>
                                    <td>{{ $posts -> category -> name}}</td>
                                    <td>{{ $posts -> featured }}</td>
                                    <td>
                                        <button class="btn btn-danger btn-sm" data-post_id="{{$posts->id}}"
                                                data-toggle="modal" data-target="#deletedpost"><i
                                                class="fa fa-trash"></i></button>

                                        <button class="btn btn-success btn-sm" title="Edit" data-toggle="modal"
                                                data-target="#Editpost{{$posts->id}}" ><i
                                                class="fa fa-edit"></i></button>

                                        @include('layouts.posts.deleted')

                                        @include('layouts.posts.edit')

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <script>
        $('#deletedpost').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var post_id = button.data('post_id')
            var modal = $(this)
            modal.find('.modal-body #post_id').val(post_id);
        })
    </script>
@endsection
