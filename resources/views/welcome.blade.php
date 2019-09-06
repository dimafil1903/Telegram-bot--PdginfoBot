<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang=uk> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang=uk> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang=uk> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang=uk>
<head>
    <meta charset=utf-8>
    <meta http-equiv=X-UA-Compatible content="IE=edge"/>
    <meta name=description content="{{ setting('site.description')}}"/>
    <meta name=keywords content="Bot, Pidgorodne.info,Pidgorodne, Бот Підгородне,інфо, Бот Подгородное,инфо, ">
    <meta name=viewport content="width=device-width, initial-scale=1.0"/>
    <title>{{ setting('site.title')}}</title>
    <link rel="shortcut icon" href=images/favicon.ico type=image/x-icon>
    <link rel=icon href=images/favicon.ico type=image/x-icon>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel=stylesheet>
   <link href="{{ asset('css/flaticon.css')}}" rel=stylesheet>
    <link href="{{ asset('css/magnific-popup.css')}}" rel=stylesheet>
    <link href="{{ asset('css/owl.carousel.min.css')}}" rel=stylesheet>
    <link href="{{ asset('css/owl.theme.default.min.css')}}" rel=stylesheet>
    <link href="{{ asset('css/slick.css')}}" rel=stylesheet>
    <link href="{{ asset('css/slick-theme.css')}}" rel=stylesheet>
    <link href="{{ asset('css/animate.css')}}" rel=stylesheet>
    <link href="{{ asset('css/spinner.css')}}" rel=stylesheet>
    <link href="{{ asset('css/bootstrap.min.css')}}" rel=stylesheet>
    <link href="{{ asset('css/fontawesome.min.css')}}" rel=stylesheet>
    <link href="{{ asset('css/style.css')}}" rel=stylesheet>
    <style>.dropdown-item{margin: 5px}</style>
    <link href="{{ asset('css/responsive.css')}}" rel=stylesheet>
</head>
<body>
<div id=loader-wrapper>
    <div id=loader>
        <div class=cssload-spinner></div>
    </div>
