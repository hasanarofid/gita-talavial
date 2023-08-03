@extends('layouts.app')

@section ('content')
@php
use App\ProfileMarket;
$profile = ProfileMarket::find(1);
@endphp
<div class="container p-0">
  @if(Session::has('success'))
  <div class="row">
    <div class="col-12">
      <div id="charge-message" class="alert alert-success">
        {{ Session::get('success') }}
      </div>
    </div>
  </div>
  @endif
  <!-- GET FIT FROM HOME [S]-->
    <div class="row">
      <div class="col-12 promowrap">
        <div class="row m-0 p-0">
          <div class="col-4 promo-info h-100">
            <div class="infowrapper d-flex flex-column h-100 justify-content-center">
              <h2>{{ !empty($profile->title) ?  $profile->title :  'MarketPlace' }}</h2>
              <p>{{ !empty($profile->diskripsi) ?  htmlspecialchars($profile->diskripsi) :  'Diskripsi' }}</p>
              <a href="{{ route('servis.index') }}" class="w-100 button">Konsultasi Servis</a>
              <br>
              <a href="{{ route('product.index') }}" class="w-100 button">Cek Produk Kami</a>

            </div>   
          </div> 
        </div>
        <img class="d-block w-100" src="{{ asset('photo/teknisi3.jpg') }}" alt="">
      </div>
    </div>
    <!-- GET FIT FROM HOME [E]-->

    <!-- MEN & WOMEN [S]-->
    <div class="row pt-4">
      <div class="col-6 d-flex flex-column align-items-center genderwrapper">
        <a href="{{ route('servis.list') }}">
          <button id="maleBtn">
          <div class="gender">
            <img class="d-block w-100" src="{{ asset('photo/serviskomputer.jpg') }}" alt="">
            <h2 class="pt-2">Servis</h2>
          </div>
        </button>
        </a>
      </div>
      <div class="col-6 d-flex flex-column align-items-center genderwrapper">
        <a href="{{ route('product.index') }}">
          <button id="femaleBtn">
          <div class="gender">
            <img class="d-block w-100" src="{{ asset('photo/serviskomputer2.jpg') }}" alt="">
            <h2 class="pt-2">Beli Komputer</h2>
          </div>
        </button>
        </a>
      </div>
    </div>
    <!-- MEN & WOMEN [E]-->
    <hr>
    <h2 class="pt-3">Beberapa Hasil Servis Kami</h2>
        <!-- CATEGORY [S]-->
        <div class="row m-0 pt-4">
          <div class="col-lg-4 col-sm-12 d-flex flex-column align-items-center categorywrapper">
            <a href="{{ route('product.index') }}">
              <div class="category">
                <img class="" height="200px" src="{{ asset('servis/servis1.jpg') }}" alt="">
                <h5 class="pt-2">Check Fisik</h5>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-12 d-flex flex-column align-items-center categorywrapper">
            <a href="#">
              <div class="category">
                <img class="" height="200px" src="{{ asset('servis/servis2.jpg') }}" alt="">
                <h5 class="pt-2">Jaminan Kerusakan</h5>
            </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-12 d-flex flex-column align-items-center categorywrapper">
            <a href="#">
              <div class="category">
                <img class="" height="200px" src="{{ asset('servis/servis3.jpg') }}" alt="">
                <h5 class="pt-2">Aksesoris</h5>
              </div>
            </a>
          </div>
        </div>
        <!-- CATEGORY [E]-->

    <!-- FEATURED SHOES [S]-->
    <hr>
    <h2 class="pt-3">Produk Terbaik Kami</h2>
    <div class="row d-flex justify-content-center">
      @foreach ($products as $product)    
      <div class="col-lg-3 col-md-6 col-sm-6 col-6 pt-3">
        <div class="card">
          <a href="{{ route('product.show',['product'=>$product->id]) }}">
            <div class="card-body ">
              <div class="product-info">
                <div class="info-1"><img src="{{ asset('/storage/'.$product->image) }}" alt=""></div>
                <div class="info-4"><h5>{{ $product->brand }}</h5></div>
                <div class="info-2"><a href="product/{{ $product->id }}"><h4>{{ $product->name }}</h4></a></div>
                <div class="info-3"><h5>RM {{ $product->price }}</h5></div>
              </div>
            </div>
          </a>
        </div>
      </div>
      @endforeach
    </div>
    <!-- FEATURED SHOES [E]-->

    <!-- ADVANTAGE [S]-->
    <h2 class="pt-4">Layanan Kami</h2>
    <div class="row m-0 pt-4">
      <div class="col-lg-4 col-sm-12 d-flex flex-column align-items-center advantagewrapper">
        <img class="" height="80px" src="{{ asset('photo/delivery2.svg') }}" alt="">
          <h4>Gratis Checking</h4>
      </div>
      <div class="col-lg-4 col-sm-12 d-flex flex-column align-items-center advantagewrapper">
        <img class="" height="80px" src="{{ asset('photo/guarantee.svg') }}" alt="">
          <h4>PREMIUM AND ORIGINAL</h4>
      </div>
      <div class="col-lg-4 col-sm-12 d-flex flex-column align-items-center advantagewrapper">
        <img class="" height="80px" src="{{ asset('photo/support.svg') }}" alt="">
          <h4>24/7 CUSTOMER SUPPORT</h4>
      </div>
    </div>
    <!-- ADVANTAGE [E]-->

</div>

@endsection