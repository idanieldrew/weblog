<x-panel-layout>
    <x-slot name="title">
        | show-posts
    </x-slot> <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="header-icon">
                <i class="fa fa-user-plus"></i>
            </div>
            <div class="header-title">
                <h1>Posts</h1>
                <small>List of Posts</small>
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
                                    <h4>Post Details</h4>
                                </a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                            <div class="btn-group">
                                <div class="buttonexport">
                                    <a href="{{ route('post.create') }}" class="btn btn-add"><i
                                            class="fa fa-plus"></i> Add Posts</a>
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
                                            <th>Banner</th>
                                            <th>Name</th>
                                            <th>User</th>
                                            <th>Content</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($posts as $post)
                                            <tr>
                                                <td>
                                                    {{ $post->id }}
                                                </td>
                                                <td><img src="{{ asset('upload' .'/'.'post'.'/'. $post['updated_at']->format('d.m.Y') . '/' . $post->banner) }}"
                                                        class="img-circle" alt="User Image" width="50" height="50"></td>
                                                <td>{{ $post->name }}</td>
                                                <td>{{ $post->user->name }}</td>
                                                <td>{{ $post->content }}</td>
                                                <td>{{ getStandardFormatDate($post->updated_at) }}</td>
                                                {{-- <td><span class="label-custom label label-default">Active</span> --}}
                                                <td>
                                                    <a href="{{ route('post.edit', $post->id) }}"
                                                        class="btn btn-add btn-sm" data-toggle="modal">
                                                        <i class="fa fa-pencil">
                                                        </i>
                                                    </a>
                                                    <a href="{{ route('post.destroy', $post->id) }}"
                                                        onclick="destroyUser(event,{{ $post->id }})"
                                                        class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash-o">
                                                        </i>
                                                    </a>
                                                    <form action="{{ route('post.destroy', $post->id) }}"
                                                        method="post" id="delete-{{ $post->id }}"
                                                        style="display: none">
                                                        @method('delete')
                                                        @csrf
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $posts->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
