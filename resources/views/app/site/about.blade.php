@extends('layouts.site')

@section('content')
<section id="content">
    <div class="container">
        <div id="main">

            
            <figure class="image-container">
                <img src="{{ asset('/images/about.jpg' )}}" alt=""  />
            </figure>

            <div class="image-style style1 large-block">

                <h1 class="title">We’re truely dedicated to make your travel experience as much simple and fun as possible!</h1>
                <p style="font-size: 110%">Holiday Air Limited is proud to be the UK’s independent travel agent and tour operator. We are part of a global distribution that connects airlines and hotels for the sales promotion of Best Flight Deals from the UK to around the world. We have been booking Flights & Holidays for our customers for over 15 years and have since become established as one of the finest names in the luxury and Leisure travel industry.
                    <br><br>
                    Our services are unrivalled when it comes to finding the Best deals available. We operate a business that allows our customers to book Best Flight Deals, organise complex holidays itineraries, and find the best last-minute deals to worldwide destinations. Our travel experts are equipped to handle every possible travel query and are here to give you the best customer service experience.
                    <br><br>
                    We take a very tailored approach to our business model and we are dedicated to offering our full attention to each customer. We understand shifting trends and ever-increasing customer demands and we work hard to make sure all our clients are satisfied with our service. We guarantee only the best solutions for drawing flight comparisons across all the top airlines as well as finding only the best and most suitable accommodation for you.
                    <br><br>
                    If you want to travel in style our expert team are with you every step of the way. We deliver worldwide travel products that are unique in quality and assembled according to the desires of our clients. We source the best Business Class Flights, dream accommodation, and the top car rental deals available. We also offer luxury travel packages, so all the hard work is done for you. We take care of everything, from excursions to transfers, to tailor made tours and more. We only offer the most reliable packages to ensure you get the best hassle-free holiday. We care about your safety and we only offer the safest and highly trusted travel products at the best price for our clients.
                    <br><br>
                    We are renowned for finding the most affordable all-inclusive travel solutions. We utilise our wide travel network which has been established over the years to connect our esteemed customers to the rest of the world.
                    <br><br>
                    Offering you the utmost peace of mind, we pride ourselves in being fully ATOL and IATA accredited. This guarantees that all our flight arrangements and flight-inclusive packages are financially protected. We always make sure that every travel supplier we handpick is a pioneer in the respective industry and with a proven track record of well protected service delivery.</p>

                <div class="clearfix"></div>
            </div>

            <div class="row large-block">
                <div class="col-sm-6 col-md-3">
                    <div class="icon-box style3 counters-box">
                        <div class="numbers">
                            <i class="soap-icon-places yellow-color"></i>
                            <span class="display-counter" data-value="3200">3200</span>
                        </div>
                        <div class="description">Amazing Places To Visit</div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="icon-box style3 counters-box">
                        <div class="numbers">
                            <i class="soap-icon-hotel blue-color"></i>
                            <span class="display-counter" data-value="5738">5738</span>
                        </div>
                        <div class="description">5 Star Hotels To Stay</div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="icon-box style3 counters-box">
                        <div class="numbers">
                            <i class="soap-icon-plane green-color"></i>
                            <span class="display-counter" data-value="4509">4509</span>
                        </div>
                        <div class="description">Airlines To Travel the World</div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="icon-box style3 counters-box">
                        <div class="numbers">
                            <i class="soap-icon-car red-color"></i>
                            <span class="display-counter" data-value="3250">3250</span>
                        </div>
                        <div class="description">VIP Transport Options</div>
                    </div>
                </div>
            </div>

            <div class="image-style style1 large-block">

                <h1 class="title">We have a dedicated team and global 24-hour assistance. Contact our travel team today to book your flights with the best UK travel agency and fly anywhere around the world. </h1>
                <p style="font-size: 120%">Flights and flight-inclusive holidays on this website are financially protected by the ATOL scheme. This website is registered in England and wales (registration no. add here). Add address here. All bookings protected under the ATOL scheme will receive an ATOL certificate. In cases where a part payment is made that flight booking is ATOL protected. In some cases, a certificate does not indicate all the trip segments - this means the omitted parts are not ATOL protected). Please refer to our booking conditions for further information please visit www.atol.org.uk/ATOLCertificate</p>

                <div class="clearfix"></div>
            </div>

            <div class="image-style style1 large-block text-center">

                <h1 class="title">Why book with Holiday Air Limited?</h1>
                <p style="font-size: 120%">Our straightforward booking process, years of experience and financial protection makes Holiday Air Limited the only place to book your holiday.
                     We are dedicated to helping you fulfil your travel dreams and are here to help you create travel stories from every continent you visit.<br>
                     1 most awarded brand in travel<br>
                     99% of our guests travel with us again, annually<br>
                     4.9 independent satisfaction rating</p><br><br>

                     <div class="row large-block">
                        <div class="col-md-6">
                            <div class="toggle-container box" id="accordion1">
                                <div class="panel style1">
                                    <h4 class="panel-title">
                                        <a href="#acc1" data-toggle="collapse" data-parent="#accordion1">Best Rates Guaranteed</a>
                                    </h4>
                                </div>
                                
                                <div class="panel style1">
                                    <h4 class="panel-title">
                                        <a class="collapsed" href="#acc2" data-toggle="collapse" data-parent="#accordion1">24/7 Customer Service</a>
                                    </h4>
                                </div>
                                
                                <div class="panel style1">
                                    <h4 class="panel-title">
                                        <a class="collapsed" href="#acc3" data-toggle="collapse" data-parent="#accordion1">ATOL Protected</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="toggle-container box" id="accordion1">
                                <div class="panel style1">
                                    <h4 class="panel-title">
                                        <a href="#acc1" data-toggle="collapse" data-parent="#accordion1">Duty of Care</a>
                                    </h4>
                                </div>
                                
                                <div class="panel style1">
                                    <h4 class="panel-title">
                                        <a class="collapsed" href="#acc2" data-toggle="collapse" data-parent="#accordion1">Bespoke Management</a>
                                    </h4>
                                </div>
                                
                                <div class="panel style1">
                                    <h4 class="panel-title">
                                        <a class="collapsed" href="#acc3" data-toggle="collapse" data-parent="#accordion1">Online Booking</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>



        </div> <!-- end main -->
    </div>
</section>
@endsection