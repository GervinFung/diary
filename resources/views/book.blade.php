<div class="cover">
    <div class="book">
    <label for="page-1"  class="book__page book__page--1">
        <div class="first-page">
            <img src="{{ URL('storage/images/journivia-logo-small.png') }}" alt="">
            <div class="awards-container">
                <img src="{{ URL('storage/images/google-playstore-logo.png') }}" alt="">
                Google Editors' Choice 2022
            </div>
            <div class="awards-container">
                <img src="{{ URL('storage/images/ios-appstore-logo.png') }}" alt="">
                iOS App Store App Of The Year 2022
            </div>
            <div class="awards-container">
                <img src="{{ URL('storage/images/android-logo.png') }}" alt="">
                Best of 2022 Android Apps
            </div>
            <div class="awards-container">
                <img src="{{ URL('storage/images/trophy.png') }}" alt="">
                App of The Year 2022
            </div>
        </div>
    </label>
    
    <label for="page-2" class="book__page book__page--4">
        <div class="page__content">
            <div class="account-type-desc-container">
                <img src="{{ URL('storage/images/private-account-logo.png') }}" alt="">
                <h2 class="book-subtitles">Private Account</h2>
                Record your feelings, emotions, and every happy and sad moments of life that only yourself will know about.
                <ul class="account-desc-list">
                    <li class="account-desc-list-item">All journals are only available to be read by you</li>
                    <li class="account-desc-list-item">Only you can create, edit or delete journals/diaries</li>
                    <li class="account-desc-list-item">Free</li>
                </ul>
            </div>
        </div>
    </label>
        
    <!-- Resets the page -->
    <input type="radio" name="page" id="page-1"/>
        
    <!-- Goes to the second page -->
    <input type="radio" name="page" id="page-2"/>
    <label class="book__page book__page--2">
        <div class="book__page-front">
            <div class="page__content">
                <h3 class="book-subtitles">Record the Highlights of Your Life</h3>
                Be perfectly in tune with both your physical and mental state! Keep track of your fitness levels and your moods with our app!
                <br>
                <br>
                <h3 class="book-subtitles">Throwback to Your Happiest Moments</h3>
                Sometimes, it can be hard to notice the positive changes you’ve been making since they tend to be gradual. Keep track of your progress and notice how far you’ve come. Look back on your entries and where your thoughts were exactly one month ago and beyond.
                <br>
                <br>
                <h3 class="book-subtitles">Don't miss a moment. Get it now!</h3>
                Take your journal wherever you go with our apps for Linux, Mac, PC, iPhone, iPad, and Android phones & tablets.
            </div>
        </div>
        <div class="book__page-back">
            <div class="page__content">
                <div class="account-type-desc-container">
                    <img src="{{ URL('storage/images/public-account-logo.png') }}" alt="">
                    <h2 class="book-subtitles">Public Account</h2>
                    Share your feelings, emotions, and every happy and sad moments of life with others!
                    <ul class="account-desc-list">
                        <li class="account-desc-list-item">All journals are available to be read by public</li>
                        <li class="account-desc-list-item">Only you can create, edit or delete journals/diaries</li>
                        <li class="account-desc-list-item">Free</li>
                    </ul>
                </div>
            </div>
        </div>
    </label>
    </div>
</div>