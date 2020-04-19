<?php require_once 'includes/header.php'; ?>

<h1>HELLO </h1>
<? 
    if($data['loggedUser']){
        include 'includes/isLogged.php';
    }else include 'includes/notLogged.php';

var_dump($data['loggedUser']); ?>

<?php require_once 'includes/footer.php';?>