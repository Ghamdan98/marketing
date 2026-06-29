@extends('layout.master')
@section('title' , 'Contact us')
@section('content')
<section class="header">

    <h1>Contact Us</h1>

    <p>
        We'd love to hear from you. Send us your message anytime.
    </p>

</section>

<!-- Contact Section -->

<section class="contact-section">

    <div class="contact-container">

        <!-- Contact Info -->

        <div class="contact-info">

            <h2>Get In Touch</h2>

            <div class="info-box">

                <h4>Email</h4>

                <p>support@mystore.com</p>

            </div>

            <div class="info-box">

                <h4>Phone</h4>

                <p>+966 500 000 000</p>

            </div>

            <div class="info-box">

                <h4>Address</h4>

                <p>Riyadh, Saudi Arabia</p>

            </div>

            <div class="info-box">

                <h4>Working Hours</h4>

                <p>Sunday - Thursday : 9 AM - 6 PM</p>

            </div>

        </div>

        <!-- Contact Form -->

        <div class="contact-form">

            <h2>Send Message</h2>

            <form>

                <div class="input-group">

                    <input type="text" placeholder="Your Name">

                </div>

                <div class="input-group">

                    <input type="email" placeholder="Your Email">

                </div>

                <div class="input-group">

                    <input type="text" placeholder="Subject">

                </div>

                <div class="input-group">

                    <textarea placeholder="Your Message"></textarea>

                </div>

                <button class="btn">
                    Send Message
                </button>

            </form>

        </div>

    </div>

</section>
@endsection