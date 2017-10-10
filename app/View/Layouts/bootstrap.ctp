<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Rapid Chat</title>
        <link href='https://fonts.googleapis.com/css?family=Josefin+Sans:400,600,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700' rel='stylesheet' type='text/css'>
        <?php echo $this->Html->css(array('bootstrap.min','magnific-popup','icons-social','style.css')); ?>
        <?php 
            echo $this->fetch('css');
        ?>
    </head>
    <body>
        <nav class="navbar navbar-default navbar-custom navbar-custom-dark bg-dark">
           <div class="container">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav navbar-right">
                    <?php if($this->request->params['action'] == 'update_profile') : ?>
                        <li><a href="/users/logout" class="scroll">Logout</a></li>
                    <?php else : ?>
                        <li><a href="/chat/chatbox" class="scroll">Chat</a></li>
                        <li><a href="/users/profile" class="scroll">Profile</a></li>
                        <li><a href="/message/messages" class="scroll">Message</a></li>
                        <?php if(isset($this->Session->read('Auth')['User'])) : ?>
                        <li><a href="/users/logout" class="scroll">Logout</a></li>
                        <?php else : ?>
                        <li><a href="/users/login" class="scroll">Login</a></li>
                        <li><a href="/home/index" class="scroll">Register</a></li>
                        <?php endif; ?>
                    <?php endif; ?>
                  </ul>
                </div><!-- /.navbar-collapse -->

            </div><!-- /.container-fluid -->
        </nav>
        <?php echo $this->Session->flash('auth'); ?>
        <?php echo $this->fetch('content'); ?>
        <footer class="bg-dark footer-one">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 p-b-40">
                        <p class="text-light about-text">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC,making it over 2000 years old.</p>

                        <p class="text-light about-text">Nunc nec dui vitae urna cursus lacinia. In venenatis egetjusto in dictum.</p>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <h5>Company</h5>
                        <ul class="list-unstyled">
                            <li><a href="">About Us</a></li>
                            <li><a href="">Features</a></li>
                            <li><a href="">FAQ</a></li>
                            <li><a href="">Services</a></li>
                        </ul>
                    </div>
                    <div class="col-md-2 col-sm-6 p-b-40">
                        <h5>Support</h5>
                        <ul class="list-unstyled">
                            <li><a href="">Help & Support</a></li>
                            <li><a href="">Privacy Policy</a></li>
                            <li><a href="">Terms & Conditions</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <div>
                            <h5>Contact us</h5>
                            <ul class="list-unstyled">
                                <li><strong class="font-secondary font-14">Address:</strong> 795 Folsom Ave, Suite 600 CA 94107</li>
                                <li><strong class="font-secondary font-14">Phone:</strong> (123) 456-7890, 123-4567 89 </li>
                                <li><strong class="font-secondary font-14">Email:</strong> <a href="mailto:first.last@example.com">first.last@example.com</a></li>
                            </ul>
                        </div>
                    </div>

                </div> <!-- end row -->
            </div>
            <!-- end container -->
            <div class="footer-one-alt">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-5">
                            <p class="m-b-0 font-13 copyright">© 2016 Metrico. Design by Coderthemes</p>
                        </div>
                        <div class="col-sm-7">
                            <ul class="list-inline footer-social-one m-b-0 pull-right">
                                <li><a href="#"><i class="pe-so-facebook"></i></a></li>
                                <li><a href="#"><i class="pe-so-twitter"></i></a></li>
                                <li><a href="#"><i class="pe-so-linkedin"></i></a></li>
                                <li><a href="#"><i class="pe-so-google-plus"></i></a></li>
                                <li><a href="#"><i class="pe-so-skype"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <?php echo $this->Html->script(array('jquery-2.1.4.min','bootstrap.min','jquery.easing.1.3.min','jquery.magnific-popup.min','users')); ?>
        <?php echo $this->fetch('script'); ?>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.popup-video').magnificPopup({
                  disableOn: 700,
                  type: 'iframe',
                  mainClass: 'mfp-fade',
                  removalDelay: 160,
                  preloader: false,
                  fixedContentPos: false
                });
            });
        </script>
    </body>
</html>