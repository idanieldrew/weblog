<x-app-layout>
    <x-slot name='title'>
        بازیابی رمز عبور
    </x-slot>
    <main class="bg--white">
        <div class="container">
            <div class="sign-page">
                <h1 class="sign-page__title">بازیابی رمز عبور</h1>

                <form class="sign-page__form" action="{{ route('password.email') }}" method="POST">
                    @csrf
                    <input name="email" type="email" class="text text--left" placeholder="ایمیل">

                    <button class="btn btn--blue btn--shadow-blue width-100" type="submit">بازیابی</button>
                    <div class="sign-page__footer">
                        <span>کاربر جدید هستید؟</span>
                        <a href="register.html" class="color--46b2f0">صفحه ثبت نام</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
</x-app-layout>
