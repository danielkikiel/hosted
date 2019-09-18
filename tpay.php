<?php

	$usr 	= mysqli_query($mysql, 'SELECT * FROM `users` WHERE `hash` = "'.$has.'"');
	$u		= mysqli_fetch_array($usr);
// 	echo '<br><br><br>';
// 	echo 'Kwota do zapłaty: '.$value;
// 		echo '<br>';
// 	echo 'Imię i Nazwisko: '.$name;
// 		echo '<br>';
// 	echo 'E-mail: '.$email;
// 		echo '<br>';
// 	echo 'Faktura: '.$fvnumber;
// 		echo '<br>';
// 	echo 'Opis: Płatność za FV'.$fvnumber;
	
	$id  = '24681';
	$key = '30f1XVH6wtDhIb4n';
	$md5 = md5($id.$value.$fvnumber.$key);
	
	
	
?>
<section>
	<script type="text/javascript">
	 	$(document).ready(function () {
 			document.forms["auto"].submit();
		});
	</script>
    <form id="auto" action="https://secure.tpay.com" method="post" accept-charset="utf-8">
		<input type="hidden" name="id" value="24681">
		<input type="hidden" name="kwota" value="<?=$value?>">
		<input type="hidden" name="opis" value="<?php echo 'Opis: Płatność za FV'.$fvnumber; ?>">
		<input type="hidden" name="crc" value="<?=$fvnumber?>">
		<input type="hidden" name="pow_url" value="https://hosted.pl/sukces">
		<input type="hidden" name="pow_url_blad" value="https://hosted.pl/problem">
		<input type="hidden" name="wyn_url" value="https://panel.hosted.pl/cron.php">
		<input type="hidden" name="md5sum" value="<?=$md5?>">
		<input type="submit" class="btn btn-primary" id="button-next" style="border:0;margin-left: 500px;margin-bottom: 100px;margin-top: 100px;" value="Przejdź do płatności">
    </form>
</section>