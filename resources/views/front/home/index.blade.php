@extends('layouts.main')

@section('content')
    @include('layouts.partials.header')
    <section class="page-section portfolio" id="search">
        <div class="container">
            <!-- Portfolio Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-5">{{ __('Search products') }}</h2>

            <!-- Portfolio Grid Items-->
            <div class="row justify-content-center">
                <form action="{{ route('products.search') }}" class="input-group rounded w-50">
                    <input type="search" class="form-control rounded" name="search" placeholder="{{ __('Search') }}"
                        aria-label="Search" aria-describedby="search-addon" />
                    <button type="submit" class="input-group-text border-0" id="search-addon">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
            <!-- Icon divider -->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon">{{ __('Latest Products') }}</div>
                <div class="divider-custom-line"></div>
            </div>

            <div class="row">
                @foreach ($data as $category => $products)
                    <section class="splide mb-4" aria-label="Slide Container Example" id="splide-{{ $loop->iteration }}" dir="ltr">
                        <div class="splide__track">
                            <ul class="splide__list">
                                @foreach ($products as $key => $product)
                                    <li class="splide__slide">
                                        <div class="splide__slide__container">
                                            <livewire:front.products.card :product="$product" />
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </section>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>

        var splide1 = new Splide('#splide-1', {
            type: 'loop',
            rewind : true,
            gap: '1em',
            drag: 'free',
            perPage: 4,
            breakpoints: {
                767: {
                    perPage: 2,
                },
                480:{
                    perPage:1
                }
            }
        });

        splide1.mount();

        var splide2 = new Splide('#splide-2', {
            type: 'loop',
            rewind : true,
            gap: '1em',
            drag: 'free',
            perPage: 4,
            breakpoints: {
                767: {
                    perPage: 2,
                },
                480:{
                    perPage:1
                }
            }
        });

        splide2.mount();

        var splide3 = new Splide('#splide-3', {
            type: 'loop',
            rewind : true,
            gap: '1em',
            drag: 'free',
            perPage: 4,
            breakpoints: {
                767: {
                    perPage: 2,
                },
                480:{
                    perPage:1
                }
            }
        });

        splide3.mount();

        var splide4 = new Splide('#splide-4', {
            type: 'loop',
            rewind : true,
            gap: '1em',
            drag: 'free',
            perPage: 4,
            breakpoints: {
                767: {
                    perPage: 2,
                },
                480:{
                    perPage:1
                }
            }
        });

        splide4.mount();
    </script>
@endsection
