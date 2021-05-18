<x-panel-layout>
    <x-slot name="title">
        | Comments
    </x-slot> <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="header-icon">
                <i class="fa fa-user-plus"></i>
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
                                    <h4>Comment Details</h4>
                                </a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                    <thead>
                                    <tr class="info">
                                        <th>Id</th>
                                        <th>Post</th>
                                        <th>User</th>
                                        <th>Reply</th>
                                        <th>Content</th>
                                        <th>Action</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($comments as $comment)
                                        <tr>
                                            <td>{{ $comment->id }}</td>
                                            <td>{{ $comment->post->name }}</td>
                                            <td>{{ $comment->user->name }}</td>
                                            <td>{{ $comment->replies_count }}
                                            </td>
                                            <a href="#">
                                                <td>{{ \Illuminate\Support\Str::limit($comment->content,4) }}</td>pane
                                            </a>
                                            <td>
                                                <label class="switch">
                                                    <input type="checkbox" name="featured"
                                                           {{ $comment->showFeatured() }}
                                                           onclick="updateStatus(event,{{ $comment->id }})">
                                                    <span class="slider round"></span>
                                                </label>
                                                <form action="{{ route('comment.update', $comment->id) }}"
                                                      method="POST" id="status-comment-{{ $comment->id }}">
                                                    @csrf
                                                    @method('put')
                                                </form>
                                                <form action="{{ route('comment.destroy', $comment->id) }}"
                                                      method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger">
                                                        <i class="fa fa-trash-o">
                                                        </i>
                                                    </button>
                                                </form>
                                            </td>
                                            <td>{{ getStandardFormatDate($comment->created_at) }}</td>
                                            {{-- <td><span class="label-custom label label-default">Active</span> --}}
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{ $comments->links() }}
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

        function updateStatus(event, id) {
            event.preventDefault();
            document.getElementById(`status-comment-${id}`).submit();
        }

    </script>
</x-panel-layout>
<style>
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #cshocc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked + .slider {
        background-color: #2196F3;
    }

    input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }

</style>
