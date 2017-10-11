<style>
    .error {
        margin: 8px 0px;
         display: block !important; 
        color: red;
    }
</style>
<section class="section home home-register bg-dark" id="home">
    <div class="container">
        <div class="row">
            <div class="text-center">
                <div class="home-wrapper">
                    <div class="text-tran-box text-tran-box-dark">
                        <h1 class="text-transparent">Register Person</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <div>
                    <?php echo $this->Html->link('List of Person',array('action' => '/'),array('class' => 'btn btn-primary')); ?>
                </div>
                <br>
                <div class="">
                    <div class="panel panel-primary"> 
                        <div class="panel-heading"> 
                            <h3 class="panel-title text-center">Personal Information</h3> 
                        </div> 
                        <div class="panel-body"> 
                            <div class="row">
                                <?php echo $this->Form->create('Person'); ?>
                                <div class="col-md-12">
                                    <?php echo $this->Form->input('first_name',array('class' => 'form-control','placeholder' => 'Firstname','label' => false)); ?>
                                </div>
                                <div class="col-md-12"><br></div>
                                <div class="col-md-12">
                                    <?php echo $this->Form->input('last_name',array('class' => 'form-control','placeholder' => 'Lastname','label' => false)); ?>
                                </div>
                                <div class="col-md-12"><br></div>
                                <div class="col-md-12">
                                    <?php echo $this->Form->input('middle_name',array('class' => 'form-control','placeholder' => 'Middlename','label' => false)); ?>
                                </div>
                                <div class="col-md-12"><br></div>
                                <div class="col-md-12">
                                    <?php echo $this->Form->input('gender',array('options' => array(1=>'Male',2=>'Female'),'empty' => 'Gender','class' => 'form-control','label' => false)); ?>
                                </div>
                                <div class="col-md-12"><br></div>
                                <div class="col-md-12">
                                    <?php echo $this->Form->input('birthdate',array('type' => 'text','class' => 'form-control','label' => false)); ?>
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
    </div>
</section>
<?php echo $this->Html->script('person',array('inline' => false)); ?>
