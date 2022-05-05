@extends('layouts.app')

@section('title')
  Home
@endsection

@section('content')
@include('layouts.navbar')

  <section class="container-fluid" id="hero">
      <svg id="shape1" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" version="1.1">                    <defs>                         <linearGradient id="sw-gradient" x1="0" x2="1" y1="1" y2="0">                            <stop id="stop1" stop-color="#f1f3f5" offset="0%"></stop>                            <stop id="stop2" stop-color="#f1f3f5" offset="100%"></stop>                        </linearGradient>                    </defs>                <path fill="url(#sw-gradient)" d="M29,-20.9C36.4,-13.9,40.3,-1.9,37.8,8.5C35.3,19,26.5,27.9,17.6,29.5C8.6,31.1,-0.4,25.4,-8.7,20.4C-16.9,15.5,-24.4,11.4,-26.1,5.6C-27.7,-0.3,-23.5,-7.8,-18.1,-14.4C-12.8,-20.9,-6.4,-26.4,2.2,-28.2C10.8,-30,21.6,-27.9,29,-20.9Z" width="100%" height="100%" transform="translate(50 50)" stroke-width="0" style="transition: all 0.3s ease 0s;" stroke="url(#sw-gradient)"></path></svg>
        <div class="row">
          <div class="col-lg-7" id="content">
            <h1>Welcome To <span>Fast Food</span> Restaurant</h1>
            <p>Our job is to filling your tummy with delicious food and fast and free delivery.</p>
            <div class="link">
              <a href="#" class="btn" id="store">Get started</a><br>
              <a href="#" class="btn" id="product"> <i class="fas fa-play-circle"></i> Wactch video</a>
            </div>
          </div>
          <div class="col-lg-5">
              <img src="./images/chef.jpg" alt="">
          </div>
        </div>
        <div class="rectangles">
          <div class="rect" id="rect1"></div>
          <div class="rect" id="rect2"></div>
          <div class="rect" id="rect3"></div>
          <div class="rect" id="rect4"></div>
        </div>
    </section>


  <section class="services">
      <div class="container">
        <div class="row" >
          <div class="col-lg-6">
            <img src="images/3333449.jpg" alt="">
          </div>
          <div class="col-lg-6">
            <div class="shape1"></div>
            <div class="body">
              <h1>Delivery service</h1>
              <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Harum dolorem, soluta porro aut veniam, distinctio nulla id quisquam corporis suscipit officia quidem odit. Odit nostrum voluptatibus id repellendus.</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="shape2"></div>
            <div class="body">
              <h1>Reservation service</h1>
              <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Harum dolorem, soluta porro aut veniam, distinctio nulla id quisquam corporis suscipit officia quidem odit. Odit nostrum voluptatibus id repellendus.</p>
            </div>
          </div>
          <div class="col-lg-6">
            <img src="images/reservation.png" alt="">
          </div>
        </div>
      </div>
    </section>

    <example-component :user_id={{json_encode($user_id)}}></example-component>


    <section class="newsletter" id="contact">
      <div class="container">
        <div class="row">
          <div class="col-md-8 mx-auto">
            <h1>Contact us </h1>
            <form >
              <div class="my-2">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" required>
              </div>
              <div class="my-2">
                <label for="message" class="form-label">Message</label>
                <textarea name="message" class="form-control" id="message" required></textarea>
              </div>
              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-lg">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="overlay"></div>
  </section>

@include('layouts.footer')
@endsection

