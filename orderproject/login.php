<form action="./index.php?controller=login" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username">
            <label for="pwd">Password:</label>
            <input type="password" id="pwd" name="pwd">
            <input type="submit" value="Login">
        </form>
        <p style="color:red"><?php echo $auth; ?></p>