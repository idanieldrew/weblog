<x-app-layout>
    <x-slot name="title">
        | {{ $post->slug }}
    </x-slot>
    <div id="app">
        <div class="top-search">
            <div class="container">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input type="text" class="form-control" placeholder="Search">
                    <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                </div>
            </div>
        </div>
        <!-- End Top Search -->

        <!-- Start All Title Box -->
        <div class="all-title-box">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>{{ $post->slug }}</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">{{ $post->slug }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End All Title Box -->

        <!-- Start About Page  -->
        <div class="about-box-main">
            <div class="container">
                <div class="row">
                    @auth()
                        <like-component :post="{{ $post->id }}"></like-component>
                    @endauth
                    @guest
                        <p>You can't like this post,so first <a href="{{ route('login') }}">Login</a></p>
                    @endguest
                    <div class="col-lg-6">
                        <h2 class="noo-sh-title"><span>{{ $post->name }}</span></h2>
                        <p>
                            {!! $post->content !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <h2>COMMENTS</h2>
            @auth()
                @include('weblog.Comment', ['comments' => $post->comments, 'post_id' => $post->id])
            </div>
            <div class="card-body">
                <h5>Leave a comment</h5>
                <form method="post" action="{{ route('comment.add') }}">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="comment" class="form-control" />
                        <input type="hidden" name="post_id" value="{{ $post->id }}" />
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;"
                            value="Add Comment" />
                    </div>
                </form>
            </div>
        @endauth
        @guest
            <p>You can't like this post,so first <a href="{{ route('login') }}">Login</a></p>
        @endguest

    </div>
    <style>
    </style>
</x-app-layout>
