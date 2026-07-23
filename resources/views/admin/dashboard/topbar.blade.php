<header class="topbar">

    <!-- Left -->

    <div class="topbar-left">

        <button class="menu-toggle">

            <i class="fa-solid fa-bars"></i>

        </button>

        <div class="topbar-search">

            <i class="fa-solid fa-magnifying-glass"></i>

            <input type="text" placeholder="Search...">

        </div>

    </div>

    <!-- Right -->

    <div class="topbar-right">

        <!-- Notification -->

        <div class="notification-dropdown">

            <button class="topbar-icon" id="notificationToggle">

                <i class="fa-regular fa-bell"></i>

                @if (auth()->user()->unreadNotifications->count())
                    <span class="notification-count">

                        {{ auth()->user()->unreadNotifications->count() }}

                    </span>
                @endif

            </button>
            <div class="notification-menu" id="notificationMenu">

                <div class="notification-header">

                    <h3>Notifications</h3>

                    <span>

                        {{ auth()->user()->unreadNotifications->count() }}

                        New

                    </span>

                </div>

                <div class="notification-body">

                    @forelse(auth()->user()->unreadNotifications->take(5) as $notification)
                        <a href="{{ route('notifications.read', $notification->id) }}" class="notification-item">
                            <div class="notification-item">

                                <div class="notification-icon">

                                    <i class="fa-solid fa-cart-shopping"></i>

                                </div>

                                <div class="notification-content">

                                    <h4>

                                        {{ $notification->data['title'] }}

                                    </h4>

                                    <p>

                                        {{ $notification->data['message'] }}

                                    </p>

                                    <small>

                                        {{ $notification->created_at->diffForHumans() }}

                                    </small>

                                </div>
                            </div>
                        </a>


                    @empty

                        <div class="notification-empty">

                            <i class="fa-solid fa-bell-slash"></i>

                            <p>No Notifications</p>

                        </div>
                    @endforelse

                </div>

                <div class="notification-footer">

                    <a href="{{route('notifications.index') }}">

                        View All Notifications

                    </a>

                </div>

            </div>

        </div>
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

                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}

            </div>

        </div>

    </div>

</header>
