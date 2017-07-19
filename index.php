<?php
	$description = 'Basics and Beyond for your kitchen, tabletop and entertaining, and toys for children. The Art of Gifting for all occasions - weddings, babies, teachers, holidays and yom tov.';
   include("header.php"); ?>
<script>
$.fn.preload = function() {
    this.each(function(){
        $('<img/>')[0].src = this;
    });
}

// Usage:

$(['img1.jpg','img2.jpg','img3.jpg']).preload();
</script>


<body>

     <?php include("topnav.php"); ?>

    <!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
            <li data-target="#myCarousel" data-slide-to="4"></li>
            <li data-target="#myCarousel" data-slide-to="6"></li>
            <li data-target="#myCarousel" data-slide-to="7"></li>
            <li data-target="#myCarousel" data-slide-to="8"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
           <!-- <div class="item active">
                <div class="fill" style="background-image:url(images/slideshowNew/shavuos.jpg);"></div>
                <div class="carousel-caption">
                    <h2>For your indoor garden</h2>
                </div>
            </div>-->
            <div class="item active">
                <div class="fill" style="background-image:url(images/slideshowNew/NEWLOOK/world.jpg); background-position:bottom center;"></div>
                
                <div class="carousel-caption">
                <div class="carousel-caption-behind">
                    <h2>Shop the World</h2>
                </div>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url(images/slideshowNew/NEWLOOK/table.jpg); background-position:bottom center;"></div>
                <div class="carousel-caption">
                <div class="carousel-caption-behind">
                    <h2>Table Settings</h2>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url(images/slideshowNew/NEWLOOK/kitchen.jpg);"></div>
                <div class="carousel-caption">
                <div class="carousel-caption-behind">
                    <h2>Your kitchen needs</h2>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url(images/slideshowNew/NEWLOOK/colour.jpg);"></div>
                <div class="carousel-caption">
                <div class="carousel-caption-behind">
                    <h2>It's a Colourful Life</h2>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url(images/slideshowNew/NEWLOOK/itsaparty.jpg);background-position:center center;""></div>
                <div class="carousel-caption">
                <div class="carousel-caption-behind">
                    <h2>Throw a Party</h2>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url(images/slideshowNew/NEWLOOK/bridal.jpg); background-position:90% center;"></div>
                <div class="carousel-caption">
                <div class="carousel-caption-behind">
                    <h2>Bridal Registry</h2>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url(images/slideshowNew/NEWLOOK/kids.jpg);"></div>
                <div class="carousel-caption">
                <div class="carousel-caption-behind">
                    <h2>Kids Gifts</h2>
                    </div>
                </div>
            </div>
            
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>

    <!-- Page Content -->

      <!-- Three columns of text below the carousel -->
      <div class="container circles">
      <div class="row circles">
        <div class="col-md-3 col-sm-6 col-xs-12 text-center">
          <a href="new.php"><div class="new-pic" style="width:143px; height:190px; border-radius:7px; margin-right:auto; margin-left:auto;"></div></a>
          <h2>What's New</h2>
          
          <p>Check out our latest products!</p>
          <p><a class="btn btn-default" href="new.php" role="button">Click here &raquo;</a></p>
        </div><!-- /.col-lg-3 -->
        <div class="col-md-3 col-sm-6 col-xs-12 text-center">
          <a href="products.php"><div class="products-pic" style="width:143px; height:190px; border-radius:7px; margin-right:auto; margin-left:auto;"></div></a>
          <h2>Products</h2>
          <p>A large sampling of our broad range of products.</p>
          <p><a class="btn btn-default" href="products.php" role="button">Browse Now &raquo;</a></p>
        </div><!-- /.col-lg-3 -->
        <div class="col-md-3 col-sm-6 col-xs-12 text-center">
          <a href="tipsntalk.php"><div class="tips-pic" style="width:143px; height:190px; border-radius:7px; margin-right:auto; margin-left:auto;"></div></a>
          <h2>Tips &amp; Talk</h2>
          <p>Helpful hints and recipes to enhance your kitchen experience.</p>
          <p><a class="btn btn-default" href="tipsntalk.php" role="button">Get cooking!</a></p>
        </div>
        <!-- /.col-lg-3 -->
        <div class="col-md-3 col-sm-6 col-xs-12 text-center">
         <a href="specials.php"> <div class="specials-pic" style="width:143px; height:190px; border-radius:7px; margin-right:auto; margin-left:auto;"></div></a>
          <h2>Specials</h2>
          <p>Check out this section <br>for great buys!</p>
          <p><a class="btn btn-default" href="specials.php" role="button">Save now &raquo;</a></p>
        </div><!-- /.col-lg-3 -->
      </div><!-- /.row -->
      </div>
      
      <!-- START THE FEATURETTES -->

      <hr id="about" class="featurette-divider">
		<div class="container featurette-outer">
      <div class="row featurette">
        <div class="col-md-7 col-md-push-5">
          <h2 class="featurette-heading">Kitchen Art - Wrapt:<span class="text-muted"> Our Store</span></h2>
          <br>
          <p class="lead">Welcome to Kitchen Art/Wrapt, where our wonderful selection, personal service and warm, inviting atmosphere keep bringing our customers back.</p>

