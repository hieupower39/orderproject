<form action="./index.php?controller=login" method="post">
            <label for="username">Tài khoản:</label>
            <input type="text" id="username" name="username">
            <label for="pwd">Mật khẩu:</label>
            <input type="password" id="pwd" name="pwd">
            <input type="submit" value="Đăng nhập">
        </form>
        <p style="color:red"><?php echo $auth; ?></p>