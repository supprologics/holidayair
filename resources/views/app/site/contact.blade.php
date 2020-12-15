@extends('layouts.site')


@section('css')
<style type="text/css">

    .map-container-section {
      overflow:hidden;
      /* padding-bottom:56.25%; */
      position:relative;
      height:0;
    }
  .map-container-section iframe {
      left:0;
      top:0;
      height:100%;
      width:100%;
      position:absolute;
    }
  </style>
@endsection
@section('content')


<section id="content">
    <div class="container">
        
        <figure class="image-container">
            <img src="{{ asset('/images/contact.jpg' )}}" alt=""  />
        </figure>

        <div id="main">
            <section style="margin-top: 50px; margin-bottom:50px">
                <div id="map-container-demo-section" class="z-depth-1-half map-container-section mb-4 my-5" style="height: 300px">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2475.2667291423304!2d-0.20373388386774224!3d51.65495267965962!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48761791da9ace67%3A0x6df7b1d549105bc6!2s130%20High%20St%2C%20Barnet%20EN5%205XQ%2C%20UK!5e0!3m2!1sen!2slk!4v1605888370670!5m2!1sen!2slk" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>                    
            </section>

            <div class="contact-address row block">
                <div class="col-md-4">
                    <div class="icon-box style5">
                        <i class="soap-icon-phone"></i>
                        <div class="description">
                            <small>We are on 24/7</small>
                            <h5>+44 (0) 208 44 00 770</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="icon-box style5">
                        <i class="soap-icon-message"></i>
                        <div class="description">
                            <small>Send us email on</small>
                            <h5>info@holidayair.com</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="icon-box style5">
                        <i class="soap-icon-address"></i>
                        <div class="description">
                            <small>meet us at</small>
                            <h5>130 High Street Barnet EN5 5XQ Chipping Barnet, UK</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="travelo-box box-full">
                <div class="contact-form">
                    <h2>Send us a Message</h2>
                    <form class="contact-form" action="contact-us-handler.php" method="post" onsubmit="return false;">
                        <div class="alert small-box" style="display: none;"></div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Your Name</label>
                                    <input type="text" name="name" class="input-text full-width">
                                </div>
                                <div class="form-group">
                                    <label>Your Email</label>
                                    <input type="text" name="email" class="input-text full-width">
                                </div>
                                <div class="form-group">
                                    <label>Subject</label>
                                    <input type="text" name="subject" class="input-text full-width">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label>Your Message</label>
                                    <textarea name="message" rows="11" class="input-text full-width" placeholder="write message here"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-sms-offset-6 col-sm-offset-6 col-md-offset-8 col-lg-offset-9">
                            <button type="submit" class="btn-medium full-width">SEND MESSAGE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
        <!-- Google Map Api -->
        <script type='text/javascript' src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
        <script type="text/javascript" src="js/gmap3.min.js"></script>

        <script type="text/javascript" src="js/theme-scripts.js"></script>
        <script type="text/javascript" src="js/contact.js"></script>
        <script type="text/javascript">
            tjq(".travelo-google-map").gmap3({
                map: {
                    options: {
                        center: [48.85661, 2.35222],
                        zoom: 12
                    }
                },
                marker:{
                    values: [
                        {latLng:[48.85661, 2.35222], data:"Paris"}
    
                    ],
                    options: {
                        draggable: false
                    },
                }
            });
        </script>
        
@endsection