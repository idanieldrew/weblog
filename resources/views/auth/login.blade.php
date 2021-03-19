<x-app-layout>
    <x-slot name="title">
        Login
    </x-slot>
    <!-- Content Wrapper -->
    <div class="login-wrapper">
        {{-- <div class="back-link">
        <a href="index.html" class="btn btn-add">Back to Dashboard</a>
    </div> --}}
        <div class="container-center">
            <div class="login-area">
                <div class="panel panel-bd panel-custom">
                    <div class="panel-heading">
                        <div class="view-header">
                            <div class="header-icon">
                                <i class="pe-7s-unlock"></i>
                            </div>
                            <div class="header-title">
                                <h3>Login</h3>
                                <small><strong>Please enter your credentials to login.</strong></small>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if ($errors)
                            @foreach ($errors->all() as $e)
                                <ul>
                                    <li>{{ $e }}</li>
                                </ul>
                            @endforeach
                        @endif
                        <form action="{{ route('login.store') }}" id="loginForm" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="control-label" for="username">Username/Phone</label>
                                <input type="email" placeholder="example@gmail.com" name="email" id="username"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" title="Please enter your password" name="password" id="password"
                                    class="form-control">
                            </div>
                            <div>
                                <button class="btn btn-add" type="submit">Login</button>
                                <a class="btn btn-warning" href="register.html">Register</a>
                                <a class="btn btn-warning" href="{{ route('password.request') }}">Forget Password</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
