@extends('layouts.main')

@section('title', $title = $category->title)

@section('content')
    @include('layouts.partials.header')
    <section class="page-section portfolio" id="search">
        <div class="container">
            <!-- Portfolio Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">{{ $category->name }}</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Portfolio Grid Items-->
            <div class="row justify-content-center">
                @foreach ($products as $product)
                    <div class="col-md-4">
                        <div class="card">
                            <div>
                                <img src="{{ asset('front/assets/img/1.jpg') }}" class="w-100" alt="">
                            </div>
                            <div class="card-body">
                                <h4>{{ $product->name }}</h4>
                                <p>{{ $product->created_at }}</p>
                            </div>
                            <div class="card-footer bg-transaparent">
                                <a href="{{  route('products.show', $product->slug) }}" class="btn btn-primary">{{ __('Details') }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
