<div>
    <header class="py-5 bg-dark">
        <div class="container px-4 my-5 px-lg-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Welkom bij onze winkel</h1>
            </div>
        </div>
    </header>
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 mt-5 px-lg-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
@foreach ( $products as $product )
<div class="mb-5 col">
    <div class="card h-100">
        <!-- Product image-->
        <img class="card-img-top" src="{{ $product->image }}" alt="..." />
        <!-- Product details-->
        <div class="p-4 card-body">
            <div class="text-center">
                <!-- Product name-->
                <h5 class="fw-bolder">{{ $product->product_name }}</h5>
                <!-- Product price-->
                <div class="fw-bolder"> &euro; {{ $product->price }}</div>
            </div>
        </div>
        <!-- Product actions-->
        <div class="p-4 pt-0 bg-transparent card-footer border-top-0">
            <div class="text-center"><a class="mt-auto btn btn-outline-dark" href="{{ route('product.show',$product->id ) }}">View options</a></div>
        </div>
    </div>
</div>
@endforeach

            </div>
            <div class="d-flex justify-content-center">
                {{ $products->links() }}

                </div>
        </div>
    </section>
</div>
