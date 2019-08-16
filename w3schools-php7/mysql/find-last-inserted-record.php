<?php

$last_id = $connection->lastInsertId();
echo "Latest inserted record is: " . $last_id;