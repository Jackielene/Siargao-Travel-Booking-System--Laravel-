@extends('layouts.app')

@section('content')
  <div class="about-main-content" style="margin-top:-25px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="content">
                    <div class="blur-bg"></div>
                    <h4>EXPLORE OUR COUNTRY</h4>
                    <div class="line-dec"></div>
                    <h2>Welcome To Siargao Islands</h2>
                    <p>Discover the hidden gem of the Philippines—Siargao Islands! Known for its breathtaking natural beauty, vibrant culture, and world-class surfing spots, Siargao is a paradise for adventure seekers and relaxation enthusiasts alike.</p>
                    <div class="main-button"></div>
                </div>
            </div>
        </div>
    </div>
  </div>

  <div class="cities-town">
    <div class="container">
        <div class="row">
            <div class="slider-content">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Siargao’s <em> Famous Spots</em></h2>
                    </div>
                    <div class="col-lg-12">
                        <div class="owl-cites-town owl-carousel">
                            @foreach ($cities as $city)
                                <div class="item">
                                    <div class="thumb">
                                        <img src="{{ asset('assets/images/' . $city->image) }}" alt="">
                                        <h4>{{ $city->name }}</h4>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>

  <div class="weekly-offers">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading text-center">
                    <h2>Best Weekly Offers Resorts</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="owl-weekly-offers owl-carousel">
                    @foreach ($resorts as $resort)
                        <div class="item">
                            <div class="thumb">
                                <img src="{{ asset('assets/images/' . $resort->images) }}" alt="">
                                <div class="text">
                                    <h4>{{ $resort->name }}<br><span><i class="fa fa-users"></i> {{ $resort->descrip }}</span></h4>
                                    <h6>₱{{ $resort->pricing }}<br><span>/person</span></h6>
                                    <div class="line-dec"></div>
                                    <ul>
                                        <li>Deal Includes:</li>
                                        <li><i class="fa fa-taxi"></i> {{ $resort->numdays }} Days Trip > Free Transportation</li>
                                        <li><i class="fa fa-house"></i> Hotel Included</li>
                                        <li><i class="fa fa-building"></i> Daily Places Visit</li>
                                    </ul>
                                    <div class="main-button">
                                        <a href="{{ route('traveling.reservation', $city->id) }}">Make a Reservation</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
  </div>

  <div class="more-about">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="left-image">
            <img src="{{ asset('assets/images/map.jpg')}}" alt="">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="section-heading">
            <h2>Discover More About Siargao</h2>
            <p>Siargao combines adventure and tranquility, making it a paradise for travelers seeking a laid-back, nature-rich escape.</p>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="info-item">
                <div class="row">
                  <div class="col-lg-6">
                    <h4>12.560+</h4>
                    <span>Amazing Places</span>
                  </div>
                  <div class="col-lg-6">
                    <h4>240.580+</h4>
                    <span>Different Check-ins Yearly</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <p>Siargao, a stunning tropical island in the Philippines, is known as the country's surfing capital, attracting surf enthusiasts from around the globe...</p>
        </div>
      </div>
    </div>
  </div>
@endsection
