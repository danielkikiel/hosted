<?php
/**
	 *
	 * @copyright	(c) 2016 hosted.pl
	 * @author 		Daniel Kikiel for hosted.pl
	 *
	 */

require_once 'core/init.php';

if(!$username = Input::get('user')) {
    Redirect::to('index.php');
} else {
    $user = new User($username);

    if(!$user->exists()) {
        Redirect::to(404);
    } else {
        $data = $user->data();
?>

        <h3><?php echo escape($data->username); ?></h3>
        <p>Name: <?php echo escape($data->name); ?></p>

<?php
    }
}