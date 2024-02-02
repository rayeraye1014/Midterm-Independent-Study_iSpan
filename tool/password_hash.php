<?php

#決定密碼
$pw = '123456';

#使用雜湊的方式echo密碼
echo password_hash($pw, PASSWORD_DEFAULT);
