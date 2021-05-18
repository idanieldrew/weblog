<x-panel-layout>
    <x-slot name="title">| add-post</x-slot>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="header-icon">
                <i class="fa fa-users"></i>
            </div>
            <div class="header-title">
                <h1>Edit Post</h1>
                <small>Post
                    Post list</small>
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
                                    <i class="fa fa-list"></i> Post List </a>
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
                            <form class="col-sm-6" action="{{ route('post.update', $post->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter Name"
                                        value="{{ $post->name }}">
                                    <div>
                                        @error('name')
                                            <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Categories</label>
                                    <div class="input-categories">
                                        <ul>

                                        </ul>
                                        <input type="text" name="categories[]" value="{{ $categoryName }}" />
                                    </div>
                                    <div>
                                        @error('categories')
                                            <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Gallery</label>
                                    <input type="file" name="banner">
                                    <div>
                                        @error('banner')
                                            <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Content</label>
                                    <textarea class="form-control" name="content"
                                        rows="3">{!! $post->content !!}</textarea>
                                </div>
                                <div class="reset-button">
                                    {{-- @can('edit articles')
                                                    <a href="#" class="btn btn-warning">Reset</a>
                                                @endcan --}}
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-panel-layout>

<style>
    * {
        margin: 0px;
        padding: 0px;
    }

    .input-categories {
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
    }

    .input-categories ul {
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        list-style-type: none;
        flex-wrap: wrap;
    }

    .input-categories li {
        border: 1px solid black;
        border-radius: 2px;
        padding: 1px;
        margin: 1px;
    }

    .input-categories input {
        flex: 1 1 auto;
        align-self: flex-start;
    }

</style>
<script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    var es = document.querySelectorAll('.input-categories');
    for (var i = 0; i < es.length; i++) {
        es[i]._list = es[i].querySelector('ul');
        es[i]._input = es[i].querySelector('input');
        es[i]._input._icategories = es[i];
        es[i].onkeydown = function(e) {
            var e = event || e;
            if (e.keyCode == 13) {
                var c = e.target._icategories;
                var li = document.createElement('li');
                li.innerHTML = c._input.value;
                c._list.appendChild(li);
                c._input.value = '';
                e.preventDefault();
            }
        }
    }
    CKEDITOR.replace('content', {
        filebrowserUploadUrl: '{{ route('ck-upload', ['_token' => csrf_token()]) }}',
        filebrowserUploadMethod: 'form'
    })

</script>
