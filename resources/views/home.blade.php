@extends('layouts.app')

@section('content')

<!-- ***** Main Banner Area Start ***** -->
<section id="section-1">
  <div class="content-slider">
    <input type="radio" id="banner1" class="sec-1-input" name="banner" checked>
    <input type="radio" id="banner2" class="sec-1-input" name="banner">
    <input type="radio" id="banner3" class="sec-1-input" name="banner">
    <input type="radio" id="banner4" class="sec-1-input" name="banner">
    <div class="slider">
      
      @php
        $destinationOrder = [1 => 'Cloud 9', 2 => 'Magpupungko Rock Pool', 3 => 'Guyam Island', 4 => 'Naked Island'];
        $index = 1;
      @endphp

      @foreach ($destinationOrder as $key => $destinationName)
        @php
          $destination = $destinations->firstWhere('name', $destinationName);
        @endphp

        @if($destination)
        <div id="top-banner-{{ $key }}" class="banner">
          <div class="banner-inner-wrapper header-text">
            <div class="main-caption">
              <h2>Take a Glimpse Into The Beautiful Scenery Of:</h2>
              <h1>{{ $destination->name }}</h1>
              <div class="border-button"><a href="{{ route('traveling.about', $destination->id)}}">Go There</a></div>
            </div>
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <div class="more-info">
                    <div class="row">
                      <div class="col-lg-3 col-sm-6 col-6">
                        <i class="fa fa-user"></i>
                        <h4><span>Population:</span><br>{{ $destination->population }}</h4>
                      </div>
                      <div class="col-lg-3 col-sm-6 col-6">
                        <i class="fa fa-globe"></i>
                        <h4><span>Territory:</span><br>{{ $destination->territory }} KM</h4>
                      </div>
                      <div class="col-lg-3 col-sm-6 col-6">
                        <i class="fa fa-home"></i>
                        <h4><span>AVG Price:</span><br>₱{{ $destination->avg_price }}</h4>
                      </div>
                      <div class="col-lg-3 col-sm-6 col-6">
                        <div class="main-button">
                          <a href="{{ route('traveling.about', $destination->id)}}">Explore More</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endif
      @endforeach

    </div>
    <nav>
      <div class="controls">
        <label for="banner1"><span class="progressbar"><span class="progressbar-fill"></span></span><span class="text">1</span></label>
        <label for="banner2"><span class="progressbar"><span class="progressbar-fill"></span></span><span class="text">2</span></label>
        <label for="banner3"><span class="progressbar"><span class="progressbar-fill"></span></span><span class="text">3</span></label>
        <label for="banner4"><span class="progressbar"><span class="progressbar-fill"></span></span><span class="text">4</span></label>
      </div>
    </nav>
  </div>
</section>
<!-- ***** Main Banner Area End ***** -->

<div class="visit-country">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="section-heading">
            <h2>Visit One Of Our Tourist Spots Now</h2>
            <p>Whether you're looking for adventure, relaxation, or a chance to immerse yourself in nature, our expertly curated travel reservations make it easy for you to explore the best of Siargao. Book your adventure today and create memories that will last a lifetime!</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8">
          <div class="items">
            <div class="row">
              <!-- Cloud 9 Spot -->
              <div class="col-lg-12">
                <div class="item">
                  <div class="row">
                    <div class="col-lg-4 col-sm-5">
                      <div class="image">
                        <img src="assets/images/spot1.png" alt="">
                      </div>
                    </div>
                    <div class="col-lg-8 col-sm-7">
                      <div class="right-content">
                        <h4>Cloud 9</h4>
                        <span>General Luna</span>
                        <div class="main-button">
                          <a href="{{ route('traveling.about', $destination->id)}}">Explore More</a>
                        </div>
                        <p>Cloud 9 is renowned for its hollow waves, making it a favorite spot for both local and international surfers. The best time for surfing is during the months of September to November, when the waves are at their best.</p>
                        <ul class="info">
                          <li><i class="fa fa-user"></i> 16,000 people</li>
                          <li><i class="fa fa-globe"></i> 2 KM</li>
                          <li><i class="fa fa-home"></i> ₱5,000 to ₱8,000</li>
                        </ul>
                        <div class="text-button">
                          <a href="{{ route('traveling.about', $destination->id)}}">Need Directions? <i class="fa fa-arrow-right"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
  
              <!-- Magpupungko Rock Pool Spot -->
              <div class="col-lg-12">
                <div class="item">
                  <div class="row">
                    <div class="col-lg-4 col-sm-5">
                      <div class="image">
                        <img src="assets/images/spot2.png" alt="">
                      </div>
                    </div>
                    <div class="col-lg-8 col-sm-7">
                      <div class="right-content">
                        <h4>Magpupungko Rock Pool</h4>
                        <span>Pilar</span>
                        <div class="main-button">
                          <a href="{{ route('traveling.about', $destination->id)}}">Explore More</a>
                        </div>
                        <p>Magpupungko is famous for its natural tidal rock pools that reveal stunning clear waters during low tide, making it a popular spot for swimming, snorkeling, and taking photos.</p>
                        <ul class="info">
                          <li><i class="fa fa-user"></i> 11,500 people</li>
                          <li><i class="fa fa-globe"></i> 10,000 square meters</li>
                          <li><i class="fa fa-home"></i> ₱1,500 to ₱2,500</li>
                        </ul>
                        <div class="text-button">
                          <a href="{{ route('traveling.about', $destination->id)}}">Need Directions? <i class="fa fa-arrow-right"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
  
              <!-- Guyam Island Spot -->
              <div class="col-lg-12">
                <div class="item">
                  <div class="row">
                    <div class="col-lg-4 col-sm-5">
                      <div class="image">
                        <img src="assets/images/spot3.png" alt="">
                      </div>
                    </div>
                    <div class="col-lg-8 col-sm-7">
                      <div class="right-content">
                        <h4>Naked Island</h4>
                        <span>Siargao Islands</span>
                        <div class="main-button">
                          <a href="{{ route('traveling.about', $destination->id)}}">Explore More</a>
                        </div>
                        <p>Naked Island is known for its stunning white sandy beach and lack of vegetation, giving it a "naked" appearance</p>
                        <ul class="info">
                            <li><i class="fa fa-user"></i> 20-30 tourists</li>
                            <li><i class="fa fa-globe"></i> 200 meters</li>
                            <li><i class="fa fa-home"></i> ₱1,500 to ₱3,000</li>
                        </ul>
                        <div class="text-button">
                          <a href="{{ route('traveling.about', $destination->id)}}">Need Directions? <i class="fa fa-arrow-right"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
  
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="side-bar-map">
            <div class="row">
              <div class="col-lg-12">
                <div id="map">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d251542.6970428207!2d125.89454583943244!3d9.904392131341599!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3304043652d9e9b3%3A0xd4c56a60c9a11b84!2sSiargao%20Island!5e0!3m2!1sen!2sph!4v1730280838894!5m2!1sen!2sph" width="100%" height="550px" frameborder="0" style="border:0; border-radius: 23px;" allowfullscreen=""></iframe>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
