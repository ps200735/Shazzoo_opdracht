<div>

    <x-message/>

    <section class="py-5">

        <div class="container px-4 my-5 px-lg-5">
            <div class="pb-5 row">
                <div class="col-lg-12 margin-tb">

                    <div class="pull-right">
                        <a class="flex-shrink-0 btn btn-outline-dark" href="{{ route('products') }}">Terug</a>
                    </div>
                </div>
            </div>
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6"><img class="mb-5 card-img-top mb-md-0" src="{{ $product->image }}"
                        alt="{{ $product->product_name }}" /></div>
                <div class="col-md-6">
                    <h1 class="display-5 fw-bolder">{{ $product->product_name }}</h1>
                    <div class="mb-5 fs-5">
                        <span>&euro; {{ $product->price }}</span>
                    </div>
                    <p class="lead">{{ $product->description }}</p>
                    <div class="d-flex">
                        <input class="text-center form-control me-3" id="inputQuantity" type="number"
                            wire:model.live="quantity" min="1" max="50" style="max-width: 5rem" required />
                        <button class="flex-shrink-0 btn btn-outline-dark @if($errors->any()) disabled @endif @guest
                            disabled
                        @endguest " type="button" wire:click='add_to_cart({{ $product->id }})'>
                            <i class="bi-cart-fill me-1"></i>
                            Toevoegen aan winkelwagen
                        </button>
                    </div>
                    @guest
                    <span class="error">U moet inlogen om de producten te kunnen toevoegen aan winkelwagen</span>
                    @endguest
                    @error('quantity') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
    </section>
</div>
