<x-panel-layout>
    {{-- <x-slot name="headers">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </x-slot> --}}
    <x-slot name="title">
        | Show-category
    </x-slot> <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="header-icon">
                <i class="fa fa-user-plus"></i>
            </div>
            <div class="header-title">
                <h1>Category</h1>
                <small>List of Category</small>
            </div>
        </section>
        <!-- Main content -->
        @if (session()->has('success-message'))
            <div>
                <p class="alert alert-success" style="width: 200px">{{ session()->get('success-message') }}</p>
            </div>
        @endif
        <section class="content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                            <div class="btn-group" id="buttonexport">
                                <a href="#">
                                    <h4>Categories Details</h4>
                                </a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                            <div class="btn-group">
                                <div class="buttonexport">
                                    <a href="#" class="btn btn-add" data-toggle="modal" data-target="#adduser"><i
                                            class="fa fa-plus"></i> Add Category</a>
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
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th>Category</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="category_list" name="category_list">
                                        @foreach ($categories as $category)
                                            <tr id="category{{ $category->id }}">
                                                <td>
                                                    {{ $category->id }}
                                                </td>
                                                <td>{{ $category->name }}</td>
                                                <td>{{ $category->slug }}</td>
                                                <td>{{ $category->getParentName() }}</td>
                                                <td>
                                                    <a href="{{ route('category.edit', $category->id) }}"
                                                        class="btn btn-add btn-sm" data-toggle="modal">
                                                        <i class="fa fa-pencil">
                                                        </i>
                                                    </a>
                                                    {{-- z
                                                    <form action="{{ route('category.destroy', $category->id) }}"
                                                        method="post" style="display: inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="btn btn-danger" type="submit" id="btn-destroy" value="destroy">
                                                            <i class="fa fa-trash-o">
                                                            </i>
                                                        </button>
                                                    </form> --}}
                                                    <button class="deleteRecord btn btn-danger"
                                                        data-id="{{ $category->id }}">
                                                        <i class="fa fa-trash-o">
                                                        </i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $categories->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <!-- Form controls -->
                <div class="col-sm-12">
                    <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                            <div class="btn-group" id="buttonlist">
                                <a class="btn btn-add " href="clist.html">
                                    <i class="fa fa-list"></i> Category List </a>
                            </div>
                        </div>
                        <div class="panel-body">
                            @if ($errors)
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>
                                            {{ $error }}
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                            <form class="col-sm-6" action="{{ route('category.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" id="name" value="" class="form-control"
                                        placeholder="Enter Name" required>
                                    <div>
                                        @error('name')
                                            <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>slug</label>
                                    <input type="text" name="slug" value="" id="slug" class="form-control"
                                        placeholder="Enter slug" required>
                                    <div>
                                        @error('slug')
                                            <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Customer type</label>
                                    <select class="form-control" id="category_id" name="category_id">
                                        <option value="">grand</option>
                                        @foreach ($categoryName as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="reset-button">
                                    @can('edit articles')
                                        <a href="#" class="btn btn-warning">Reset</a>
                                    @endcan
                                    <button type="button" class="btn btn-success" id="btn-save"
                                        value="save">Save</button>
                                    <input type="hidden" id="todo_id" name="todo_id" value="0">

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-panel-layout>
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> --}}

<script src="{{ asset('weblog/js/ajax.js') }}"></script>

{{-- <x-slot name="scripts">
    </x-slot> --}}
