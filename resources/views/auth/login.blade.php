<x-app-layout>
    <x-slot name='title'>
        صفحه لاگین
    </x-slot>
    <main class="bg--white">
        <div class="container">
            <div class="sign-page">
                <h1 class="sign-page__title">ورود به وب‌سایت</h1>
                <form class="sign-page__form" action="{{ route('login.store') }}" method="post">
                    @csrf
                    <input type="text" name="email" class="text text--left" placeholder="شماره یا ایمیل">
                    @error('email')
                        <p style="color: red">
                            {{ $message }}
                        </p>
                    @enderror
                    <input type="password" name="password" class="text text--left" placeholder="رمز عبور">
                    @error('password')
                        <p style="color: red">
                            {{ $message }}
                        </p>
                    @enderror
                    <label class="checkbox text--right">
                        <input type="checkbox" class="checkbox__filter">
                        <span class="checkbox__mark position-relative"></span>
                        مرا بخاطر بسپار
                    </label>
                    <a class="recover-password" href="{{ route('password.request') }}">بازیابی رمز عبور</a>
                    <button class="btn btn--blue btn--shadow-blue width-100" type="submit">ورود به سایت</button>
                    <div class="sign-page__footer">
                        <span>کاربر جدید هستید؟</span>
                        <a href="sign-in.html" class="color--46b2f0">صفحه ثبت نام</a>
                    </div>
                </form>
            </div>
        </div>

    </main>
</x-app-layout>
