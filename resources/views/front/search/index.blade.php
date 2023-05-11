@extends('layouts.main')

@section('title', $title = $search)

@section('content')
    @include('layouts.partials.header')
    <section class="page-section portfolio" id="search">
        <div class="container">
            <div class="row justify-content-center my-5">
                <form action="{{ route('products.search') }}" class="input-group rounded w-50">
                    <input type="search" class="form-control rounded" name="search"
                        placeholder="{{ __('Search') }}" value="{{ $search }}"
                        aria-label="Search" aria-describedby="search-addon" />
                    <button type="submit" class="input-group-text border-0" id="search-addon">
                      <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>

            <!-- Portfolio Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">{{ __('Search result for:') }} {{ $search }}</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Portfolio Grid Items-->
            <div class="row justify-content-center">
                @foreach ($products as $product)
                    <div class="col-md-4 mb-3">
                        <livewire:front.products.card :product="$product" />
                    </div>
                @endforeach
            </div>
            <div class="text-center">
                {{ $products->links("pagination::bootstrap-5") }}
            </div>
        </div>
    </section>
@endsection
