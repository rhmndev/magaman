@extends('front.master')
@section('content')

    <body class="font-[Poppins] pb-[72px]">
        <x-navbar />
        <nav id="Category" class="max-w-[1130px] mx-auto flex justify-center items-center gap-4 mt-[30px]">
            @foreach ($categories as $category)
                <a href="{{ route('front.category', $category->slug) }}"
                    class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">
                    <div class="w-6 h-6 flex shrink-0">
                        <img src="{{ Storage::url($category->icon) }}" alt="icon" />
                    </div>
                    <span>{{ $category->name }}</span>
                </a>
            @endforeach
        </nav>
        <section id="Featured" class="mt-[30px]">
            <div class="main-carousel w-full">
                @forelse($featured_articles as $article)
                    <div class="featured-news-card relative w-full h-[550px] flex shrink-0 overflow-hidden">
                        <img src="{{ Storage::url($article->thumbnail) }}"
                            class="thumbnail absolute w-full h-full object-cover" alt="icon" />
                        <div class="w-full h-full bg-gradient-to-b from-[rgba(0,0,0,0)] to-[rgba(0,0,0,0.9)] absolute z-10">
                        </div>
                        <div
                            class="card-detail max-w-[1130px] w-full mx-auto flex items-end justify-between pb-10 relative z-20">
                            <div class="flex flex-col gap-[10px]">
                                <p class="text-white">Featured</p>
                                <a href="{{ route('front.details', $article->slug) }}"
                                    class="font-bold text-4xl leading-[45px] text-white two-lines hover:underline transition-all duration-300">{{ $article->name }}</a>
                                <p class="text-white">{{ $article->created_at->format('M d, Y') }} •
                                    {{ $article->category->name }}</p>
                            </div>
                            <div class="prevNextButtons flex items-center gap-4 mb-[60px]">
                                <button
                                    class="button--previous appearance-none w-[38px] h-[38px] flex items-center justify-center rounded-full shrink-0 ring-1 ring-white hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300">
                                    <img src="assets/images/icons/arrow.svg" alt="arrow" />
                                </button>
                                <button
                                    class="button--next appearance-none w-[38px] h-[38px] flex items-center justify-center rounded-full shrink-0 ring-1 ring-white hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300 rotate-180">
                                    <img src="assets/images/icons/arrow.svg" alt="arrow" />
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>Belum ada data terbaru....</p>
                @endforelse
            </div>
        </section>
        <section id="Up-to-date" class="max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-[70px]">
            <div class="flex justify-between items-center">
                <h2 class="font-bold text-[26px] leading-[39px]">
                    Latest Hot News <br />
                    Good for Curiousity
                </h2>
                <p
                    class="badge-orange rounded-full p-[8px_18px] bg-[#FFECE1] font-bold text-sm leading-[21px] text-[#FF6B18] w-fit">
                    UP TO DATE</p>
            </div>
            <div class="grid grid-cols-3 gap-[30px]">

                @forelse($articles as $article)
                    <a href="{{ route('front.details', $article->slug) }}" class="card-news">
                        <div
                            class="rounded-[20px] ring-1 ring-[#EEF0F7] p-[26px_20px] flex flex-col gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300 bg-white">
                            <div
                                class="thumbnail-container w-full h-[200px] rounded-[20px] flex shrink-0 overflow-hidden relative">
                                <p
                                    class="badge-white absolute top-5 left-5 rounded-full p-[8px_18px] bg-white font-bold text-xs leading-[18px] uppercase">
                                    {{ $article->category->name }}</p>
                                <img src="{{ Storage::url($article->thumbnail) }}" class="object-cover w-full h-full"
                                    alt="thumbnail" />
                            </div>
                            <div class="card-info flex flex-col gap-[6px]">
                                <h3 class="font-bold text-lg leading-[27px]">{{ $article->name }}</h3>
                                <p class="text-sm leading-[21px] text-[#A3A6AE]">
                                    {{ $article->created_at->format('M d, Y') }}</p>
                            </div>
                        </div>
                    </a>
                @empty
                    <p>Belum ada data terbaru....</p>
                @endforelse
            </div>
        </section>
        <section id="Best-authors" class="max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-[70px]">
            <div class="flex flex-col text-center gap-[14px] items-center">
                <p
                    class="badge-orange rounded-full p-[8px_18px] bg-[#FFECE1] font-bold text-sm leading-[21px] text-[#FF6B18] w-fit">
                    BEST AUTHORS</p>
                <h2 class="font-bold text-[26px] leading-[39px]">
                    Explore All Masterpieces <br />
                    Written by People
                </h2>
            </div>
            <div class="grid grid-cols-6 gap-[30px]">
                @forelse ($authors as $author)
                    <a href="{{ route('front.author', $author->slug) }}" class="card-authors">
                        <div
                            class="rounded-[20px] border border-[#EEF0F7] p-[26px_20px] flex flex-col items-center gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300">
                            <div class="w-[70px] h-[70px] flex shrink-0 rounded-full overflow-hidden">
                                <img src="{{ Storage::url($author->avatar) }}" class="object-cover w-full h-full"
                                    alt="avatar" />
                            </div>
                            <div class="flex flex-col gap-1 text-center">
                                <p class="font-semibold">{{ $author->name }}</p>
                                <p class="text-sm leading-[21px] text-[#A3A6AE]">{{ $author->news->count() }}</p>
                            </div>
                        </div>
                    </a>
                @empty
                    <p>Belum ada data terbaru....</p>
                @endforelse
            </div>
        </section>
        <section id="Advertisement" class="max-w-[1130px] mx-auto flex justify-center mt-[70px]">
            <div class="flex flex-col gap-3 shrink-0 w-fit">
                <a href="{{ $banner_ads->link }}">
                    <div class="w-[900px] h-[120px] flex shrink-0 border border-[#EEF0F7] rounded-2xl overflow-hidden">
                        <img src="{{ Storage::url($banner_ads->thumbnail) }}" class="object-cover w-full h-full"
                            alt="ads" />
                    </div>
                </a>
                <p class="font-medium text-sm leading-[21px] text-[#A3A6AE] flex gap-1">
                    Our Advertisement <a href="#" class="w-[18px] h-[18px]"><img
                            src="assets/images/icons/message-question.svg" alt="icon" /></a>
                </p>
            </div>
        </section>
        <section id="Latest-entertainment" class="max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-[70px]">
            <div class="flex justify-between items-center">
                <h2 class="font-bold text-[26px] leading-[39px]">
                    Latest For You <br />
                    in Entertainment
                </h2>
                {{-- Untuk navigasi category entertainment --}}
                <a href="{{ route('front.category', $categories->where('slug', 'entertainment')->first()->slug) }}"
                    class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">Explore
                    All</a>
            </div>
            <div class="flex justify-between items-center h-fit">
                <div class="featured-news-card relative w-full h-[424px] flex flex-1 rounded-[20px] overflow-hidden">
                    <img src="{{ Storage::url($entertainment_featured_articles->thumbnail) }}"
                        class="thumbnail absolute w-full h-full object-cover" alt="icon" />
                    <div class="w-full h-full bg-gradient-to-b from-[rgba(0,0,0,0)] to-[rgba(0,0,0,0.9)] absolute z-10">
                    </div>
                    <div class="card-detail w-full flex items-end p-[30px] relative z-20">
                        <div class="flex flex-col gap-[10px]">
                            <p class="text-white">Featured</p>
                            <a href="{{ route('front.details', $entertainment_featured_articles->slug) }}"
                                class="font-bold text-[30px] leading-[36px] text-white hover:underline transition-all duration-300">
                                {{ $entertainment_featured_articles->name }}</a>
                            <p class="text-white">{{ $entertainment_featured_articles->created_at->format('M d, Y') }}</p>
                        </div>
                    </div>
                </div>
                <div class="h-[424px] w-fit px-5 overflow-y-scroll overflow-x-hidden relative custom-scrollbar">
                    <div class="w-[455px] flex flex-col gap-5 shrink-0">

                        @forelse($entertainment_articles as $article)
                            <a href="{{ route('front.details', $article->slug) }}" class="card py-[2px]">
                                <div
                                    class="rounded-[20px] border border-[#EEF0F7] p-[14px] flex items-center gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300">
                                    <div class="w-[130px] h-[100px] flex shrink-0 rounded-[20px] overflow-hidden">
                                        <img src="{{ Storage::url($article->thumbnail) }}"
                                            class="object-cover w-full h-full" alt="thumbnail" />
                                    </div>
                                    <div class="flex flex-col justify-center-center gap-[6px]">
                                        <h3 class="font-bold text-lg leading-[27px]">{{ substr($article->name, 0, 50) }}
                                            {{ strlen($article->name) > 50 ? '...' : '' }}</h3>
                                        <p class="text-sm leading-[21px] text-[#A3A6AE]">
                                            {{ $article->created_at->format('M d, Y') }}</p>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <p>Belum ada data terbaru....</p>
                        @endforelse
                    </div>
                    <div
                        class="sticky z-10 bottom-0 w-full h-[100px] bg-gradient-to-b from-[rgba(255,255,255,0.19)] to-[rgba(255,255,255,1)]">
                    </div>
                </div>
            </div>
        </section>
        <section id="Latest-business" class="max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-[70px]">
            <div class="flex justify-between items-center">
                <h2 class="font-bold text-[26px] leading-[39px]">
                    Latest For You <br />
                    in Business
                </h2>
                {{-- Untuk navigasi category Business --}}
                <a href="{{ route('front.category', $categories->where('slug', 'business')->first()->slug) }}"
                    class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">Explore
                    All</a>
            </div>
            <div class="flex justify-between items-center h-fit">
                <div class="featured-news-card relative w-full h-[424px] flex flex-1 rounded-[20px] overflow-hidden">
                    <img src="{{ Storage::url($business_featured_articles->thumbnail) }}"
                        class="thumbnail absolute w-full h-full object-cover" alt="icon" />
                    <div class="w-full h-full bg-gradient-to-b from-[rgba(0,0,0,0)] to-[rgba(0,0,0,0.9)] absolute z-10">
                    </div>
                    <div class="card-detail w-full flex items-end p-[30px] relative z-20">
                        <div class="flex flex-col gap-[10px]">
                            <p class="text-white">Featured</p>
                            <a href="{{ route('front.details', $business_featured_articles->slug) }}"
                                class="font-bold text-[30px] leading-[36px] text-white hover:underline transition-all duration-300">{{ $business_featured_articles->name }}</a>
                            <p class="text-white">{{ $business_featured_articles->created_at->format('M d, Y') }}</p>
                        </div>
                    </div>
                </div>
                <div class="h-[424px] w-fit px-5 overflow-y-scroll overflow-x-hidden relative custom-scrollbar">
                    <div class="w-[455px] flex flex-col gap-5 shrink-0">
                        $@forelse ($business_articles as $article)
                            {{-- Masuk kehalaman artikel featured --}}
                            <a href="{{ route('front.details', $article->slug) }}" class="card py-[2px]">
                                <div
                                    class="rounded-[20px] border border-[#EEF0F7] p-[14px] flex items-center gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300">
                                    <div class="w-[130px] h-[100px] flex shrink-0 rounded-[20px] overflow-hidden">
                                        <img src="{{ Storage::url($article->thumbnail) }}"
                                            class="object-cover w-full h-full" alt="thumbnail" />
                                    </div>
                                    <div class="flex flex-col justify-center-center gap-[6px]">
                                        <h3 class="font-bold text-lg leading-[27px]">{{ substr($article->name, 0, 50) }}
                                            {{ strlen($article->name) > 50 ? '...' : '' }}</h3>
                                        <p class="text-sm leading-[21px] text-[#A3A6AE]">
                                            {{ $article->created_at->format('M d, Y') }}</p>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <p>Belum ada data terbaru....</p>
                        @endforelse
                    </div>
                    <div
                        class="sticky z-10 bottom-0 w-full h-[100px] bg-gradient-to-b from-[rgba(255,255,255,0.19)] to-[rgba(255,255,255,1)]">
                    </div>
                </div>
            </div>
        </section>
        <section id="Latest-automotive" class="max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-[70px]">
            <div class="flex justify-between items-center">
                <h2 class="font-bold text-[26px] leading-[39px]">
                    Latest For You <br />
                    in Automotive
                </h2>
                {{-- Untuk navigasi category automotive --}}
                <a href="{{ route('front.category', $categories->where('slug', 'automotive')->first()->slug) }}"
                    class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">Explore
                    All</a>
            </div>
            <div class="flex justify-between items-center h-fit">
                <div class="featured-news-card relative w-full h-[424px] flex flex-1 rounded-[20px] overflow-hidden">
                    <img src="{{ Storage::url($automotive_featured_articles->thumbnail) }}"
                        class="thumbnail absolute w-full h-full object-cover" alt="icon" />
                    <div class="w-full h-full bg-gradient-to-b from-[rgba(0,0,0,0)] to-[rgba(0,0,0,0.9)] absolute z-10">
                    </div>
                    <div class="card-detail w-full flex items-end p-[30px] relative z-20">
                        <div class="flex flex-col gap-[10px]">
                            <p class="text-white">Featured</p>
                            <a href="{{ route('front.details', $automotive_featured_articles->slug) }}"
                                class="font-bold text-[30px] leading-[36px] text-white hover:underline transition-all duration-300">{{ $automotive_featured_articles->name }}</a>
                            <p class="text-white">{{ $automotive_featured_articles->created_at->format('M d, Y') }}</p>
                        </div>
                    </div>
                </div>
                <div class="h-[424px] w-fit px-5 overflow-y-scroll overflow-x-hidden relative custom-scrollbar">
                    <div class="w-[455px] flex flex-col gap-5 shrink-0">
                        @forelse ($automotive_articles as $article)
                            <a href="{{ route('front.details', $article->slug) }}" class="card py-[2px]">
                                <div
                                    class="rounded-[20px] border border-[#EEF0F7] p-[14px] flex items-center gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300">
                                    <div class="w-[130px] h-[100px] flex shrink-0 rounded-[20px] overflow-hidden">
                                        <img src="{{ Storage::url($article->thumbnail) }}"
                                            class="object-cover w-full h-full" alt="thumbnail" />
                                    </div>
                                    <div class="flex flex-col justify-center-center gap-[6px]">
                                        <h3 class="font-bold text-lg leading-[27px]">{{ substr($article->name, 0, 50) }}
                                            {{ strlen($article->name) > 50 ? '...' : '' }}</h3>
                                        <p class="text-sm leading-[21px] text-[#A3A6AE]">
                                            {{ $article->created_at->format('M d, Y') }}</p>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <p>Belum ada data terbaru....</p>
                        @endforelse
                    </div>
                    <div
                        class="sticky z-10 bottom-0 w-full h-[100px] bg-gradient-to-b from-[rgba(255,255,255,0.19)] to-[rgba(255,255,255,1)]">
                    </div>
                </div>
            </div>
        </section>
        <script src="{{ asset('customjs/two-lines-text.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <!-- JavaScript -->
        <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
        <script src="{{ asset('customjs/carousel.js') }}"></script>
    </body>
@endsection

@push('after-styles')
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css" />
@endpush

@push('after-scripts')
    <script src="{{ asset('js/two-lines-text.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- JavaScript -->
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="{{ asset('js/carousel.js') }}"></script>
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
@endpush
