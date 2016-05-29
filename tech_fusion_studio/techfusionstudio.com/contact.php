<section id="contact" class="contact container-fluid" style="padding-top: 50px">
   <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2 class="section-heading">Contact Us</h2>
        <?php
  		if(Session::exists('failed')) {
  			echo '<div class="flash">' . Session::flash('failed') .'</div>';
  		} else if(Session::exists('success')) {
  			echo '<div class="flash">' .Session::flash('success') .'</div>';
  		}
  		?>
        <hr class="primary">
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <form name="contact" class="contact-form" method="post" enctype="multipart/form-data" novalidate>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Name *" name="name" >
                <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" placeholder="Your Email *" name="email" >
                <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Reason *" name="reason" >
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <textarea class="form-control" placeholder="Your Message *" name="message" ></textarea>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-12 text-center">
              <div class="success"></div>
			  <input class="btn btn-xl" type="hidden" name="token" value="<?php echo Token::generate(); ?>">
              <input class="btn btn-xl" type="submit" name="send" value="Send Message">
    		  <input class="btn btn-xl" type="reset" value="Reset Fields">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Responsive iFrame -->
  <div class="Flexible-container">
    <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d98995.10558575069!2d-84.96142318531153!3d39.16114569361135!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8841d465ebba59bf%3A0x508da6fd374afbe1!2sLawrenceburg%2C+IN+47025!5e0!3m2!1sen!2sus!4v1447456077731"></iframe>
  </div>
</section>
