<div>
    <a class="btn btn-outline-dark" type="submit" href="{{ route('cart'); }}">


        <i class="bi-cart-fill me-1"> @if($total > 0)

            <span class="text-white badge bg-dark ms-1 rounded-pill">
                <span> {{ $total }}</span>
            </span>

            @endif</i>


    </a>
</div>
