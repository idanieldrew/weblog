<x-panel-layout>
    <x-slot name="headers">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </x-slot>
    <x-slot name="title">| add-category</x-slot>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="header-icon">
                <i class="fa fa-users"></i>
            </div>
            <div class="header-title">
                <h1>Add category</h1>
                <small>Category
                    Category list</small>
            </div>
        </section>

        @if (session()->has('success-message'))
            <div>
                <p class="alert alert-successfully">{{ session()->get('succss-message') }}</p>
            </div>
    @endif
    <!-- Main content -->
        <section class="content">
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
                                    <input type="text" name="name" id="name" value="" class="form-control" placeholder="Enter Name"
                                           required>
                                    <div>
                                        @error('name')
                                        <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                {{-- <div class="form-group">
                                    <label>slug</label>
                                    <input type="text" name="slug" value="" id="slug" class="form-control" placeholder="Enter slug"
                                           required>
                                    <div>
                                        @error('slug')
                                        <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div> --}}
                                <div class="form-group">
                                    <label>Customer type</label>
                                    <select class="form-control" id="category_id" name="category_id">
                                        <option value="">grand</option>
                                        @foreach($categoryName as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="reset-button">
                                    @can('edit articles')
                                        <a href="#" class="btn btn-warning">Reset</a>
                                    @endcan
                                    <button type="submit" class="btn btn-success" id="btn-save" value="save">Save</button>
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
<x-slot name="scripts">
    <script src="{{ asset('weblog/js/ajax.js') }}"></script>
</x-slot>
