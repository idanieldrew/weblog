<x-app-layout>
    <x-slot name="title">
        Register
    </x-slot>
  <!-- Content Wrapper -->
   <div class="login-wrapper">
    <div class="back-link">
        <a href="index.html" class="btn btn-add">Back to Dashboard</a>
    </div>
    <div class="container-center lg">
     <div class="login-area">
        <div class="panel panel-bd panel-custom">
            <div class="panel-heading">
                <div class="view-header">
                    <div class="header-icon">
                        <i class="pe-7s-unlock"></i>
                    </div>
                    <div class="header-title">
                        <h3>Register</h3>
                        <small><strong>Please enter your data to register.</strong></small>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                @if ($errors)
                @foreach ($errors->all() as $e)
                    <ul>
                        <li>{{  $e }}</li>
                    </ul>
                @endforeach
            @endif
                <form action="{{ route('register.store') }}" method="POST" id="loginForm" novalidate>
                    @csrf
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label>name</label>
                            <input type="name" value="" id="username" class="form-control" name="name">
                            <span class="help-block small">Your unique username to app</span>
                        </div>
                        <div class="form-group col-lg-6">
                            <label>Email</label>
                            <input type="email" value="" id="username" class="form-control" name="email">
                            <span class="help-block small">Your unique username to app</span>
                        </div>
                        <div class="form-group col-lg-6">
                            <label>Phone</label>
                            <input type="text" id="username" class="form-control" name="phone">
                            <span class="help-block small">Your unique username to app</span>
                        </div>
                        <div class="form-group col-lg-6">
                            <label>Password</label>
                            <input type="password" value="" id="password" class="form-control" name="password">
                            <span class="help-block small">Your hard to guess password</span>
                        </div>
                        <div class="form-group col-lg-6">
                            <label>Repeat Password</label>
                            <input type="password" value="" id="repeatpassword" class="form-control" name="password_confirmation">
                            <span class="help-block small">Please repeat your pasword</span>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-warning" type="submit">Register</button>
                        <a class="btn btn-add" href="login.html">Login</a>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->
</x-app-layout>