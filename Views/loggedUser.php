<?php require_once 'includes/header.php'; ?>
<div class="container">
    <form action="/user/updateUser" method="POST" class="right">
        <h1>HELLO <?php echo $data->user_name ?></h1>
        <h3>Your Data: </h3>
        <?php foreach ($data as $key => $value) {
            if ($key == 'user_email') {
                echo '<input type="hidden" name="' . $key . '" value="' . $value . '">';
            } else {
                echo '<p>' . $key . '</p>';
                echo '<input type="text" name="' . $key . '" value="' . $value . '">';
            }
        }; ?>
        <input type="submit" value="Update" class="submit">
        <a class="logout" href="<?php echo BACKURL; ?>">Go BACK</a>
    </form>
</div>
<?php require_once 'includes/footer.php'; ?>