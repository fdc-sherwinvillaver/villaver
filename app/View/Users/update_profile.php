<?php echo $this->Html->css('custom',array('inline' => false)); ?>
<section class="section home home-register bg-dark" id="home">
    <div class="container">
        <div class="row">
            <div class="text-center">
                <div class="home-wrapper">
                    <div class="text-tran-box text-tran-box-dark">
                        <h1 class="text-transparent">Update your Profile</h1>
                    </div>
                </div>
            </div>
            <?php echo $this->Form->create('UserInformation',array('id' => 'registerInfo')); ?>
            <div class="col-md-3">
                <div class="panel panel-primary"> 
                    <div class="panel-heading"> 
                        <h3 class="panel-title text-center">Profile Picture</h3> 
                    </div> 
                    <div class="panel-body text-center"> 
                        <div id="image">
                            <?php echo $this->Html->image('default-avatar.svg',array('class' => 'img img-circle image','style' => 'width: 200px; height: 200px;','id' => 'profile')) ?>
                            <div class="middle">
                                <input id="upload" type="file" name="file" style="display:none;"/>
                                <a href="" id="file_upload" class="btn btn-primary">Upload Image</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="panel panel-primary"> 
                    <div class="panel-heading"> 
                        <h3 class="panel-title text-center">User Information</h3> 
                    </div> 
                    <div class="panel-body"> 
                        <div class="row">
                            
                            <div class="col-md-4" id="first_name">
                                <?php echo $this->Form->input('first_name',array('class' => 'form-control','placeholder' => 'Firstname','label' => false)); ?>
                                <div class="text-center message" style="display:none;">
                                    <span></span>
                                </div>
                            </div>
                            <div class="col-md-4" id="last_name">
                                <?php echo $this->Form->input('last_name',array('class' => 'form-control','placeholder' => 'Lastname','label' => false)); ?>
                                <div class="text-center message" style="display:none;">
                                    <span></span>
                                </div>
                            </div>
                            <div class="col-md-4" id="middle_name">
                                <?php echo $this->Form->input('middle_name',array('class' => 'form-control','placeholder' => 'Middlename','label' => false)); ?>
                                <div class="text-center message" style="display:none;">
                                    <span></span>
                                </div>
                            </div>
                            <div class="col-md-12"><br></div>
                            <div class="col-md-4" id="email">
                                <?php echo $this->Form->input('email',array('class' => 'form-control','placeholder' => 'Email Address','label' => false)); ?>
                                <div class="text-center message" style="display:none;">
                                    <span></span>
                                </div>
                            </div>
                            <div class="col-md-4" id="gender">
                                <?php echo $this->Form->input('gender',array('options' => array('Male','Female'),'empty' => 'Gender','class' => 'form-control','label' => false)); ?>
                                <div class="text-center message" style="display:none;">
                                    <span></span>
                                </div>
                            </div>
                            <div class="col-md-4" id="birthday">
                                <?php echo $this->Form->input('birthday',array('type' => 'text','class' => 'form-control','label' => false,'id' => 'date')); ?>
                                <div class="text-center message" style="display:none;">
                                    <span></span>
                                </div>
                            </div>
                            <div class="col-md-12"><br></div>
                            <div class="col-md-12" id="hobby">
                                <?php echo $this->Form->input('hobby',array('type' => 'textarea','class' => 'form-control','placeholder' => 'Hobby','label' => false,'style' => 'resize:none; height:300px;')); ?>
                                <div class="text-center message" style="display:none;">
                                    <span></span>
                                </div>
                            </div>
                            <div class="col-md-12"><br></div>
                            <div class="col-md-12">
                                <?php echo $this->Form->button('Save',array('class' => 'btn btn-success btn-block')); ?>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php echo $this->Html->script('custom.js',array('inline' => false)); ?>