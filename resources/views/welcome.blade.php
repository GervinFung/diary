<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home</title>
        
        <link data-n-head="ssr" rel="icon" type="image/x-icon" href="/favicon.ico">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('css/header.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('css/footer.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('css/home.css') }}" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
    <x-header/>
      <div class="main-container">
        <div class="section-1">
          <div class="slogan-container">
            <div class="slogan-text">
              SANCTUARY FOR YOUR MIND & SOUL
            </div>
            @if (session('user_id'))
            <a href="myJournal" class="link">
            @else
            <a href="signUp" class="link">
            @endif
              GET STARTED<i aria-hidden="true" class="v-icon notranslate mdi mdi-arrow-right theme--light" data-v-fbe4cdf4=""></i>
            </a>
          </div>
          <div class="desc-container">
            <h1> Meet Journivia, Your Self-Care Journal</h1>
            <p> Join millions of Journey users and create a healthier, happier mind. A sanctuary for your mind and soul, Journey will help increase your positive energy, be more grateful and a calmer mind by building healthy thinkings through journaling.<br>
              <br>We're more than just a journal, or a diary; we're your own motivational coach and happiness trainer. Let's embark on a fabulous journey of self-improvement today
            </p>
          </div>
        </div>
      </div>
      <div class="section-2">
        @include('book')
        <div class="signature">Journivia</div>
      </div>
    <x-footer/>
    </body>
</html>
