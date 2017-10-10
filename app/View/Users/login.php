<section class="section home home-register bg-dark" id="home">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 text-left">
                <div class="home-wrapper">
                    <div class="text-tran-box text-tran-box-dark">
                        <h1 class="text-transparent">Rapid Chat</h1>
                    </div>
                    <h4>Rapid chat is a website that let you meet people in random way.</h4>
                </div>
            </div>
            <div class="col-sm-4 col-sm-offset-2">
                <div class="home-wrapper">
                    <?php echo $this->Form->create('User',array('class' => 'intro-form','role' => 'form','id' => 'loginUser')); ?>
                    <h3 class="text-center"> Login </h3>
                    <div class="text-center message" style="display:none;">
                        <span></span>
                    </div>
                    <div class="form-group" id="username">
                        <?php echo $this->Form->input('username',array('class' => 'form-control','placeholder' => 'Username','label' => false)); ?>
                    </div>
                    <div class="form-group" id="password">
                        <?php echo $this->Form->input('password',array('class' => 'form-control','placeholder' => 'Password','label' => false)); ?>
                    </div>
                    <div class="form-group text-center">
                        <?php echo $this->Form->button('Login',array('class' => 'btn btn-custom btn-sm')); ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>