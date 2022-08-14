<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- creamos un alias para definir el tipo de estilo que se utilizara-->
    <title><?= $this->renderSection('css')?>&nbsp;-&nbsp;Admin - Free Bulma template</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <!-- Bulma Version 0.9.0-->
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.0/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <?= $this->renderSection('css')?> <!-- creamos un alias para definir el tipo de estilo que se utilizara-->
</head>

<body>
    <?= $this->include('admin/layout/header')?><!-- de esta forma indicamos donde esta la ubicación del elemento header para realiza la modificacion-->
    <?= $this->renderSection('content')?> <!-- en vez de la ruta main, creamos un alias para definir el contenido-->
    <?= $this->include('admin/layout/footer')?><!-- de esta forma indicamos donde esta la ubicación del elemento modificación para realiza la modificacion-->
    <?= $this->renderSection('js')?> <!-- creamos un alias para definir el tipos de js que se utilizara-->
</body>

</html>