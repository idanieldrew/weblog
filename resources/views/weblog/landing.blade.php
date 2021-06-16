<x-app-layout>
    <!-- Start Blog  -->
    <div class="latest-blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>latest blog</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus enim.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-md-6 col-lg-4 col-xl-4">
                        <div class="blog-box">
                            <div class="blog-img">
                                <img class="img-fluid"
                                    src="{{ asset('upload' . '/' . 'post' . '/' . $post['updated_at']->format('d.m.Y') . '/' . $post->banner) }}"
                                    alt="" />
                            </div>
                            <div class="blog-content">
                                <div class="title-blog">
                                    <a href="{{ route('content', $post->slug) }}">
                                        <h3>{{ $post->name }}</h3>
                                    </a>
                                    <p>{!! $post->content !!}</p>
                                </div>
                                <ul class="option-blog">
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Likes"><i
                                                class="far fa-heart"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Views"><i
                                                class="fas fa-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Comments"><i
                                                class="far fa-comments"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{ $posts->appends(request()->query())->links() }}
    <!-- End Blog  -->
</x-app-layout>
