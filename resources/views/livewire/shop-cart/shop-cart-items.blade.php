<section class="h-100 gradient-custom">

    <x-message/>
    <div class="container py-5">
        <div class="my-4 row d-flex justify-content-center">
            <div class="col-md-8">
                <div class="mb-4 card" @if ($cartitems->isEmpty()) style="width: 500px" @endif>
                    <div class="py-3 card-header">
                        <h5 class="mb-0 w-1000">Winkelwagen</h5>
                    </div>
                    <div class="card-body">
                        <!-- Single item -->

                        <div class="row ">
                            @if (!empty($cartitems))
                            @foreach ($cartitems as $cartItem)
                            <div class="mb-4 col-lg-3 col-md-12 mb-lg-0">
                                <!-- Image -->
                                <div class="rounded bg-image hover-overlay hover-zoom ripple cart-item-img"
                                    data-mdb-ripple-color="light">
                                    <img src="{{ $cartItem->image }}" class="w-100" alt="Blue Jeans Jacket" />
                                    <a href="#!">
                                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)">
                                        </div>
                                    </a>
                                </div>
                                <!-- Image -->
                            </div>

                            <div class="mb-4 col-lg-5 col-md-6 mb-lg-0">
                                <!-- Data -->
                                <p><strong>{{ $cartItem->name }}</strong></p>

                                <p><strong>&euro; {{ $cartItem->price }}</strong></p>

                                <button type="submit" class="flex-shrink-0 btn btn-outline-dark" title="Remove item"
                                    wire:click="removeItem({{ $cartItem->id }})">
                                    <i class="bi bi-trash3"></i>
                                </button>

                            </div>

                            <div class="mb-4 col-lg-4 col-md-6 mb-lg-0 position-relative">
                                <div class="mb-4 d-flex justify-content-end align-items-center"
                                    style="max-width: 300px">

                                    <button class="flex-shrink-0 btn btn-outline-dark" wire:click="decrementQty({{ $cartItem->id }})">
                                        <i class="bi bi-dash"></i>
                                    </button>

                                    <div class="form-outline">
                                        <input id="quantity-{{ $cartItem->id }}" name="quantity" max="50"
                                            value="{{ $cartItem->quantity }}" type="number" class="form-control"
                                            onchange="updateQuantity({{ $cartItem->id }})" readonly />
                                    </div>

                                    <button class="flex-shrink-0 btn btn-outline-dark" wire:click="incrementQty({{ $cartItem->id }})">
                                        <i class="bi bi-plus"></i>
                                    </button>
                                </div>



                                <p class="text-start text-md-center sale-price">
                                    <strong>
                                        &euro;
                                        {{ number_format($cartItem->price * $cartItem->quantity, 2, '.', ',')
                                        }}</strong>
                                </p>
                            </div>
                            <div class="mb-5 col-12"></div>
                            @endforeach
                            @endif

                        </div>

                    </div>
                </div>


            </div>
            <div class="col-md-4">
                <div class="mb-4 card">
                    <div class="py-3 card-header">
                        <h5 class="mb-0">Overzicht</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li
                                class="px-0 pb-0 border-0 list-group-item d-flex justify-content-between align-items-center">
                                Subtotaal
                                <span>&euro; {{ $total }}</span>
                            </li>

                            <li
                                class="px-0 mb-3 border-0 list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>Totaal</strong>
                                    <strong>
                                        <p class="mb-0">(inclusief btw)</p>
                                    </strong>
                                </div>
                                <span><strong>&euro;
                                        {{ $total}}</strong></span>
                            </li>
                        </ul>



                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
