@extends('user.layouts.master')

@section('titre')
Coupon
    
@endsection


@section('contenue')
<section class="coupons">
    <main class="coupons-cards">
        @foreach ($coupons as $coupon)
        <div class="coupons-cards-card">
            <figure class="coupons-cards-card-figure">
                <h1 class="coupons-cards-card-figure-title">Reduction </h1>
                <h1 class="coupons-cards-card-figure-value">-5%</h1>
            </figure>


            <div class="coupons-cards-card-textes">
                <p>Utilisé cette coupon pour avoir une reduction</p>
                <h1 class="coupons-cards-card-textes-title">Valable</h1>
                <h1 class="coupons-cards-card-textes-">Pendant</h1>
                <h1 class="coupons-cards-card-textes-value">3j</h1>
                <p class="coupons-cards-card-textes-barcode">
                    <span>{{$coupon->code}}</span>
                    <i class="fa-solid fa-barcode "></i>
                </p>
            </div>

            <img class="coupons-cards-card-img" src="{{asset('images/neux.png')}}" alt="">
        </div>

        @endforeach
    </main>
</section>

@endsection
