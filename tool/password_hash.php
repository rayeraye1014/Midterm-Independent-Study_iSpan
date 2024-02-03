<?php

#決定密碼
$pw = '123456';

$pw2 = 'Aa123456789';

#使用雜湊的方式echo密碼
echo password_hash($pw, PASSWORD_DEFAULT);
'<br>';
echo password_hash($pw2, PASSWORD_DEFAULT);
