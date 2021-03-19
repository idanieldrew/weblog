<x-panel-layout>
    <x-slot name="title">- edit-user</x-slot>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="header-icon">
                <i class="fa fa-users"></i>
            </div>
            <div class="header-title">
                <h1>Add User</h1>
                <small>User list</small>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- Form controls -->
                <div class="col-sm-12">
                    <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                            <div class="btn-group" id="buttonlist">
                                <a class="btn btn-add " href="clist.html">
                                    <i class="fa fa-list"></i> User List </a>
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
                            <form class="col-sm-6" action="{{ route('user.update',$user->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter Name"
                                        value="{{ $user->name }}" required>
                                    <div>
                                        @error('name')
                                            <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Enter Email"
                                        value="{{ $user->email }}" required>
                                    <div>
                                        @error('email')
                                            <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="number" name="phone" class="form-control" placeholder="Enter Mobile"
                                        value="{{ $user->phone }}" required>
                                    <div>
                                        @error('phone')
                                            <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Customer type</label>
                                    <select class="form-control" name="role">
                                        <option  @if($user->role == 'user') selected @endif> user </option>
                                        <option  @if($user->role == 'owner') selected @endif> owner </option>
                                        <option  @if($user->role == 'admin') selected @endif> admin </option>
                                        <option  @if($user->role == 'author') selected @endif> author </option>
                                    </select>
                                </div>
                                <div class="reset-button">
                                    <a href="#" class="btn btn-warning">Reset</a>
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
