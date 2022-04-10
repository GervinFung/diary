<div class="header">
    <a href="/" class="website-logo">
        <img src="{{ URL('storage/images/journivia-logo.png') }}" width="90px" height="90px">
    </a>
    <nav>
        <div class="menu-container">
            <ul class="menu">
                <li class="menu-item">
                    <a class="menu-link" href="/">Home</a>
                </li>
                <li class="menu-item">
                    <a class="menu-link" href="/public-journals">Public Journals</a>
                </li>
                <li class="menu-item">
                    <a class="menu-link" href="/my-journals">My Journals</a>
                </li>
                @auth
                    <li class="menu-item">
                        <a class="menu-link" href="/sign-out">Sign out</a>
                    </li>
                @else
                    <li class="menu-item">
                        <a class="menu-link" href="/sign-in">Sign in</a>
                    </li>
                    <li class="menu-item">
                        <a class="menu-link" href="/sign-up">Sign up</a>
                    </li>
                @endauth
            </ul>
        </div>
        <div class="burger-menu-container">
            <div class="burger-menu-icon" onclick="showDropDownMenu(this)">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>
            <ul class="burger-menu hidden" name="burger_menu">
                <li class="burger-menu-item">
                    <a class="burger-menu-link" href="/">Home</a>
                </li>
                <li class="burger-menu-item">
                    <a class="burger-menu-link" href="/public-journals">Public Journals</a>
                </li>
                <li class="burger-menu-item">
                    <a class="burger-menu-link" href="/my-journals">My Journals</a>
                </li>
                @auth
                    <li class="burger-menu-item">
                        <a class="burger-menu-link" href="/sign-out">Sign out</a>
                    </li>
                @else
                    <li class="burger-menu-item">
                        <a class="burger-menu-link" href="/sign-in">Sign in</a>
                    </li>
                    <li class="burger-menu-item">
                        <a class="burger-menu-link" href="/sign-up">Sign up</a>
                    </li>
                @endauth
            </ul>
        </div>
    </nav>

    <script>
        function showDropDownMenu(burger_icon) {
            burger_icon.classList.toggle("change");
            let burger_menu = document.getElementsByName("burger_menu")[0];
            burger_menu.classList.toggle("hidden");
        }
    </script>
</div>
