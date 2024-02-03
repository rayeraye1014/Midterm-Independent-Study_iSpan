<?php

$hash = '$2y$10$6D2WYZLKcnMy1r3wC8B.DO5e7MktFmC1PrzIb0Q4w6i6efy7/SOsa';

$pw = '123456';

var_dump(password_verify($pw, $hash));

$hash2 = '$2y$10$ziGiOaY0HU.osxD6dX1LJeObdNW9.M3/2tIdr12L2NJHuSHxTpe/.';
$pw2 = 'Aa123456789';

var_dump(password_verify($pw2, $hash2));
