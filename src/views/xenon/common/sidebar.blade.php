
            <div class="sidebar-menu-inner">

                <header class="logo-env">

                    <!-- logo -->
                    <div class="logo">
                        <a href="/" class="logo-expanded">
                            <img src="{{$logo2x}}" width="180" alt="" />
                        </a>

                        <a href="/" class="logo-collapsed">
                            <img src="{{$logo_c??$static_base.'/images/logo-collapsed@2x.png'}}" width="40" alt="" />
                        </a>
                    </div>

                    <!-- This will toggle the mobile menu and will be visible only on mobile devices -->
                    <div class="mobile-menu-toggle visible-xs">
                        <a href="#" data-toggle="user-info-menu">
                            <i class="fa-bell-o"></i>
                            <span class="badge badge-success">7</span>
                        </a>

                        <a href="#" data-toggle="mobile-menu">
                            <i class="fa-bars"></i>
                        </a>
                    </div>

                    <!-- This will open the popup with user profile settings, you can use for any purpose, just be creative -->
                    @if(User::getUser())
                    <div class="settings-icon">
                        <a href="#" data-toggle="settings-pane" data-animate="true">
                            <i class="linecons-cog"></i>
                        </a>
                    </div>
                    @endif

                </header>

                <ul id="main-menu" class="main-menu">
                    <!-- add class "multiple-expanded" to allow multiple submenus to open -->
                    <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
                    <?php
                        echo Menu::show_list($menu_id??999);
                    ?>

                </ul>

            </div>
