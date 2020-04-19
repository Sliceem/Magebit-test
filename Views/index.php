<?php require_once 'includes/header.php'; ?>

<div class="content-form">
    <h2>INDEX - Sign up</h2>
    <form action="/main/register" method="POST">
        <label>Name</label>
        <input type="text" name="username">
        </br>
        <label>Email</label>
        <input type="text" name="email">
        </br>
        <label>Password</label>
        <input type="text" name="password">
        </br>
        <input type="submit" value="Sign up" name="submit">

    </form>
</div>

<hr>

<div class="content-form">
    <h2>INDEX - Login</h2>
    <form action="/main/userLogin" method="POST">
        <label>Email</label>
        <input type="text" name="email">
        </br>
        <label>Password</label>
        <input type="text" name="password">
        </br>
        <input type="submit" value="Login" name="submit">

    </form>
</div>
<?php
var_dump($data);
echo '</br>';
?>

<?php require_once 'includes/footer.php'; ?>