<p class="lead">Kitchen Art opened its doors in 1982, with a small selection of specialty kitchen gadgets to complement a food decorating course.</p>

<p class="lead">Over the years, our inventory kept expanding and diversifying, and today, Kitchen Art includes a broad range of house wares, table and kitchen linens, and quality toys and games.</p>

<p class="lead">Wrapt is our gift ware division, where you will find that special something for that special someone.</p>

<p class="lead">Our well designed, brightly lit store makes it a pleasure to shop, and our friendly staff is always happy to offer guidance. We have a bridal registry, and gift wrapping is complimentary. Delivery service is available for a nominal fee.</p>

<p class="lead">At Kitchen Art/Wrapt, we aim to offer our customers up-to-date product variety, and something to satisfy every budget. So come on in, and make Kitchen Art/Wrapt a part of your home!</p>
        </div>
        <div class="col-md-5 col-md-pull-7 featurette-image-outer">
          <img class="featurette-image img-responsive center-block" src="images/slideshowNew/NEWLOOK/ourstore.jpg" alt="Generic placeholder image">
        </div>
      </div>
</div>
      <hr id="contact" class="featurette-divider">
<div class="container">
      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">Contact us: <br><span class="text-muted">We want to hear from you!</span></h2>
          <br>
          <p class="lead">We are located at <br><strong>2821 Bathurst St. Toronto ON</strong> </p>
          <p class="lead">Our hours are<br> 
          <strong>Sunday 10:30-4:00<br>Monday-Thursday 10:00-5:30<br>Friday 10:00-2:00</strong> </p>
          <p class="lead">Please give us a call<br> <strong>416.787.9326</strong> </p>
          <p class="lead">or send us an email<br> 
          <strong><a href="mailto:renee@kitchenartcanada.com">info@kitchenartcanada.com</a></strong> </p>
          <p class="lead" style="margin-bottom:5px;">Sign up for updates and specials:</p>
          <form class="jotform-form col-md-8" action="https://submit.jotform.us/submit/71658307846163/" method="post" name="form_71658307846163" id="71658307846163" accept-charset="utf-8">
  <input type="hidden" name="formID" value="71658307846163" />
  <div class="form-all">
    <ul class="form-section page-section">
      <li style="list-style:none;" class="form-line" data-type="control_textbox" id="id_1">
        <label class="form-label form-label-left form-label-auto" id="label_1" for="input_1">  </label>
        <div id="cid_1" class="form-input jf-required">
          <input type="text" id="input_1" name="q1_input1" data-type="input-textbox" class="form-control" size="20" value="" placeholder="NAME" data-component="textbox" width="100%" />
        </div>
      </li>
      <li style="list-style:none;" class="form-line form-group" data-type="control_email" id="id_3">
        <label class="form-label form-label-left form-label-auto" id="label_3" for="input_3">  </label>
        <div id="cid_3" class="form-input jf-required">
          <input type="email" id="input_3" name="q3_input3" class="form-control validate[Email]" size="30" value="" placeholder="E-MAIL ADDRESS" data-component="email" width="100%" />
        </div>
      </li>
      <li style="list-style:none;" class="form-line" data-type="control_button" id="id_2">
      <div class="form-group">
        <div id="cid_2" class="form-input-wide">
          <div class="form-buttons-wrapper">
            <button id="input_2" type="submit" class="btn btn-primary" data-component="button" width="100%">
              SUBSCRIBE
            </button>
          </div>
        </div>
        </div>
      </li>
      <li style="display:none">
        Should be Empty:
        <input type="text" name="website" value="" />
      </li>
    </ul>
  </div>
  <script>
  JotForm.showJotFormPowered = "0";
  </script>
  <input type="hidden" id="simple_spc" name="simple_spc" value="71658307846163" />
  <script type="text/javascript">
  document.getElementById("si" + "mple" + "_spc").value = "71658307846163-71658307846163";
  </script>
