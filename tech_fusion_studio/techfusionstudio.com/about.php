<?php if(isset($_GET['team'])): ?>
  <!-- Team Section -->
  <section id="team" class="bg-light-gray container-fluid" style="padding: 50px 0px 50px 0px">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading">Our Team</h2>
          <hr class="primary">
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <div class="team-member">
            <img src="" class="img-responsive img-circle" alt="">
            <h4></h4>
            <p class="text-muted"></p>
            <ul class="list-inline social-buttons">
              <li></li>
              <li></li>
              <li></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="team-member">
            <img src="http://style.techfusionstudio.comm/img/founderTL.png" class="img-responsive img-circle" alt="">
            <h4>Jacob Beck</h4>
            <p class="text-muted"></p>
            <ul class="list-inline social-buttons">
              <li><a href="#"><i class="fa fa-twitter"></i></a>
              </li>
              <li><a href="#"><i class="fa fa-facebook"></i></a>
              </li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="team-member">
            <img src="" class="img-responsive img-circle" alt="">
            <h4></h4>
            <p></p>
            <ul class="list-inline social-buttons">
              <li></li>
              <li></li>
              <li></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2 text-center">
            <p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php elseif(isset($_GET['about'])): ?>
    <!-- About Us Section ------------------------------------------------------------------------------------------------>
    <section id="about" class="container-fluid" style="padding: 50px 0px 50px 0px">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">About Us</h2>
            <hr class="primary">
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <ul class="timeline">
              <li>
                <div class="timeline-image">
                  <img class=" img-responsive" src="http://style.techfusionstudio.comm/img/logoTL.png">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4 class="subheading">Tech Fusion Studio</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">Tech Fusion Studio is a team dedicated to all things programming and IT. We divide our services into two categories. The services we offer you is to make and host websites, fix and build PCs, host servers, build and fix networks, and ethical hacking. As for the things we do on the programming side is to make Android, IOS, Mac, and PC applications. We will also make games for Wii U, PS4, Xbox1, and PC.</p>
                  </div>
                </div>
              </li>
              <li class="timeline-inverted">
                <div class="timeline-image">
                  <img class="img-circle img-responsive" src="http://style.techfusionstudio.comm/img/founderTL.png">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4 class="subheading">Founder</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">My name is Jacob Beck. I am the founder of Tech Fusion Studio. I am married with 3 kids, 2 boys and a girl. I have my associates in Software Development as of 2016. I really enjoy programming and tinkering with computers. I have built 3 computers so far and fixed hundreds of them. I can program in C++, C#, and Java (I am not including scripting languages or website development. To me they are completely different). Right now I am in the process of learning Objective-C.</p>
                  </div>
                </div>
              </li>
              <!--<li class="timeline-inverted">
                <div class="timeline-image">
                  <h4>Be Part
                  <br>Of Our
                  <br>Story!</h4>
                </div>
              </li>-->
            </ul>
          </div>
        </div>
      </div>
    </section>
<?php else: ?>
  <!-- About Us Section ------------------------------------------------------------------------------------------------>
  <section id="about" class="container-fluid" style="padding: 50px 0px 50px 0px">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading">About Us</h2>
          <hr class="primary">
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <ul class="timeline">
            <li>
              <div class="timeline-image">
                <img class=" img-responsive" src="http://style.techfusionstudio.comm/img/logoTL.png">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4 class="subheading">Tech Fusion Studio</h4>
                </div>
                <div class="timeline-body">
                  <p class="text-muted">Tech Fusion Studio is a team dedicated to all things programming and IT. We divide our services into two categories. The services we offer you is to make and host websites, fix and build PCs, host servers, build and fix networks, and ethical hacking. As for the things we do on the programming side is to make Android, IOS, Mac, and PC applications. We will also make games for Wii U, PS4, Xbox1, and PC.</p>
                </div>
              </div>
            </li>
            <li class="timeline-inverted">
              <div class="timeline-image">
                <img class="img-circle img-responsive" src="http://style.techfusionstudio.comm/img/founderTL.png">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4 class="subheading">Founder</h4>
                </div>
                <div class="timeline-body">
                  <p class="text-muted">My name is Jacob Beck. I am the founder of Tech Fusion Studio. I am married with 3 kids, 2 boys and a girl. I have my associates in Software Development as of 2016. I really enjoy programming and tinkering with computers. I have built 3 computers so far and fixed hundreds of them. I can program in C++, C#, and Java (I am not including scripting languages or website development. To me they are completely different). Right now I am in the process of learning Objective-C.</p>
                </div>
              </div>
            </li>
            <!--<li class="timeline-inverted">
              <div class="timeline-image">
                <h4>Be Part
                <br>Of Our
                <br>Story!</h4>
              </div>
            </li>-->
          </ul>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>
