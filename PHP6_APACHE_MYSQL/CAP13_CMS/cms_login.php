<?php include './cms_header.inc.php'; ?>
<h1>Member Login</h1>
<form action="cms_transact_user.php" method="POST">
    <table border="0" cellspacing="3" cellpadding="3">
        <tbody>
            <tr>
                <td><label for="email">Email:</label></td>
                <td><input type="text" id="email" name="email" maxlength="100"</td>
            </tr>
            <tr>
                <td><label for="password">Password:</label></td>
                <td><input type="password" id="password" name="password" maxlength="20"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="action" value="Login"></td>
            </tr>
        </tbody>
    </table>
</form>
<p>Non sei ancora un membro? <a href="cms_user_account.php">Crea nuovo account!</a></p>
<p><a href="cms_forgot_password.php">Hai dimenticato la password?</a></p>
<?php include 'cms_footer.inc.php'; ?>