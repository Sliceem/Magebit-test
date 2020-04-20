<?php require_once 'includes/header.php'; ?>

<h1>HELLO </h1>
<? 
    if($data['loggedUser']){
        include 'includes/isLogged.php';
    }else include 'index.php';

// var_dump($data['email_db']); ?>

<?php require_once 'includes/footer.php';?>