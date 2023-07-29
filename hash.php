<?php

$pw = password_hash('test1', PASSWORD_DEFAULT);
echo $pw;
echo "<br>";
var_dump(password_verify('test1', $pw));
echo "<br>";

$pw = password_hash('test2', PASSWORD_DEFAULT);
echo $pw;
echo "<br>";
var_dump(password_verify('test2', $pw));
echo "<br>";

$pw = password_hash('test3', PASSWORD_DEFAULT);
echo $pw;
echo "<br>";
var_dump(password_verify('test3', $pw));



//ここにtest2とtest3分も↑4行分かく


//パスワードは暗号化よりハッシュ化のほうが一般的らしい