@extends('layout.admin')

@section('title', 'Settings')

@section('content')

<div class="page-header">

    <div class="page-title">
        <h1>Settings</h1>
        <p>Manage your store configuration.</p>
    </div>

</div>

<div class="settings-wrapper">

    <!-- =======================================================
        STORE INFORMATION
    ======================================================== -->

    <div class="settings-card">

        <div class="settings-card-header">

            <div class="settings-icon">
                <i class="fa-solid fa-store"></i>
            </div>

            <div>

                <h2>Store Information</h2>

                <p>General information about your online store.</p>

            </div>

        </div>

        <div class="settings-card-body">

            <form>

                <div class="form-grid">

                    <div class="form-group">

                        <label>Store Name</label>

                        <input
                            type="text"
                            class="form-control"
                            placeholder="Marketing Store">

                    </div>

                    <div class="form-group">

                        <label>Email</label>

                        <input
                            type="email"
                            class="form-control"
                            placeholder="store@example.com">

                    </div>

                    <div class="form-group">

                        <label>Phone</label>

                        <input
                            type="text"
                            class="form-control"
                            placeholder="+966xxxxxxxx">

                    </div>

                    <div class="form-group">

                        <label>Website</label>

                        <input
                            type="text"
                            class="form-control"
                            placeholder="www.example.com">

                    </div>

                    <div class="form-group full-width">

                        <label>Store Address</label>

                        <textarea
                            rows="5"
                            class="form-control"
                            placeholder="Store address..."></textarea>

                    </div>

                </div>

            </form>

        </div>

        <div class="settings-card-footer">

            <button class="btn-primary">

                <i class="fa-solid fa-floppy-disk"></i>

                Save Store

            </button>

        </div>

    </div>


    <!-- =======================================================
        SYSTEM SETTINGS
    ======================================================== -->

    <div class="settings-card">

        <div class="settings-card-header">

            <div class="settings-icon">
                <i class="fa-solid fa-gears"></i>
            </div>

            <div>

                <h2>System Settings</h2>

                <p>Application preferences.</p>

            </div>

        </div>

        <div class="settings-card-body">

            <form>

                <div class="form-grid">

                    <div class="form-group">

                        <label>Currency</label>

                        <select class="form-control">

                            <option>SAR</option>
                            <option>USD</option>
                            <option>YER</option>

                        </select>

                    </div>

                    <div class="form-group">

                        <label>Timezone</label>

                        <select class="form-control">

                            <option>Asia/Riyadh</option>

                        </select>

                    </div>

                    <div class="form-group">

                        <label>Products Per Page</label>

                        <input
                            type="number"
                            class="form-control"
                            value="10">

                    </div>

                    <div class="form-group">

                        <label>Orders Per Page</label>

                        <input
                            type="number"
                            class="form-control"
                            value="10">

                    </div>

                    <div class="form-group">

                        <label>Tax (%)</label>

                        <input
                            type="number"
                            class="form-control"
                            value="15">

                    </div>

                    <div class="form-group">

                        <label>Shipping Fee</label>

                        <input
                            type="number"
                            class="form-control"
                            value="25">

                    </div>

                </div>

            </form>

        </div>

        <div class="settings-card-footer">

            <button class="btn-primary">

                <i class="fa-solid fa-floppy-disk"></i>

                Save Settings

            </button>

        </div>

    </div>


    <!-- =======================================================
        NOTIFICATIONS
    ======================================================== -->

    <div class="settings-card">

        <div class="settings-card-header">

            <div class="settings-icon">
                <i class="fa-solid fa-bell"></i>
            </div>

            <div>

                <h2>Notifications</h2>

                <p>Control notification preferences.</p>

            </div>

        </div>

        <div class="settings-card-body">

            <div class="notification-list">

                <label>

                    <input type="checkbox" checked>

                    Email Notifications

                </label>

                <label>

                    <input type="checkbox" checked>

                    New Orders

                </label>

                <label>

                    <input type="checkbox">

                    Low Stock Alert

                </label>

                <label>

                    <input type="checkbox">

                    Newsletter

                </label>

            </div>

        </div>

        <div class="settings-card-footer">

            <button class="btn-primary">

                <i class="fa-solid fa-floppy-disk"></i>

                Save Notifications

            </button>

        </div>

    </div>


    <!-- =======================================================
        SECURITY
    ======================================================== -->

    <div class="settings-card">

        <div class="settings-card-header">

            <div class="settings-icon">
                <i class="fa-solid fa-lock"></i>
            </div>

            <div>

                <h2>Security</h2>

                <p>Update your account password.</p>

            </div>

        </div>

        <div class="settings-card-body">

            <form>

                <div class="form-grid">

                    <div class="form-group">

                        <label>Current Password</label>

                        <input
                            type="password"
                            class="form-control">

                    </div>

                    <div class="form-group">

                        <label>New Password</label>

                        <input
                            type="password"
                            class="form-control">

                    </div>

                    <div class="form-group full-width">

                        <label>Confirm Password</label>

                        <input
                            type="password"
                            class="form-control">

                    </div>

                </div>

            </form>

        </div>

        <div class="settings-card-footer">

            <button class="btn-primary">

                <i class="fa-solid fa-key"></i>

                Change Password

            </button>

        </div>

    </div>

</div>

@endsection