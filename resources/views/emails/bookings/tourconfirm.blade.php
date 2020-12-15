@component('mail::message')
<div class="page-title-container">
    <div class="container">
        <div class="page-title pull-left">
            <h2 class="entry-title">Thank You</h2>
        </div>
    </div>
</div>
<section id="content" class="gray-area">
    <div class="container">
        <div class="row">
            <div id="main" class="col-sm-8 col-md-9">
                <div class="booking-information travelo-box">
                    <h2>Booking Confirmation</h2>
                    <hr />
                    <div class="booking-confirmation clearfix">
                        <i class="soap-icon-recommend icon circle"></i>
                        <div class="message">
                            <h4 class="main-message">Thank You. Your Booking Order is Confirmed Now.</h4>
                            <p>A confirmation email has been sent to your provided email address.</p>
                        </div>
                        <a href="#" class="button print-button btn-small uppercase">print Details</a>
                    </div>
                    <hr />
                    <h2>Traveler Information</h2>
                    <dl class="term-description">
                        <dt>Booking number:</dt><dd>{{ $data->id }}</dd>
                        <dt>Your Booking:</dt><dd>{{ $data->tour->name }}</dd>
                        <dt>Booking Date:</dt><dd>{{ $data->date }}</dd>
                        <dt>Adults:</dt><dd>{{ $data->adults }}</dd>
                        <dt>Kdis:</dt><dd>{{ $data->kids }}</dd>
                        <dt>First name:</dt><dd>{{ $data->first_name }}</dd>
                        <dt>Last name:</dt><dd>{{ $data->last_name }}</dd>
                        <dt>E-mail address:</dt><dd>{{ $data->email_address }}</dd>
                        <dt>Contact Number:</dt><dd>{{ $data->country_code }} {{ $data->phone_number }}</dd>
                        <dt>Street Address and number:</dt><dd>{{ $data->personal_address }}</dd>
                        <dt>Passport:</dt><dd>{{ $data->passport }}</dd>
                    </dl>
                    <hr />
                    <h2>Payment</h2>
                    <p>Praesent dolor lectus, rutrum sit amet risus vitae, imperdiet cursus neque. Nulla tempor nec lorem eu suscipit. Donec dignissim lectus a nunc molestie consectetur. Nulla eu urna in nisi adipiscing placerat. Nam vel scelerisque magna. Donec justo urna, posuere ut dictum quis.</p>
                    <br />
                    <p class="red-color">Payment is made by Credit Card Via Paypal.</p>
                    <hr />
                    <h2>View Booking Details</h2>
                    <p>Praesent dolor lectus, rutrum sit amet risus vitae, imperdiet cursus neque. Nulla tempor nec lorem eu suscipit. Donec dignissim lectus a nunc molestie consectetur. Nulla eu urna in nisi adipiscing placerat. Nam vel scelerisque magna. Donec justo urna, posuere ut dictum quis.</p>
                    <br />
                    <a href="#" class="red-color underline view-link">https://www.travelo.com/booking-details/?=f4acb19f-9542-4a5c-b8ee</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endcomponent
