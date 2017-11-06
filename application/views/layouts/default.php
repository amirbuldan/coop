<!DOCTYPE HTML>
<html>
   <head>
        <title><?php echo $template['title']; ?></title>
        <?php echo $template['metadata']; ?>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css');?>">
        <link rel="stylesheet" href="<?= base_url('assets/css/style-home.css');?>">
        <link rel="stylesheet" href="<?= base_url('assets/css/datatables.min.css');?>">
        <link rel="stylesheet" href="<?= base_url('assets/css/dataTables.bootstrap.min.css');?>">
        <script src="<?= base_url('assets/js/jquery-3.1.1.min.js');?>"></script>
   </head>

   <body>
        <div>
            <?php echo $template['partials']['navbar']; ?>
        </div>

        <div style="padding-top:3%;" class="container-fluid">
            <?php echo $template['partials']['header']; ?>

            <?php echo $template['body']; ?>
        </div>

   </body>
    <script src="<?= base_url('assets/js/bootstrap.min.js');?>"></script>
    <script src="<?= base_url('assets/js/script.js');?>"></script>
</html>
