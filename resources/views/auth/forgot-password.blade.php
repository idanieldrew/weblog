<x-app-layout>
    <x-slot name="title">
        Forget password
    </x-slot>
    <!-- Content Wrapper -->
    <div class="login-wrapper">
        <div class="container-center">
            <div class="login-area">
                <div class="panel panel-bd panel-custom">
                    <div class="panel-heading">
                        <div class="view-header">
                            <div class="header-icon">
                                <i class="pe-7s-refresh-2"></i>
                            </div>
                            <div class="header-title">
                                <h3>Password Reset</h3>
                                <small><strong>Please fill the form to recover your password</strong></small>
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
                        <form action="{{ route('password.email') }}" method="POST">
                            @csrf
                            <p>Fill with your mail to receive instructions on how to reset your password.</p>
                            <div class="form-group">
                                <label class="control-label" for="username">Email</label>
                                <input type="text" placeholder="example@gmail.com" title="Please enter you email adress"
                                    name="email" id="username" class="form-control">
                                <span class="help-block small">Your registered email address</span>
                            </div>
                            <div>
                                <button class="btn btn-add" type="submit">Reset Pssword</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
