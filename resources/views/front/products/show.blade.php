@extends('layouts.main')

@section('title', $title = $product->name)

@section('styles')
<style>

    #carouselProductIndicators {
        height: 380px !important;
    }

    .carousel-indicators{
        bottom: 5em !important;
    }

    @media (min-width: 576px) {
        .carousel-indicators{
            bottom: -2em !important;
        }
        .carousel-indicators button img{
            height: 4em !important;
        }

        #carouselProductIndicators {
            height: 320px !important;
        }

        #carouselProductIndicators .carousel-inner .carousel-item {
            height: 400px !important;
        }
    }
</style>
@endsection

@section('content')
    @include('layouts.partials.header')
    <section class="page-section portfolio" id="search" dir="{{ App::isLocale('fa') ? 'rtl' : '' }}">
        <div class="container">
            <!-- Portfolio Section Heading-->
            <div class="my-3">
                <h3 class="page-section-heading text-uppercase text-secondary mb-2">{{ $product->name }}</h3>
                <div class="d-flex">
                    @foreach (\App\Models\Category::descendantsAndSelf($product->category->id) as $item)
                        <span class="mx-2">
                            <a href="{{ route('categories.show', $item->slug) }}" class="text-decoration-none">
                                {{ $item->name }}
                            </a>
                            <i class="fa fa-chevron-{{ App::isLocale('fa') ? 'left' : 'right' }}"></i>
                        </span>
                    @endforeach
                    <span>
                        <p class="text-info mx-2">
                            {{ $product->name }}
                        </p>
                    </span>
                </div>
            </div>
            <!-- Portfolio Grid Items-->
            <div class="row justify-content-center mb-3">
                <div class="col-md-6">
                    <!-- Carousel wrapper -->
                    <div id="carouselProductIndicators" class="carousel slide" data-bs-ride="carousel">
                        <!-- Slides -->
                        <div class="carousel-inner mb-5">
                            <div class="carousel-item active">
                                <img src="{{ $product->getFirstMediaUrl('SpecialImage') }}" class="d-block w-100"
                                    alt="{{ $product->name }}" />
                            </div>
                            @foreach ($product->getMedia('Gallery') as $media)
                                <div class="carousel-item">
                                    <img src="{{ $media->getUrl() }}" class="d-block w-100"
                                        alt="..." />
                                </div>
                            @endforeach
                        </div>
                        <!-- Slides -->

                        <!-- Thumbnails -->
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselProductIndicators" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1" style="width: 100px;">
                                <img class="d-block w-100"
                                    src="{{ $product->getFirstMediaUrl('SpecialImage') }}"
                                    alt="{{ $product->name }}"
                                    class="img-fluid" />
                            </button>
                            @foreach ($product->getMedia('Gallery') as $media)
                                <button type="button" data-bs-target="#carouselProductIndicators" data-bs-slide-to="{{ $loop->iteration }}"
                                    aria-label="Slide 3" style="width: 100px;">
                                    <img class="d-block w-100"
                                        src="{{ $media->getUrl() }}"
                                        alt="{{ $product->name }}"
                                        class="img-fluid" />
                                </button>
                            @endforeach
                        </div>
                        <!-- Thumbnails -->
                    </div>
                    <!-- Carousel wrapper -->
                </div>
                <div class="col-md-6">
                    <h4 class="text-danger">{{ $product->name }}</h4>

                    <div class="details">
                        <span class="text-uppercase text-primary font-weight-bold mb-2">
                            <strong>{{ __('Product details') }}</strong>
                        </span>

                        @foreach (\App\Models\AttributeType::all() as $attrType)
                            <p class="mb-2">
                                <strong>{{ $attrType->name }}:</strong>
                                @foreach ($product->attributeValues->where('attribute_type_id', $attrType->id) as $attrValue)
                                    <span>{{ $attrValue->name }}</span>
                                    @if (!$loop->last)
                                        <span> / </span>
                                    @endif
                                @endforeach
                            </p>
                        @endforeach
                        <strong>{{ __('Price') }}: </strong>
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                            data-bs-target="#callModal">
                            {{ __('Call') }}
                        </button>
                        <p class="mb-2">
                        </p>
                    </div>
                </div>
            </div>

            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                {{-- <div class="divider-custom-icon"><i class="fas fa-star"></i></div> --}}
                <div class="divider-custom-icon text-warning">{{ __('Related Products') }}</div>
                <div class="divider-custom-line"></div>
            </div>

            <div class="row mb-3">
                @foreach ($relatedProducts as $relatedProduct)
                    <div class="col-md-4 mb-3">
                        <livewire:front.products.card :product="$relatedProduct" />
                    </div>
                @endforeach
            </div>

            <div class="row">
                <h3>{{ __('Comments') }}</h3>

                @forelse ($product->comments as $comment)
                    <div class="card mb-3">
                        <div class="card-body">
                            <span class="fw-bold">{{ $comment->user?->full_name }}</span>
                            <p>{{ $comment->body }}</p>
                            <small class="text-black-50">{{ $comment->created_at->format('Y-m-d') }}</small>
                        </div>
                    </div>
                @empty
                    <p class="mb-3 p-2 text-info fw-bold">{{ __('No Comments!') }} <i class="fa fa-comment"></i></p>
                @endforelse
                <div class="card mb-3">
                    <div class="card-body">
                        <form action="{{ route('products.comment', $product->slug) }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="body" class="fw-bold mb-2">{{ __('Comment') }}</label>
                                <textarea name="body" id="body" class="form-control" cols="30" rows="3"
                                    placeholder="{{ __('Leave a comment...') }}" required>{{ old('body') }}</textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="callModal" tabindex="-1" aria-labelledby="callModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" dir="ltr">
                        <h5 class="modal-title" id="callModalLabel">{{ __('Contact info') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item bg-transparent border-0">
                                <a class="btn btn-outline-dark" href="tel:+982632554120">
                                    <i class="fa fa-phone"></i> <span dir="ltr">+982632554120</span>
                                    ({{ __('Iran') }})
                                </a>
                            </li>
                            <li class="list-group-item bg-transparent border-0">
                                <a class="btn btn-outline-dark" href="tel:+39097122999">
                                    <i class="fa fa-phone"></i> <span dir="ltr">+39097122999</span>
                                    ({{ __('Italy') }})
                                </a>
                            </li>
                            <li class="list-group-item bg-transparent border-0">
                                <a class="btn btn-outline-dark" href="tel:+989127179262">
                                    <i class="fa fa-mobile"></i> <span dir="ltr">+989127179262</span>
                                    ({{ __('Iran') }})
                                </a>
                            </li>
                            <li class="list-group-item bg-transparent border-0">
                                <a class="btn btn-outline-dark" href="tel:+393516520568">
                                    <i class="fa fa-mobile"></i> <span dir="ltr">+393516520568</span>
                                    ({{ __('Italy') }})
                                </a>
                            </li>
                            <li class="list-group-item bg-transparent border-0">
                                <a class="btn btn-outline-dark" href="mail:info@persianclassicproducts.com">
                                    <i class="fa fa-envelope"></i> info@persianclassicproducts.com
                                </a>
                            </li>
                        </ul>
                        {{-- @foreach ($collection as $item)

                        @endforeach --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        @if(session()->has('message'))
            Swal.fire({
                title: 'Success!',
                text: "{{ session()->get('message') }}",
                icon: 'success',
                // confirmButtonText: 'Cool'
            })
        @endif

    });
</script>
@endsection
