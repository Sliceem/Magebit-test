<?php require_once 'includes/header.php'; ?>

<div class="content-form">
    <h2>INDEX - Sign up</h2>
    <form action="/main/register" method="POST">
        <label>Name</label>
        <input type="text" name="username">

        <label>Email</label>
        <input type="text" name="email">

        <label>Password</label>
        <input type="text" name="password">

        <input type="submit" value="submit" name="submit">

    </form>
</div>

<hr>

<div class="content-form">
    <h2>INDEX - Sign up</h2>
    <form action="/main/register" method="POST">
        <label>Name</label>
        <input type="text" name="username">

        <label>Email</label>
        <input type="text" name="email">

        <label>Password</label>
        <input type="text" name="password">

        <input type="submit" value="submit" name="submit">

    </form>
</div>
<?php 
var_dump($data);
echo '</br>';
?>

<?php require_once 'includes/footer.php'; ?>