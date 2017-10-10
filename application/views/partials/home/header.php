<?php if ($this->session->flashdata('msg')): ?>
    <div class="alert alert-success alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <strong>Success!</strong> <?= $this->session->flashdata('msg'); ?>.
    </div>
<?php endif; ?>