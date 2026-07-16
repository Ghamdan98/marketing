<header class="topbar">

    <!-- Left -->

    <div class="topbar-left">

        <button class="menu-toggle">

            <i class="fa-solid fa-bars"></i>

        </button>

        <div class="topbar-search">

            <i class="fa-solid fa-magnifying-glass"></i>

            <input
                type="text"
                placeholder="Search...">

        </div>

    </div>

    <!-- Right -->

    <div class="topbar-right">

        <!-- Notification -->

        <button class="topbar-icon">

            <i class="fa-regular fa-bell"></i>

            <span class="notification-count">

                3

            </span>

        </button>

        <!-- Admin -->

        <div class="admin-profile">

            <div class="admin-info">

                <h4>

                    {{ Auth::user()->name }}

                </h4>

                <span>

                    Administrator

                </span>

            </div>

            <div class="admin-avatar">

                {{ strtoupper(substr(Auth::user()->name,0,1)) }}

            </div>

        </div>

    </div>

</header>