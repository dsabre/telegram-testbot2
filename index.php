<?php

header("Content-Type: application/json");
echo file_get_contents("https://chainz.cryptoid.info/explorer/api.dws?q=summary");
