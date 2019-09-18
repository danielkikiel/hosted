<?php
/**
     *
     * @copyright   (c) 2016 hosted.pl
     * @author      Daniel Kikiel for hosted.pl
     *
     */

require_once 'core/init.php';

if (Input::exists()) {
    if(Token::check(Input::get('token'))) {
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'name' => array(
                'name' => 'Name',
                'required' => true,
                'min' => 2,
                'max' => 50
            ),
            'username' => array(
                'name' => 'Username',
                'required' => true,
                'min' => 2,
                'max' => 20,
                'unique' => 'users'
            ),
            'password' => array(
                'name' => 'Password',
                'required' => true,
                'min' => 6
            ),
            'password_again' => array(
                'required' => true,
                'matches' => 'password_again'
            ),
            'user-surname' => array(
                'required' => false,
                'matches' => 'usersurname'
            ),
            'user-zip' => array(
                'required' => false,
                'matches' => 'password'
            ),
            'user-city' => array(
                'required' => false,
                'matches' => 'password'
            ),
            'user-number' => array(
                'required' => false,
                'matches' => 'password'
            ),
            'email' => array(
                'required' => true,
                'matches' => 'password'
            ),
        ));

        if ($validate->passed()) {
            $user = new User();
            $salt = Hash::salt(32);

            try {
                $user->create(array(
                    'username' => Input::get('username'),
                    'name' => Input::get('name'),
                    'email' => 'test@test.pl',
                    'password' => Hash::make(Input::get('password'), $salt),
                    'salt' => $salt,
                    'joined' => date('Y-m-d H:i:s'),
                    'group' => 1,
                    'info' => $user->addInfoUser(array('user-surname' => Input::get('user-surname'),
                                                       'user-adresess' => Input::get('user-adresess'),
                                                       'user-zip' => Input::get('user-zip'),
                                                       'user-city' => Input::get('user-city'),
                                                       'user-number' => Input::get('user-number'),
                                                       'company-name' => Input::get('company-name'),
                                                       'company-nip' => Input::get('company-nip'),
                                                       ))
                ));

                Session::flash('home', 'Welcome ' . Input::get('username') . '! Your account has been registered. You may now log in.');
                Redirect::to('index.php');
            } catch(Exception $e) {
                echo $e, '<br>';
            }
        } else {
            foreach ($validate->errors() as $error) {
                echo $error . "<br>";
            }
        }
    }
}
?>

<form action="" method="post">
    <div id="left-box">
                        <label for="company-name" id="label">Nazwa firmy</label>
                        <input type="text" id="company-name" name="company-name" placeholder="np. Hosted sp. z o. o.">
                    </div>
                    <div id="right-box">
                        <label for="company-nip" id="label">NIP</label>
                        <input type="text" id="company-nip" name="company-nip" placeholder="np. 12345678">
                    </div>
                    <div id="left-box">
                        <label for="company-name" id="label">Nazwa Użytkownika</label>
                        <input type="text" id="company-name" name="username" placeholder="np. hostedpl">
                    </div>
                    <div id="right-box"></div>
                    <div id="left-box">
                        <label for="company-name" id="label">Wprowadź hasło</label>
                        <input type="password" id="company-name" name="password" placeholder="Hasło musi zawierać minimum 6 znaków">
                    </div>
                    <div id="right-box">
                        <label for="company-name" id="label">Powtórz hasło</label>
                        <input type="password" id="company-name" name="password-repeat" placeholder="Hasło musi zawierać minimum 6 znaków">
                    </div>
                    <div id="left-box"></div>
                    <div id="right-box"></div>
                    <div id="left-box"></div>
                    <div id="right-box"></div>
                    <div id="left-box">
                        <label for="company-name" id="label">Imię</label>
                        <input type="text" id="company-name" name="user-name" placeholder="np. Jan">
                    </div>
                    <div id="right-box">
                        <label for="company-nip" id="label">Nazwisko</label>
                        <input type="text" id="company-nip" name="user-surname" placeholder="np. Kowalski">
                    </div>
                    <div id="left-box">
                        <label for="company-name" id="label">Ulica i numer domu</label>
                        <input type="text" id="company-name" name="user-adresess" placeholder="np. Chmielna 2/31">
                    </div>
                    <div id="right-box">
                        <label for="company-nip" id="label">Kod pocztowy i miasto</label><br>
                        <input type="text" id="company-nip" class="postalcode" name="user-zip" placeholder="np. 00-020">
                        <input type="text" id="company-nip" class="city" name="user-city" placeholder="np. Warszawa">
                    </div>
                    <div id="left-box">
                        <label for="company-name" id="label">Adres E-mail</label>
                        <input type="text" id="company-name" name="email" placeholder="np. biuro@hosted.pl">
                    </div>
                    <div id="right-box">
                        <label for="company-nip" id="label">Telefon kontaktowy</label><br>
                        <input type="text" id="company-name" name="user-number" placeholder="np. 123123123">
                    </div>

    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
    <input type="submit" value="Register">
</form>