@extends('layout.admin')

@section('title', 'Notifications')

@section('content')

    <div class="page-header">

        <div>

            <h1>Notifications</h1>

            <p>Manage all your notifications.</p>

        </div>
        <div class="notification-filter">

            <a href="{{ route('notifications.index') }}" class="{{ request('filter') == null ? 'active' : '' }}">

                All

            </a>

            <a href="{{ route('notifications.index', ['filter' => 'unread']) }}"
                class="{{ request('filter') == 'unread' ? 'active' : '' }}">

                Unread

            </a>

            <a href="{{ route('notifications.index', ['filter' => 'read']) }}"
                class="{{ request('filter') == 'read' ? 'active' : '' }}">

                Read

            </a>

        </div>
        <div class="notification-actions">

            @if (auth()->user()->unreadNotifications->count())
                <form action="{{ route('notifications.readAll') }}" method="POST">

                    @csrf

                    <button class="btn-primary">

                        <i class="fa-solid fa-check-double"></i>

                        Mark All Read

                    </button>

                </form>
            @endif


            @if (auth()->user()->notifications()->count())
                <form action="{{ route('notifications.destroyAll') }}" method="POST">

                    @csrf
                    @method('DELETE')

                    <button class="btn-danger" onclick="return confirm('Delete all notifications?')">

                        <i class="fa-solid fa-trash"></i>

                        Delete All

                    </button>

                </form>
            @endif

        </div>

    </div>

    <div class="notification-page">

        @forelse($notifications as $notification)
            <div class="notification-card {{ is_null($notification->read_at) ? 'unread' : '' }}">

                <div class="notification-left">

                    <div class="notification-icon">

                        <i class="fa-solid fa-cart-shopping"></i>

                    </div>

                </div>

                <div class="notification-center">

                    <h3>

                        {{ $notification->data['title'] }}

                    </h3>

                    <p>

                        {{ $notification->data['message'] }}

                    </p>

                    <small>

                        {{ $notification->created_at->diffForHumans() }}

                    </small>

                </div>

                <div class="notification-right">

                    <a href="{{ route('notifications.read', $notification->id) }}" class="btn-secondary">

                        View →

                    </a>

                    <form action="{{ route('notifications.destroy', $notification->id) }}" method="POST">

                        @csrf
                        @method('DELETE')

                        <button class="btn-danger btn-icon" onclick="return confirm('Delete notification?')">

                            <i class="fa-solid fa-trash"></i>

                        </button>

                    </form>

                </div>
            </div>

        @empty

            <div class="empty-state">

                <i class="fa-regular fa-bell-slash"></i>

                <h3>No Notifications</h3>

                <p>You don't have any notifications yet.</p>

            </div>
        @endforelse

    </div>

    <div class="pagination-wrapper">

        {{ $notifications->links() }}

    </div>

@endsection
