<?php include './src/view/head.php' ?> 
<?php include './src/view/header.php' ?>

<div class="container">
    <form class="mt-4" action="<?= $action ?>" method="POST">
        <div class="form-group">
            <label for="">Email</label>
            <input value="<?= $email ?>"   
                    name="email"  
                    type="text">
        </div>

        <div class="form-group">
            <label for="">Password</label>
            <input value=""  
                    name="password"  
                    type="password">
        </div>

        <button class="btn btn-primary mt-3" type="submit"><?= $submit ?></button>
    </form>
</div>

</body>
</html>