<footer class="footer_area section_padding_100_0">
    <div class="container">
        <div class="row">
            <!-- Single Footer Area -->
            <div class="col-12 col-sm-6 col-md-5 col-lg-4 col-xl-3">
                <div class="single_footer_area mb-100">
                    <div class="footer_heading mb-4">
                        <h6>Contactez-nous</h6>
                    </div>
                    <ul class="footer_content">
                        <li><span>Adresse:</span> {{App\Models\Parametre::value('adresse')}}</li>
                        <li><span>Phone:</span> {{App\Models\Parametre::value('telephone')}}</li>
                        <li><span>FAX:</span> {{App\Models\Parametre::value('fax')}}</li>
                        <li><span>Email:</span> {{App\Models\Parametre::value('email')}}</li>
                    </ul>
                    <div class="footer_social_area mt-15">
                        <a href="{{App\Models\Parametre::value('facebook_url')}}"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="{{App\Models\Parametre::value('twitter_url')}}"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="{{App\Models\Parametre::value('linkedin_url')}}"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        <a href="{{App\Models\Parametre::value('pinterest_url')}}"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>

            <!-- Single Footer Area -->
            <div class="col-12 col-sm-6 col-md col-lg-4 col-xl-2">
                <div class="single_footer_area mb-100">
                    <div class="footer_heading mb-4">
                        <h6>Information</h6>
                    </div>
                    <ul class="footer_widget_menu">
                        <li><a href="#"><i class="icofont-rounded-right"></i> Votre compte</a></li>
                        {{-- <li><a href="#"><i class="icofont-rounded-right"></i> Politique de livraison gratuite</a></li> --}}
                        <li><a href="#"><i class="icofont-rounded-right"></i> Votre panier</a></li>
                        <li><a href="#"><i class="icofont-rounded-right"></i> Politique de retour</a></li>
                        <li><a href="#"><i class="icofont-rounded-right"></i> Coupon gratuit</a></li>
                        {{-- <li><a href="#"><i class="icofont-rounded-right"></i> Informations de livraison</a></li> --}}
                    </ul>
                </div>
            </div>

            <!-- Single Footer Area -->
            <div class="col-12 col-sm-6 col-md col-lg-4 col-xl-2">
                <div class="single_footer_area mb-100">
                    <div class="footer_heading mb-4">
                        <h6>Compte</h6>
                    </div>
                    <ul class="footer_widget_menu">
                        <li><a href="#"><i class="icofont-rounded-right"></i> Support produit</a></li>
                        <li><a href="#"><i class="icofont-rounded-right"></i> Termes &amp; Conditions</a></li>
                        <li><a href="#"><i class="icofont-rounded-right"></i> Aide</a></li>
                        <li><a href="#"><i class="icofont-rounded-right"></i> Mode de paiement</a></li>
                        <li><a href="#"><i class="icofont-rounded-right"></i> Programme d'affiliation</a></li>
                        {{-- <li><a href="#"><i class="icofont-rounded-right"></i> Politique de confidentialité</a></li> --}}
                    </ul>
                </div>
            </div>

            <!-- Single Footer Area -->
            <div class="col-12 col-sm-6 col-md-5 col-lg-4 col-xl-2">
                <div class="single_footer_area mb-100">
                    <div class="footer_heading mb-4">
                        <h6>Support</h6>
                    </div>
                    <ul class="footer_widget_menu">
                        <li><a href="#"><i class="icofont-rounded-right"></i> Mode de paiement</a></li>
                        <li><a href="#"><i class="icofont-rounded-right"></i> Aide</a></li>
                        <li><a href="#"><i class="icofont-rounded-right"></i> Support produit</a></li>
                        <li><a href="#"><i class="icofont-rounded-right"></i> Termes &amp; Conditions</a></li>
                        {{-- <li><a href="#"><i class="icofont-rounded-right"></i> Politique de confidentialité</a></li> --}}
                        {{-- <li><a href="#"><i class="icofont-rounded-right"></i> Programme d'affiliation</a></li> --}}
                    </ul>
                </div>
            </div>

            <!-- Single Footer Area -->
            <div class="col-12 col-md-7 col-lg-8 col-xl-3">
                <div class="single_footer_area mb-50">
                    <div class="footer_heading mb-4">
                        <h6>Joignez-vous à notre liste d'envoi</h6>
                    </div>
                    <div class="subscribtion_form">
                        <form action="#" method="post">
                            <input type="email" name="mail" class="form-control mail"
                                placeholder="Votre adresse e-mail">
                            <button type="submit" class="submit"><i class="icofont-long-arrow-right"></i></button>
                        </form>
                    </div>
                </div>
                {{-- <div class="single_footer_area mb-100">
                    <div class="footer_heading mb-4">
                        <h6>Download our Mobile Apps</h6>
                    </div>
                    <div class="apps_download">
                        <a href="#"><img src="frontend/img/core-img/play-store.png" alt="Play Store"></a>
                        <a href="#"><img src="frontend/img/core-img/app-store.png" alt="Apple Store"></a>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer_bottom_area">
        <div class="container">
            <div class="row align-items-center">
                <!-- Copywrite -->
                <div class="col-12 col-md-6">
                    <div class="copywrite_text">
                        <p>Créé <i class="fa fa-heart" aria-hidden="true"></i> by <a href="#">{{App\Models\Parametre::value('footer')}}</a></p>
                    </div>
                </div>
                <!-- Payment Method -->
                <div class="col-12 col-md-6">
                    <div class="payment_method">
                        <img src="frontend/img/payment-method/paypal.png" alt="">
                        <img src="frontend/img/payment-method/maestro.png" alt="">
                        <img src="frontend/img/payment-method/western-union.png" alt="">
                        <img src="frontend/img/payment-method/discover.png" alt="">
                        <img src="frontend/img/payment-method/american-express.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>