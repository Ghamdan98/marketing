<footer class="footer">

    <div class="container">

        <div class="footer-grid">

            <!-- Brand -->

            <div class="footer-section">

                <h3 class="footer-logo">
                    Ghamdan Store
                </h3>

                <p class="footer-text">
                    Your trusted online shopping destination with quality products and fast delivery.
                </p>

            </div>

            <!-- Quick Links -->

            <div class="footer-section">

                <h4 class="footer-title">
                    Quick Links
                </h4>

                <ul class="footer-links">

                    <li>
                        <a href="">
                            Home
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('shop.product') }}">
                            Products
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('shop.category') }}">
                            Categories
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('contact_us') }}">
                            Contact
                        </a>
                    </li>

                </ul>

            </div>

            <!-- Customer -->

            <div class="footer-section">

                <h4 class="footer-title">
                    Customer
                </h4>

                <ul class="footer-links">

                    <li>
                        <a href="{{ route('customer_orders') }}">
                            My Orders
                        </a>
                    </li>

                    @guest

                        <li>
                            <a href="{{ route('login') }}">
                                Login
                            </a>
                        </li>

                    @endguest

                </ul>

            </div>

            <!-- Contact -->

            <div class="footer-section">

                <h4 class="footer-title">
                    Contact
                </h4>

                <p>Email: info@ghamdanstore.com</p>

                <p>Phone: +966 5X XXX XXXX</p>

            </div>

        </div>

        <div class="footer-bottom">

            <p>
                © {{ date('Y') }} Ghamdan Store. All Rights Reserved.
            </p>

        </div>

    </div>

</footer>