</form>
        </div>
        <div class="col-md-5">
          <iframe class="featurette-image" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d5767.730188998956!2d-79.42766368518747!3d43.71335256738564!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882b33a90834f16f%3A0x24d0d3d224c72da7!2s2821+Bathurst+St%2C+Toronto%2C+ON+M6B+3A4%2C+Canada!5e0!3m2!1sen!2sus!4v1387756523826" width="100%" height="450" frameborder="0" style="border:0"></iframe>
        </div>
      </div>
</div>
<hr style="border-color:white;" id="contact" class="featurette-divider">

      <!-- /END THE FEATURETTES -->
      
        <!-- Portfolio Section -->
       <!-- <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Portfolio Heading</h2>
            </div>
            <div class="col-md-4 col-sm-6">
                <a href="file:///Macintosh HD/Users/shifrasteinmetz/Downloads/startbootstrap-modern-business-1.0.3/portfolio-item.html">
                    <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
                </a>
            </div>
            <div class="col-md-4 col-sm-6">
                <a href="file:///Macintosh HD/Users/shifrasteinmetz/Downloads/startbootstrap-modern-business-1.0.3/portfolio-item.html">
                    <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
                </a>
            </div>
            <div class="col-md-4 col-sm-6">
                <a href="file:///Macintosh HD/Users/shifrasteinmetz/Downloads/startbootstrap-modern-business-1.0.3/portfolio-item.html">
                    <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
                </a>
            </div>
            <div class="col-md-4 col-sm-6">
                <a href="file:///Macintosh HD/Users/shifrasteinmetz/Downloads/startbootstrap-modern-business-1.0.3/portfolio-item.html">
                    <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
                </a>
            </div>
            <div class="col-md-4 col-sm-6">
                <a href="file:///Macintosh HD/Users/shifrasteinmetz/Downloads/startbootstrap-modern-business-1.0.3/portfolio-item.html">
                    <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
                </a>
            </div>
            <div class="col-md-4 col-sm-6">
                <a href="file:///Macintosh HD/Users/shifrasteinmetz/Downloads/startbootstrap-modern-business-1.0.3/portfolio-item.html">
                    <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
                </a>
            </div>
        </div>
        <!-- /.row -->

        <!-- Features Section -->
       <!-- <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Modern Business Features</h2>
            </div>
            <div class="col-md-6">
                <p>The Modern Business template by Start Bootstrap includes:</p>
                <ul>
                    <li><strong>Bootstrap v3.2.0</strong>
                    </li>
                    <li>jQuery v1.11.0</li>
                    <li>Font Awesome v4.1.0</li>
                    <li>Working PHP contact form with validation</li>
                    <li>Unstyled page elements for easy customization</li>
                    <li>17 HTML pages</li>
                </ul>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, omnis doloremque non cum id reprehenderit, quisquam totam aspernatur tempora minima unde aliquid ea culpa sunt. Reiciendis quia dolorum ducimus unde.</p>
            </div>
            <div class="col-md-6">
                <img class="img-responsive" src="http://placehold.it/700x450" alt="">
            </div>
        </div>
        <!-- /.row -->

       <!-- <hr>

        <!-- Call to Action Section -->
        <!--<div class="well">
            <div class="row">
                <div class="col-md-8">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, expedita, saepe, vero rerum deleniti beatae veniam harum neque nemo praesentium cum alias asperiores commodi.</p>
                </div>
                <div class="col-md-4">
                    <a class="btn btn-lg btn-default btn-block" href="#">Call to Action</a>
                </div>
            </div>
        </div>

        <hr>

        <!-- Footer -->
     <?php
   include("footer.php"); ?>


