<section class="section home home-register bg-dark" id="home">
    <div class="container">
        <div>
            <?php echo $this->Html->link('Add Person',array('action' => 'register'),array('class' => 'btn btn-primary')); ?>
        </div>
        <br>
        <div><?php echo $this->Flash->render(); ?></div>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3>List of Person</h3>
            </div>
            <div class="panel-body">
                <div class="table">
                    <table class="table table-responsive table-bordered">
                        <thead>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Age</th>
                            <th>Created Date</th>
                            <th>Modified Date</th>
                            <th>Created IP</th>
                            <th>Modified IP</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php foreach($persons as $person): ?>
                                <tr>
                                    <td><?php echo $person['Person']['fullname']; ?></td>
                                    <td><?php echo $person['Person']['gender']; ?></td>
                                    <td><?php echo ($person['Person']['age'] < 0) ? 0 : $person['Person']['age']; ?></td>
                                    <td><?php echo $person['Person']['created']; ?></td>
                                    <td><?php echo $person['Person']['modified']; ?></td>
                                    <td><?php echo $person['Person']['created_ip']; ?></td>
                                    <td><?php echo $person['Person']['modified_ip']; ?></td>
                                    <td><?php echo $this->Html->link("Edit",array('action' => 'edit',$person['Person']['id']),array('class' => 'btn btn-primary'))." ".$this->Html->link("Delete",array('action' => 'delete',$person['Person']['id']),array('confirm' => 'Delete this data?','class' => 'btn btn-danger')); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
