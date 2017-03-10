<?php
	session_start();

	if( !isset( $_SESSION[ 'klient' ] ) )
	{
		header( 'Location: http://localhost:1234/palestra/index.php' );
		exit();
	}

	require_once $_SERVER[ 'DOCUMENT_ROOT' ] . '/palestra/baza_te_dhenave/database_handler.php';
	include 'header.php';
	include 'navigation.php';
?>
<style>
	html {margin-top: 30px;
	}
	body { background-color: black;opacity: 0.9;}
.hide-bullets {
    list-style:none;
    margin-left: -40px;
    margin-top:20px;
}

.thumbnail {
    padding: 0;
}

.carousel-inner>.item>img, .carousel-inner>.item>a>img {
    width: 100%;

}
</style>

<div class="container">
    <div id="main_area">
        <!-- Slider -->
        <div class="row">
            <div class="col-sm-6" id="slider-thumbs">
                <!-- Bottom switcher of slider -->
                <ul class="hide-bullets">
                    <li class="col-sm-3">
                        <a class="thumbnail" id="carousel-selector-0">
                            <img src="http://localhost:1234/palestra/_permbajtja/social/m111.jpg">
                        </a>
                    </li>

                    <li class="col-sm-3">
                        <a class="thumbnail" id="carousel-selector-1"><img src="http://localhost:1234/palestra/_permbajtja/social/m2.jpg"></a>
                    </li>

                    <li class="col-sm-3">
                        <a class="thumbnail" id="carousel-selector-2"><img src="http://localhost:1234/palestra/_permbajtja/social/m3.jpg"></a>
                    </li>

                    <li class="col-sm-3">
                        <a class="thumbnail" id="carousel-selector-3"><img src="http://localhost:1234/palestra/_permbajtja/social/m4.jpg"></a>
                    </li>

                    <li class="col-sm-3">
                        <a class="thumbnail" id="carousel-selector-4"><img src="http://localhost:1234/palestra/_permbajtja/social/m5.jpg"></a>
                    </li>

                    <li class="col-sm-3">
                        <a class="thumbnail" id="carousel-selector-5"><img src="http://localhost:1234/palestra/_permbajtja/social/m6.jpg"></a>
                    </li>
                    <li class="col-sm-3">
                        <a class="thumbnail" id="carousel-selector-6"><img src="http://localhost:1234/palestra/_permbajtja/social/m7.jpg"></a>
                    </li>

                    <li class="col-sm-3">
                        <a class="thumbnail" id="carousel-selector-7"><img src="http://localhost:1234/palestra/_permbajtja/social/m8.jpg"></a>
                    </li>

                    <li class="col-sm-3">
                        <a class="thumbnail" id="carousel-selector-8"><img src="http://localhost:1234/palestra/_permbajtja/social/m9.jpg"></a>
                    </li>

                    <li class="col-sm-3">
                        <a class="thumbnail" id="carousel-selector-9"><img src="http://localhost:1234/palestra/_permbajtja/social/m10.jpg"></a>
                    </li>
                    <li class="col-sm-3">
                        <a class="thumbnail" id="carousel-selector-10"><img src="http://localhost:1234/palestra/_permbajtja/social/m11.jpg"></a>
                    </li>

                    <li class="col-sm-3">
                        <a class="thumbnail" id="carousel-selector-11"><img src="http://localhost:1234/palestra/_permbajtja/social/m12.jpg"></a>
                    </li>

                    <li class="col-sm-3">
                        <a class="thumbnail" id="carousel-selector-12"><img src="http://localhost:1234/palestra/_permbajtja/social/m13.jpg"></a>
                    </li>

                    <li class="col-sm-3">
                        <a class="thumbnail" id="carousel-selector-13"><img src="http://localhost:1234/palestra/_permbajtja/social/m14.jpg"></a>
                    </li>
                    <li class="col-sm-3">
                        <a class="thumbnail" id="carousel-selector-14"><img src="http://localhost:1234/palestra/_permbajtja/social/m15.jpg"></a>
                    </li>

                    <li class="col-sm-3">
                        <a class="thumbnail" id="carousel-selector-15"><img src="http://localhost:1234/palestra/_permbajtja/social/m16.jpg"></a>
                    </li>
                    <li class="col-sm-3">
                        <a class="thumbnail" id="carousel-selector-15"><img src="http://localhost:1234/palestra/_permbajtja/social/m112.jpg"></a>
                    </li>
                    <li class="col-sm-3">
                        <a class="thumbnail" id="carousel-selector-15"><img src="http://localhost:1234/palestra/_permbajtja/social/m2.jpg"></a>
                    </li>
                    <li class="col-sm-3">
                        <a class="thumbnail" id="carousel-selector-15"><img src="http://localhost:1234/palestra/_permbajtja/social/m16.jpg"></a>
                    </li>
                    <li class="col-sm-3">
                        <a class="thumbnail" id="carousel-selector-15"><img src="http://localhost:1234/palestra/_permbajtja/social/ma.jpg"></a>
                    </li>

                    <li class="col-sm-3">
                        <a class="thumbnail" id="carousel-selector-15"><img src="http://localhost:1234/palestra/_permbajtja/social/md.jpg"></a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-6">
                <div class="col-xs-12" id="slider">
                    <!-- Top part of the slider -->
                    <div class="row">
                        <div class="col-sm-12" id="carousel-bounding-box">
                            <div class="carousel slide" id="myCarousel">
                                <!-- Carousel items -->
                                <div class="carousel-inner">
                                    <div class="active item" data-slide-number="0">
                                        <img src="http://localhost:1234/palestra/_permbajtja/social/m1.jpg"></div>

                                    <div class="item" data-slide-number="1">
                                        <img src="http://localhost:1234/palestra/_permbajtja/social/m2.jpg"></div>

                                    <div class="item" data-slide-number="2">
                                        <img src="http://localhost:1234/palestra/_permbajtja/social/m3.jpg"></div>

                                    <div class="item" data-slide-number="3">
                                        <img src="http://localhost:1234/palestra/_permbajtja/social/m4.jpg"></div>

                                    <div class="item" data-slide-number="4">
                                        <img src="http://localhost:1234/palestra/_permbajtja/social/m5.jpg"></div>

                                    <div class="item" data-slide-number="5">
                                        <img src="http://localhost:1234/palestra/_permbajtja/social/m6.jpg"></div>

                                    <div class="item" data-slide-number="6">
                                        <img src="http://localhost:1234/palestra/_permbajtja/social/m7.jpg"></div>

                                    <div class="item" data-slide-number="7">
                                        <img src="http://localhost:1234/palestra/_permbajtja/social/m8.jpg"></div>

                                    <div class="item" data-slide-number="8">
                                        <img src="http://localhost:1234/palestra/_permbajtja/social/m9.jpg"></div>

                                    <div class="item" data-slide-number="9">
                                        <img src="http://localhost:1234/palestra/_permbajtja/social/m10.jpg"></div>

                                    <div class="item" data-slide-number="10">
                                        <img src="http://localhost:1234/palestra/_permbajtja/social/m11.jpg"></div>

                                    <div class="item" data-slide-number="11">
                                        <img src="http://localhost:1234/palestra/_permbajtja/social/m12.jpg"></div>

                                    <div class="item" data-slide-number="12">
                                        <img src="http://localhost:1234/palestra/_permbajtja/social/m13.jpg"></div>

                                    <div class="item" data-slide-number="13">
                                        <img src="http://localhost:1234/palestra/_permbajtja/social/m14.jpg"></div>

                                    <div class="item" data-slide-number="14">
                                        <img src="http://localhost:1234/palestra/_permbajtja/social/m15.jpg"></div>

                                    <div class="item" data-slide-number="15">
                                        <img src="http://localhost:1234/palestra/_permbajtja/social/m16.jpg"></div>
									<div class="item" data-slide-number="15">
                                        <img src="http://localhost:1234/palestra/_permbajtja/social/m112.jpg"></div>
                                        <div class="item" data-slide-number="15">
                                        <img src="http://localhost:1234/palestra/_permbajtja/social/m2.jpg"></div>
                                        <div class="item" data-slide-number="15">
                                        <img src="http://localhost:1234/palestra/_permbajtja/social/m16.jpg"></div>
									<div class="item" data-slide-number="15">
                                        <img src="http://localhost:1234/palestra/_permbajtja/social/ma.jpg"></div>
                                        <div class="item" data-slide-number="15">
                                        <img src="http://localhost:1234/palestra/_permbajtja/social/md.jpg"></div>
                                </div>
                                <!-- Carousel nav -->
                                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                </a>
                                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/Slider-->
        </div>

    </div>
</div>
<hr>



<script>
  jQuery(document).ready(function($) {

        $('#myCarousel').carousel({
                interval: 5000
        });

        //Handles the carousel thumbnails
        $('[id^=carousel-selector-]').click(function () {
        var id_selector = $(this).attr("id");
        try {
            var id = /-(\d+)$/.exec(id_selector)[1];
            console.log(id_selector, id);
            jQuery('#myCarousel').carousel(parseInt(id));
        } catch (e) {
            console.log('Regex failed!', e);
        }
    });
        // When the carousel slides, auto update the text
        $('#myCarousel').on('slid.bs.carousel', function (e) {
                 var id = $('.item.active').data('slide-number');
                $('#carousel-text').html($('#slide-content-'+id).html());
        });
});
</script>