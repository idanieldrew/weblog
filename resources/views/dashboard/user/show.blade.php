<x-panel-layout>
    <x-slot name="title">
        - user
    </x-slot> <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="header-icon">
                <i class="fa fa-user-plus"></i>
            </div>
            <div class="header-title">
                <h1>Users</h1>
                <small>List of User</small>
            </div>
        </section>
        <!-- Main content -->
        @if (session()->has('success-message'))
            <div>
                <p class="alert alert-success">{{ session()->get('success-message') }}</p>
            </div>
        @endif
        <section class="content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                            <div class="btn-group" id="buttonexport">
                                <a href="#">
                                    <h4>User Details</h4>
                                </a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                            <div class="btn-group">
                                <div class="buttonexport">
                                    <a href="#" class="btn btn-add" data-toggle="modal" data-target="#adduser"><i
                                            class="fa fa-plus"></i> Add Users</a>
                                </div>
                                <button class="btn btn-exp btn-sm dropdown-toggle" data-toggle="dropdown"><i
                                        class="fa fa-bars"></i> Export Table Data</button>
                                <ul class="dropdown-menu exp-drop" role="menu">
                                    <li>
                                        <a href="#"
                                            onclick="$('#dataTableExample1').tableExport({type:'json',escape:'false'});">
                                            <img src="assets/dist/img/json.png" width="24" alt="logo"> JSON</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            onclick="$('#dataTableExample1').tableExport({type:'json',escape:'false',ignoreColumn:'[2,3]'});">
                                            <img src="assets/dist/img/json.png" width="24" alt="logo"> JSON
                                            (ignoreColumn)</a>
                                    </li>
                                    <li><a href="#"
                                            onclick="$('#dataTableExample1').tableExport({type:'json',escape:'true'});">
                                            <img src="assets/dist/img/json.png" width="24" alt="logo"> JSON (with
                                            Escape)</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li><a href="#"
                                            onclick="$('#dataTableExample1').tableExport({type:'xml',escape:'false'});">
                                            <img src="assets/dist/img/xml.png" width="24" alt="logo"> XML</a>
                                    </li>
                                    <li><a href="#" onclick="$('#dataTableExample1').tableExport({type:'sql'});">
                                            <img src="assets/dist/img/sql.png" width="24" alt="logo"> SQL</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#"
                                            onclick="$('#dataTableExample1').tableExport({type:'csv',escape:'false'});">
                                            <img src="assets/dist/img/csv.png" width="24" alt="logo"> CSV</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            onclick="$('#dataTableExample1').tableExport({type:'txt',escape:'false'});">
                                            <img src="assets/dist/img/txt.png" width="24" alt="logo"> TXT</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#"
                                            onclick="$('#dataTableExample1').tableExport({type:'excel',escape:'false'});">
                                            <img src="assets/dist/img/xls.png" width="24" alt="logo"> XLS</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            onclick="$('#dataTableExample1').tableExport({type:'doc',escape:'false'});">
                                            <img src="assets/dist/img/word.png" width="24" alt="logo"> Word</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            onclick="$('#dataTableExample1').tableExport({type:'powerpoint',escape:'false'});">
                                            <img src="assets/dist/img/ppt.png" width="24" alt="logo"> PowerPoint</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#"
                                            onclick="$('#dataTableExample1').tableExport({type:'png',escape:'false'});">
                                            <img src="assets/dist/img/png.png" width="24" alt="logo"> PNG</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            onclick="$('#dataTableExample1').tableExport({type:'pdf',pdfFontSize:'7',escape:'false'});">
                                            <img src="assets/dist/img/pdf.png" width="24" alt="logo"> PDF</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- ./Plugin content:powerpoint,txt,pdf,png,word,xl -->
                            <div class="table-responsive">
                                <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr class="info">
                                            <th>Id</th>
                                            <th>Photo</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Date</th>
                                            <th>Role</th>
                                            <th>status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>
                                                    {{ $user->id }}
                                                </td>
                                                <td><img src="{{ asset('panel/assets/dist/img/m1.png') }}"
                                                        class="img-circle" alt="User Image" width="50" height="50"></td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->phone }}</td>
                                                <td>{{ getStandardFormatDate($user->created_at) }}</td>
                                                <td><span
                                                        class="label-custom label label-default">
                                                        @foreach($user->roles as $role)
                                                        {{ $role->name }}</span>                                                            
                                                        @endforeach
                                                </td>
                                                <td><span class="label-custom label label-default">Active</span>
                                                </td>
                                                <td>
                                                    <a href="{{ route('user.edit', $user->id) }}"
                                                        class="btn btn-add btn-sm" data-toggle="modal">
                                                        <i class="fa fa-pencil">
                                                        </i>
                                                    </a>
                                                    <a href="{{ route('user.destroy', $user->id) }}"
                                                        onclick="destroyUser(event,{{ $user->id }})"
                                                        class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash-o">
                                                        </i>
                                                    </a>
                                                    <form action="{{ route('user.destroy', $user->id) }}"
                                                        method="post" id="delete-{{ $user->id }}"
                                                        style="display: inline">
                                                        @method('delete')
                                                        @csrf
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $users->onEachSide(5)->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- User Modal1 -->

            {{-- <div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3><i class="fa fa-plus m-r-5"></i> Add new User</h3>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-horizontal">
                                        <fieldset>
                                            <!-- Text input-->
                                            <div class="col-md-6 form-group">
                                                <label class="control-label">Photo</label>
                                                <input name="filebutton" class="input-file" type="file">
                                            </div>
                                            <!-- Text input-->
                                            <div class="col-md-6 form-group">
                                                <label class="control-label">User Name</label>
                                                <input type="text" placeholder="User Name" class="form-control">
                                            </div>
                                            <!-- Text input-->
                                            <div class="col-md-6 form-group">
                                                <label class="control-label">status</label>
                                                <input type="text" placeholder="status" class="form-control">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label class="control-label">Type</label>
                                                <input type="text" placeholder="Type" class="form-control">
                                            </div>
                                            <div class="col-md-12 form-group user-form-group">
                                                <div class="pull-right">
                                                    <button type="button" class="btn btn-danger btn-sm">Cancel</button>
                                                    <button type="submit" class="btn btn-add btn-sm">Update</button>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div> --}}
            <!-- /.modal -->
            <!-- Modal -->
            <!-- delete user Modal2 -->
            {{-- <div class="modal fade" id="customer2" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3><i class="fa fa-user m-r-5"></i> Delete User</h3>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <fieldset>
                                        <div class="col-md-12 form-group user-form-group">
                                            <label class="control-label">Delete User</label>
                                            <div class="pull-right">
                                                <button type="button" class="btn btn-danger btn-sm">NO</button>
                                                <a href="{{ route('user.destroy', $user->id) }}"
                                                    onclick="destroyUser(event,{{ $user->id }})"
                                                    class="btn btn-primary btn-sm" id="delete-user">YES</a>
                                                <form action="{{ route('user.destroy', $user->id) }}" method="post"
                                                    id="delete-{{ $user->id }}" style="display: inline">
                                                    @method('delete')
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div> --}}
            <!-- /.modal -->
        </section>
        <!-- /.content -->
    </div>
    <script>
        function destroyUser(event, id) {
            event.preventDefault();
            document.getElementById(`delete-${id}`).submit();
        }

    </script>
</x-panel-layout>
