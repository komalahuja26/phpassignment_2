<?php
$title = 'Register';
include('shared/header.php');
?>
<script src="https://www.google.com/recaptcha/api.js"></script>
<script>
   function onSubmit(token) {
     document.getElementById("demo-form").submit();
   }
 </script>

<main>
    <h1>User Registration</h1>
    <h5>Passwords must consists of 8 characters, including one upper-case letter,one lower-case letter and 1 digit.
    </h5>
    <form method="post" action="saveregistration.php" id="demo-form">
        <fieldset>
            <label for="username">Username: </label>
            <input name="username" id="username" required type="email" placeholder="user@gmail.com" />
        </fieldset>
        <fieldset>
            <label for="password">Password: </label>
            <input type="password" name="password" id="password" placeholder="****************" required
                   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" />
        </fieldset>
        <fieldset>
            <label for="confirm">Confirm Password: </label>
            <input type="password" name="confirm" id="confirm" required
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" onkeyup="return comparePasswords()" />

        </fieldset>
        <button onclick="return comparePasswords()"
        data-sitekey="6Leq_mQlAAAAAGSQNgM9h0E5AVPmLTFu4m6yCBb1" 
        data-callback='onSubmit' 
        data-action='submit'>Register</button>
    </form>
</main>
</body>
</html