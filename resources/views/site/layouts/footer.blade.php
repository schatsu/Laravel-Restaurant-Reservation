<section data-bs-version="5.1" class="footer1 cid-tT5jTv6rSe" once="footers" id="footer1-9">
    <div class="container">
        <div class="row mbr-white">
            <div class="col-12 col-md-6 col-lg-4">
                <h5 class="mbr-section-subtitle mbr-fonts-style mb-2 display-7">
                    <strong>Hızlı linkler</strong>
                </h5>
                <ul class="list mbr-fonts-style display-4">
                    <a href="{{route('home-page')}}"><li class="mbr-text item-wrap">Anasayfa</li></a>
                    <a href="{{route('about-us')}}"><li class="mbr-text item-wrap">Hakkımızda </li></a>
                    <a href="{{route('menu')}}"><li class="mbr-text item-wrap">Menü</li></a>
                    <a href="{{route('service')}}"><li class="mbr-text item-wrap">Hizmetler </li></a>
                    <a href="{{route('reservation')}}"><li class="mbr-text item-wrap">Rezervasyon </li></a>
                    <a href="{{route('contactForm')}}"><li class="mbr-text item-wrap">İletişim </li></a>

                </ul>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <h5 class="mbr-section-subtitle mbr-fonts-style mb-2 display-7">
                    <strong>Adres</strong>
                </h5>
                <ul class="list mbr-fonts-style display-4">
                    <a href="https://maps.app.goo.gl/34pug3TsFVFF5zVNA" target="_blank" ><li class="mbr-text item-wrap">Vişnezade, Dolmabahçe Cd. No:1, 34357 Besiktas/Istanbul</li></a>
                </ul>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <h5 class="mbr-section-subtitle mbr-fonts-style mb-2 display-7">
                    <strong>Lara Restaurant</strong>
                </h5>
                <p class="mbr-text mbr-fonts-style mb-4 display-4">
                   {{isset($settings) ? $settings->footer_text :''}}
                </p>
                <h5 class="mbr-section-subtitle mbr-fonts-style mb-3 display-7">
                    <strong>Social</strong>
                </h5>
                <div class="social-row display-7">
                    <div class="soc-item">
                        <a href="{{isset($settings) ? $settings->facebook : ''}}" target="_blank">
                            <span class="mbr-iconfont socicon socicon-facebook"></span>
                        </a>
                    </div>
                    <div class="soc-item">
                        <a href="{{isset($settings) ? $settings->twitter : ''}}" target="_blank">
                            <span class="mbr-iconfont socicon socicon-twitter"></span>
                        </a>
                    </div>
                    <div class="soc-item">
                        <a href="{{isset($settings) ? $settings->instagram : ''}}" target="_blank">
                            <span class="mbr-iconfont socicon socicon-instagram"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
