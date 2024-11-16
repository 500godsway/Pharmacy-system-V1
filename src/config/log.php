<?php
$dbData = [
    "localhost", // Hostname
    "root",      // Username
    "",          // Password
    "ultimatepharmacy"  // DBName
];
$activityLog = new ActivityLog(...$dbData);