<x-app-layout>
    <x-slot name="title">
        | {{ $post->slug }}
    </x-slot>
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
                <div class="col-lg-6">
                    <h2 class="noo-sh-title"><span>{{ $post->name }}</span></h2>
                    <p>
                        {!! $post->content !!}
                    </p>
                </div>
                {{-- <div class="container">
                    <div class="row ">
                        <h3>Comments</h3>
                    </div>
                </div>

                <form class="col-sm-6" action="{{ route('contentp.store') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" value="{{ $post->id }}" name="post_id">
                    <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
                    <div class="form-group">
                        <label>Write Comment ..</label>
                        <textarea class="form-control" name="content" rows="3"></textarea>
                    </div>
                    <button class="btn btn-success" type="submit">Submit</button>
                </form>
                
                <div class="container mb-5 mt-5">
                    <div class="card">
                        <div class="row">
                            @foreach ($post->comments as $comment)
                            <div class="col-md-12">
                                    @if ($comment->comment_id == null)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="media"><img class="mr-3 rounded-circle"
                                                        alt="Bootstrap Media Preview"
                                                        src="{{ asset('Avatar/avatar5.png') }}" />
                                                    <div class="media-body">
                                                        <div class="row">
                                                            <div class="col-8 d-flex">
                                                                <h5>Maria Smantha<span>-
                                                                        {{ $comment->created_at->diffForHumans() }}</span>
                                                                </h5>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="pull-right reply"><a href="#"><span><i
                                                                                class="fa fa-reply"></i>
                                                                            reply</span></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{ $comment->content }}
                                    @endif
                                    @if ($comment->replies()->count() > 0)
                                        @foreach ($comment->replies as $reply)
                                            <div class="media mt-4"><a class="pr-3" href="#"><img class="rounded-circle"
                                                        alt="Bootstrap Media Another Preview"
                                                        src="{{ asset('Avatar/avatar5.png') }}" /></a>
                                                <div class="media-body">
                                                    <div class="row">
                                                        <div class="col-12 d-flex">
                                                            <h5>Simona Disa</h5><span>-
                                                                {{ $reply->created_at->diffForHumans() }}</span>
                                                        </div>
                                                    </div>
                                                    {{ $reply->content }}
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach --}}
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <style>
    </style>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</x-app-layout>
