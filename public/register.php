<?php
    if (isset($_POST['register'])){
        global $wpdb;
        $fname = $wpdb-> escape($_POST['fname']);
        $lname = $wpdb-> escape($_POST['lname']);
        $username = $wpdb-> escape($_POST['username']);
        $nickname = $wpdb-> escape($_POST['nickname']);
        $email = $wpdb-> escape($_POST['email']);
        $pass = $wpdb-> escape($_POST['password']);

        $userdata = array(
            'first_name' => $fname,
            'last_name' => $lname,
            'user_login' => $username,
            'user_email' => $email,
            'display_name' => $nickname,
            'password' => $password,
        );

        $result = wp_insert_user($userdata);

        if(!is_wp_error($result)) {
            echo 'User Created Successfully</br>user id: '.$result;
        } else {
            echo $result->get_error_message();
        }
    }
?>

<h1> Already have an account</h1>
<div class="form-group">
    <h2> Login</h2>
    <form action="<?php echo get_the_permalink(); ?>" method="post">

        Username :</br> <input type="text" name="username" id="username"></br></br>

        Password :</br> <input type="password" name="password" id="password"></br></br>

        <input type="submit" class="btn btn-primary" value="Login" name="user_login">
    </form>
</div>

</br>
<h1>New here</h1>
<div class="form-group">
    <h2>Register</h2>
    <form action="<?php echo get_the_permalink(); ?>" method="post">
        First Name :</br> <input type="text" name="fname" id="f-name"></br></br>

        Last Name :</br> <input type="text" name="lname" id="l-name"></br></br>

        Username :</br> <input type="text" name="username" id="username"></br></br>

        Nickname :</br> <input type="text" name="nickname" id="nick-name"></br></br>

        Email :</br> <input type="text" name="email" id="email"></br></br>

        Password :</br> <input type="password" name="password" id="password"></br></br>

        <input type="submit" class="btn btn-primary" value="Register" name="register">
    </form>
</div>