</div>
<div id=page class=page>
    <header id=header class=header>
        <nav class="navbar fixed-top navbar-expand-md hover-menu navbar-light bg-tra white-scroll">
            <div class=container>
                <a href=#hero-6 class="navbar-brand logo-black"><img src='{{asset('images/logo.png ')}}' width=180 height=40 alt=header-logo></a>
                <button class=navbar-toggler type=button data-toggle=collapse data-target=#navbarContent aria-controls=navbarContent aria-expanded=false aria-label="Toggle navigation">
                    <span class=navbar-bar-icon><i class="fas fa-bars"></i></span>
                </button>
                <div id=navbarContent class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">



                        <li><a class=dropdown-item href=#features-2>Переваги Bot PdgInfo</a></li>
                        <li><a class=dropdown-item href=#info-1>Приклад використання</a></li>
                        <li><a class=dropdown-item href=#statistic-1>Цікава статистика</a></li>
                        <li class="nav-item nl-simple"><a class=dropdown-item href=#download-5>Як користуватися</a></li>

                        <li class="nav-item nl-simple"><a class=dropdown-item href=#faqs-2>FAQs</a></li>

                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <section id=hero-6 class="bg-scroll hero-section division">
        <div class=container>
            <div class="row d-flex align-items-top">
                <div class="col-md-6 col-xl-6">
                    <div class="hero-6-img text-center mb-40 wow fadeInRight" data-wow-duration=1.5s data-wow-delay=0.5s>
                        <img class=img-fluid src=images/hero-6-img.jpg alt=hero-image />
                    </div>
                </div>
                <div class="col-md-6 col-xl-5 offset-xl-1">
                    <div class="hero-txt mb-40 wow fadeInUp" data-wow-delay=0.3s>
                        <div class=hero-app-data>
                            <h1 class=h4-lg>Бот Pidgorodne.info</h1>
                            <span class=app-version>Beta</span>
                        </div>
                        <h3 class=h3-xl>Помічник для жителів міста Підгородного</h3>
                        <p class="p-md grey-color">Дізнайтесь: інформацію про депутатів міської ради, графіки і схеми місцевого транспорту, та ще багато чого &#128515;
                        </p>
                        <a href="https://t.me/PdgInfoBot" class="btn btn-blue black-hover mr-10">Спробувати зараз</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id=features-2 class="bg-lightgrey wide-60 features-section division">
        <div class=container>
            <div class=row>
                <div class="col-md-4 col-lg-4">
                    <div class="fbox-2 icon-sm wow fadeInUp" data-wow-delay=0.3s>
                        <span class=flaticon-004-tap></span>
                        <div class=fbox-2-txt>
                            <h5 class=h5-sm>Простота використання</h5>
                            <p>Ми постаралися зробити бота якмога простіше, аби у вас не виникало складнощів під час його використання
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="fbox-2 icon-sm wow fadeInUp" data-wow-delay=0.5s>
                        <span class=flaticon-090-settings-1></span>
                        <div class=fbox-2-txt>
                            <h5 class=h5-sm>Розвиток</h5>
                            <p>Постійна підтримка та додавання нових фунцкій
                            </p>
                        </div>
                    </div>
                </div>


                <div class="col-md-4 col-lg-4">
                    <div class="fbox-2 icon-sm wow fadeInUp" data-wow-delay=0.5s>
                        <span class=flaticon-044-wall-clock-1></span>
                        <div class=fbox-2-txt>
                            <h5 class=h5-sm>Постійно на звязку</h5>
                            <p>На відміну від людини, бот у будь-яку годину зможе вам допомогти дізнатись необхідну інформацію
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section id=info-1 class="info-1-row wide-60 info-section division">
        <div class=container>
            <div class="row d-flex align-items-top">
                <div class=col-md-6>
                    <div class="txt-block pc-45 mb-40 wow fadeInUp" data-wow-delay=0.3s>
                        <span class="section-id id-color">Приклад використання</span>
                        <h3 class=h3-lg>Бот має декілька категорій</h3>
                        <ul class="txt-list mb-35">
                            <li>Довідник - тут ви дізнаєтесь про всі послуги, що можуть надавати люди в місті Підгородне</li>
                            <li>Депутати - це кнопка для інформування людей у політичній сфері міста Підгородне
                            </li>
                            <li>Транспорт - дізнайтесь графіки та схеми руху маршруток міста Підгородне</li>
                            <li>*
                            </li>
                        </ul>
                        <!--<a href="https://www.youtube.com/watch?v=7e90gBu4pas" class="video-popup2 btn btn-tra-grey black-hover">
                        See the NextApp in action
                        </a>-->
                    </div>
                </div>
                <div class=col-md-6>
                    <div class="img-block pr-45 mb-40 wow fadeInUp" data-wow-duration=1.5s data-wow-delay=0.8s>
                        <video class="img-fluid" autoplay loop muted >
                            <source  src="images/video-16.mp4" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id=statistic-1 class="bg-fixed bg-graph wide-60 statistic-section division">
        <div class="container white-color">
            <div class=row>
                <div class="col-lg-10 offset-lg-1 section-title">
                    <h3 class=h3-lg>Цікава статистика</h3>
                    <p class=p-md>
                    </p>
                </div>
            </div>
            <div class=row>
                <div class="col-md-10 col-lg-8 offset-md-1 offset-lg-2">
                    <div class=row>
                        <div class=col-sm-4>
                            <div class="statistic-block wow fadeInUp" data-wow-duration=1s data-wow-delay=0.3s>
                                <h5 class=statistic-number><span class=count-element>{{$users_count}}</span></h5>
                                <p class=txt-400>Користувачів</p>
                            </div>
                        </div>
                        <div class=col-sm-4>
                            <div class="statistic-block wow fadeInUp" data-wow-duration=1s data-wow-delay=0.5s>
                                <h5 class=statistic-number><span class=count-element>{{$messages_count}}</span></h5>
                                <p class=txt-400>Повідомлень</p>
                            </div>
                        </div>

                        <div class=col-sm-4>
                            <div class="statistic-block wow fadeInUp" data-wow-duration=1s data-wow-delay=0.7s>
                                <h5 class=statistic-number><span class=count-element>{{$streets_count}}</span></h5>
                                <p class=txt-400>Вулиць зареєстровано</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






    <section id=download-5 class="bg-scroll bg-image pt-100 download-section division">
        <div class="container white-color">
            <div class="row d-flex align-items-center">
                <div class=col-md-6>
                    <div class="download-5-img text-center wow fadeInUp" data-wow-duration=1.5s data-wow-delay=0.8s>
                        <img class=img-fluid src=images/image-16.png alt=download-image />
                    </div>
                </div>
                <div class=col-md-6>
                    <div class="download-txt mb-40 wow fadeInUp" data-wow-delay=0.3s>
                        <h3 class=h3-xl>Для роботи з ботом завантаж додаток Telegram</h3>
                        <p>Telegram — месенджер, програмне забезпечення для смартфонів, планшетів та ПК, яке дозволяє обмінюватися текстовими повідомленнями та різноманітними файлами, зокрема графічними файлами та відеофайлами, а також безкоштовно телефонувати іншим користувачам програми.

                            Обліковий запис користувача прив'язується до номеру мобільного телефону: щоб авторизуватися, потрібно ввести код авторизації з СМС. Такі коди мають обмежені терміни придатності. Таким чином, користувач позбавляється необхідності запам'ятовувати чи зберігати десь свій пароль.
                        </p>
                        <div class=stores-badge>
                            <a href="https://telegram.org/dl/ios" class=store>
                                <img class=appstore-original src=images/store_badges/appstore.png alt=appstore-logo />
                            </a>
                            <a href='https://telegram.org/dl/android' class=store>
                                <img class=googleplay-original src=images/store_badges/googleplay.png alt=googleplay-logo />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id=faqs-2 class="bg-fixed wide-100 faqs-section division">
        <div class=container>
            <div class=row>
                <div class="col-lg-10 offset-lg-1 section-title">
                    <h3 class=h3-lg>Часті запитання</h3>
                    <p class=p-md>Aliquam a augue suscipit, luctus neque purus ipsum neque dolor primis
                        libero tempus, blandit posuere ligula varius magna congue cursus porta
                    </p>
                </div>
            </div>
            <div class=row>
                <div class=col-lg-6>
                    <div class=questions-holder>
                        <div class="question wow fadeInUp" data-wow-delay=0.3s>
                            <h5 class=h5-xs>Do you have a free trial?</h5>
                            <p>Etiam sit amet mauris suscipit sit amet in odio. Integer congue leo metus. Vitae arcu mollis blandit
                                ultrice ligula egestas magna suscipit lectus magna suscipit luctus undo blandit vitae purus laoreet
                            </p>
                        </div>
                        <div class="question wow fadeInUp" data-wow-delay=0.5s>
                            <h5 class=h5-xs>How can I update or cancel my personal information?</h5>
                            <ul class="txt-list mb-35">
                                <li>Vitae auctor integer congue magna at pretium</li>
                                <li>Integer congue magna at pretium purus pretium ligula rutrum luctus risus eros
                                    dolor auctor ipsum blandit purus
                                </li>
                                <li>Sagittis congue augue egestas volutpat egestas magna</li>
                            </ul>
                        </div>
                        <div class="question wow fadeInUp" data-wow-delay=0.7s>
                            <h5 class=h5-xs>How do I download videos from online viewing?</h5>
                            <p>Feugiat eros, ac tincidunt ligula massa in faucibus orci luctus et ultrices posuere cubilia curae</p>
                        </div>
                        <div class="question wow fadeInUp" data-wow-delay=0.9s>
                            <h5 class=h5-xs>Why do you require Bluetooth to be on? </h5>
                            <p>Praesent semper, lacus sed cursus porta, odio augue ligula massa risus laoreet. Laoreet auctor massa
                                varius amet
                            </p>
                        </div>
                    </div>
                </div>
                <div class=col-lg-6>
                    <div class="questions-holder ind-30">
                        <div class="question wow fadeInUp" data-wow-delay=0.3s>
                            <h5 class=h5-xs>How do I add a photo to an item?</h5>
                            <p>Feugiat eros ligula massa lipsum primis in orci luctus et ultrices posuere cubilia curae
                                congue lorem. ante ipsum primis in faucibus bibendum sit amet in odio
                            </p>
                        </div>
                        <div class="question wow fadeInUp" data-wow-delay=0.5s>
                            <h5 class=h5-xs>How do I edit a filter to modify which items it shows?</h5>
                            <p>Praesent semper lacus sed cursus porta, feugiat primis in orci luctus ligula eros ac ligula
                                massa in faucibus orci luctus et ultrices posuere ante ipsum primis in faucibus bibendum sit
                                amet in odio.
                            </p>
                        </div>
                        <div class="question wow fadeInUp" data-wow-delay=0.7s>
                            <h5 class=h5-xs>Feature Overview - Stores & Filters</h5>
                            <p>Praesent semper, lacus sed cursus porta,feugiat primis in faucibus orci luctus tincidunt ligula
                                ultrice sapien egestas lobortis magna
                            </p>
                        </div>
                        <div class="question wow fadeInUp" data-wow-delay=0.9s>
                            <h5 class=h5-xs>Will there be a NextApp Android app?</h5>
                            <p>Feugiat eros, ac tincidunt ligula massa in faucibus orci luctus et ultrices posuere cubilia curae
                                integer congue leo metus, eu mollis lorem primis in orci
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <footer id=footer-1 class="wide-50 footer division">
        <div class=container>
            <div class=row>
                <div class=col-xl-3>
                    <div class="footer-info mb-40">
                        <img src=images/logo.png width=160 height=40 alt=footer-logo>
                        <p class=mt-20>Бот в месенджер додатку Telegram
                        </p>
                    </div>
                </div>
                <div class="col-xl-3 ">
                    <div class=footer-links>
                        <ul class="foo-links clearfix">
                            <li><p>Розробник</p></li>
                            <li><p><a href="https://www.facebook.com/profile.php?id=100017294351768"><i class="fab fa-facebook"></i>Facebook</a></p></li>
                            <li><p><a href="https://t.me/dimafil1903"><i class="fab fa-telegram"></i>Telegram</a></p></li>
                            <li><p><a href="https://www.instagram.com/dimafil1903/"><i class="fab fa-instagram"></i>Instagram</a></p></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class=footer-links>
                        <ul class="foo-links clearfix">
                            <li><a href=#features-2>Переваги Bot PdgInfo</a></li>
                            <li><a href=#info-1>Приклад використання</a></li>
                            <li><a href=#statistic-1>Цікава статистика</a></li>
                            <li ><a  href=#download-5>Як користуватися</a></li>

                            <li ><a href=#faqs-2>FAQs</a></li>
                        </ul>
                    </div>
                </div>
                <div class=" col-xl-3">
                    <div class=footer-links>
                        <ul class="foo-links clearfix">
                            <li><p>Pidgorodne.info</p></li>
                            <li><p><a href="https://www.facebook.com/groups/Pidgorodne.Info/"><i class="fab fa-facebook"></i> Facebook</a></p></li>
                            <li><p><a href="https://www.pidgorodne.info"><i class="fas fa-passport"></i> Сайт</a></p></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </footer>
