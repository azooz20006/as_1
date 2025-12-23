<?php
$key = "AhmedAboLabanSecretKeyStrong123"; 
$iv  = "1234567890abcdef"; 
$input_text = "";
$enc_text = "";
$dec_text = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $input_text = $_POST["user_text"];

      if (isset($_POST["enc"])) {
        $c = "AES-256-CBC";
        $enc = openssl_encrypt($input_text, $c, $key, 0, $iv);
        $enc_text = $enc;
    }

    // زر فك التشفير
    if (isset($_POST["dec"])) {
        $c = "AES-256-CBC";
        $dec = openssl_decrypt($input_text, $c, $key, 0, $iv);

        $dec_text = $dec;
    }
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>AES Encryption Assignment</title>
</head>
<body>

<h2>تشفيــر / فك تشفير AES-256-CBC</h2>

<form action="" method="POST">
    <textarea name="user_text" rows="6" cols="60" placeholder="ادخل النص هنا"><?= htmlspecialchars($input_text) ?></textarea>
    <br><br>

    <button type="submit" name="enc">تشفير</button>
    <button type="submit" name="dec">فك التشفير</button>
</form>

<?php if ($enc_text != ""): ?>
    <h3>النص المشفّر (Base64):</h3>
    <div style="background:#eee;padding:10px;width:60%;"><?= $enc_text ?></div>
<?php endif; ?>

<?php if ($dec_text != ""): ?>
    <h3>النص بعد فك التشفير:</h3>
    <div style="background:#dfffd8;padding:10px;width:60%;"><?= $dec_text ?></div>
<?php endif; ?>

</body>
</html>
