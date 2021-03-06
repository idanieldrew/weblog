<x-app-layout>
    <x-slot name='title'>
        صفحه ورورد
    </x-slot>
    <main class="bg--white">
        <div class="container">
            <div class="sign-page">
                <h1 class="sign-page__title">ثبت نام در وب‌سایت</h1>
                <form class="sign-page__form" action="{{ route('register.store') }}" method="POST">
                    @csrf
                    <div>
                        <input type="text" class="text text--right" placeholder="نام  و نام خانوادگی" name="name">
                        @error('name')
                            <p style="color: red">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div>
                        <input type="text" class="text text--left" placeholder="شماره موبایل" name="phone">
                        @error('phone')
                            <p style="color: red">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div>
                        <input type="email" class="text text--left" placeholder="ایمیل" name="email">
                        @error('email')
                            <p style="color: red">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div>
                        <input type="password" class="text text--left" placeholder="رمز عبور" name="password">
                        @error('password')
                            <p style="color: red">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div>
                        <input type="password" class="text text--left" placeholder="تکرار رمز عبور"
                            name="password_confirmation">
                        <button class="btn btn--blue btn--shadow-blue width-100 mb-10" type="submit">ثبت نام</button>
                        <div class="sign-page__footer">
                            <span>در سایت عضوید ؟ </span>
                            <a href="sign-up.html" class="color--46b2f0">صفحه ورود</a>
                        </div>
                </form>
            </div>
        </div>
    </main>

</x-app-layout>