</div>
<script src={{ asset('js/jquery-3.3.1.min.js')}}></script>
<script src={{ asset('js/bootstrap.min.js')}}></script>
<script src={{ asset('js/fontawesome.min.js')}}></script>
<script src={{ asset('js/modernizr.custom.js')}}></script>
<script src={{ asset('js/jquery.easing.js')}}></script>
<script src={{ asset('js/jquery.appear.js')}}></script>
<script src={{ asset('js/jquery.stellar.min.js')}}></script>
<script src={{ asset('js/jquery.scrollto.js')}}></script>
<script src={{ asset('js/imagesloaded.pkgd.min.js')}}></script>
<script src={{ asset('js/isotope.pkgd.min.js')}}></script>
<script src={{ asset('js/slick.min.js')}}></script>
<script src={{ asset('js/owl.carousel.min.js')}}></script>
<script src={{ asset('js/jquery.magnific-popup.min.js')}}></script>
<script src={{ asset('js/contact-form.js')}}></script>
<script src={{ asset('js/quick-form.js')}}></script>
<script src={{ asset('js/comment-form.js')}}></script>
<script src={{ asset('js/jquery.validate.min.js')}}></script>
<script src={{ asset('js/jquery.ajaxchimp.min.js')}}></script>
<script src={{ asset('js/wow.js')}}></script>
<script src={{ asset('js/custom.min.js')}}></script>
<script>new WOW().init();</script>
<!-- [if lt IE 9]>
<script src={{ asset('js/html5shiv.js')}} type=text/javascript></script>
<script src={{ asset('js/respond.min.js')}} type=text/javascript></script>
<![endif] -->
</body>
</html>