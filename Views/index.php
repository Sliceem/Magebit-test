<?php require_once 'includes/header.php'; ?>
<div class="container">

    <form action="/main/register" method="POST" class="right">
        <h2>Sign up</h2>
        <label>Name</label>
        <input type="text" name="username">
        <p class='red'><?php echo $data['username'] ?></p>
        </br>
        <label>Email</label>
        <input type="text" name="email">
        <p class='red'><?php echo $data['user_exists'] ?></p>
        </br>
        <label>Password</label>
        <input type="text" name="password">
        <p class='red'><?php echo $data['password'] ?></p>
        </br>
        <input type="submit" value="Sign up" name="submit" class="submit">
    </form>

    <form action="/main/userLogin" method="POST" class="left">
        <h2>Login</h2>
        <label>Email</label>
        <input type="text" name="email">
        <p class='red'><?php echo $data['email_db'] ?></p>
        </br>
        <label>Password</label>
        <input type="text" name="password">
        </br>
        <input type="submit" value="Login" name="submit" class="submit">
    </form>
</div>
<?php require_once 'includes/footer.php'; ?>