#!/usr/bin/env php
<?php

echo"   _____      _                             \n";
echo"  / ____|    | |          /\                \n";
echo" | |     __ _| | _____   /  \   _ __  _ __  \n";
echo" | |    / _` | |/ / _ \ / /\ \ | '_ \| '_ \ \n";
echo" | |___| (_| |   <  __// ____ \| |_) | |_) |\n";
echo"  \_____\__,_|_|\_\___/_/    \_\ .__/| .__/ \n";
echo"                               | |   | |    \n";
echo"                               |_|   |_|    \n\n";

echo "CakePHP + VueJS + GIT solution\n";
echo "CakeApp by Martin Kukolos <martin+cakeapp@kukolos.sk>\n\n";

$author = shell_exec('git log -1 --format=format:%aN HEAD');
echo "Commiting changes from $author";
