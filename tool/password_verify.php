<?php

$hash = '$2y$10$6D2WYZLKcnMy1r3wC8B.DO5e7MktFmC1PrzIb0Q4w6i6efy7/SOsa';

$pw = '123456';

var_dump(password_verify($pw, $hash));
