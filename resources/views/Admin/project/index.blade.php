@extends('Admin/layouts/master')

@section('title')
    {{($setting->title) ?? ''}} | Projects
@endsection
@section('page_name') Projects @endsection
@section('content')

    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> Projects {{($setting->title) ?? ''}}</h3>
                    <div class="">
                        <button class="btn btn-secondary btn-icon text-white addBtn">
									<span>
										<i class="fe fe-plus"></i>
									</span>Add New
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-striped table-bordered text-wrap w-100" id="dataTable">
                            <thead>
                            <tr class="fw-bolder text-muted bg-light">
                                <th class="min-w-25px">#</th>
                                <th class="min-w-50px">Image</th>
                                <th class="min-w-50px">Title IT</th>
                                <th class="min-w-50px">Title EN</th>
{{--                                <th class="min-w-50px">Description IT</th>--}}
{{--                                <th class="min-w-50px">Description EN</th>--}}
                                <th class="min-w-50px">Machine</th>
                                <th class="min-w-50px">Address</th>
                                <th class="min-w-50px">Year</th>
                                <th class="min-w-50px">Salary</th>
                                <th class="min-w-50px rounded-end">Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!--Delete MODAL -->
        <div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">delete data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input id="delete_id" name="id" type="hidden">
                        <p>Are you sure to delete the following data <span id="title" class="text-danger"></span>?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" id="dismiss_delete_modal">
                            Close
                        </button>
                        <button type="button" class="btn btn-danger" id="delete_btn">delete !</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- MODAL CLOSED -->

        <!-- Create Or Edit Modal -->
        <div class="modal fade" id="editOrCreate" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="example-Modal3">Project data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="modal-body">

                    </div>
                </div>
            </div>
        </div>
        <!-- Create Or Edit Modal -->
    </div>
    @include('Admin/layouts/myAjaxHelper')
@endsection
@section('ajaxCalls')
    <script>
        var columns = [
            {data: 'id', name: 'id'},
            {data: 'image', name: 'image'},
            {data: 'title_it', name: 'title_it'},
            {data: 'title_en', name: 'title_en'},
            // {data: 'description_it', name: 'description_it'},
            // {data: 'description_en', name: 'description_en'},
            {data: 'machine', name: 'machine'},
            {data: 'address', name: 'address'},
            {data: 'year', name: 'year'},
            {data: 'salary', name: 'salary'},

            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
        showData('{{route('project.index')}}', columns);
        // Delete Using Ajax
        deleteScript('{{route('project.delete')}}');
        // Add Using Ajax
        showAddModal('{{route('project.create')}}');
        addScript();
        // Add Using Ajax
        showEditModal('{{route('project.edit',':id')}}');
        editScript();
    </script>
@endsection


