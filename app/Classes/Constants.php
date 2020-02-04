<?php


namespace App\Classes;


class Constants {

    const TASK_STATUSES = [
        1 => 'Pending',
        2 => 'In Progress',
        3 => 'Done',
    ];

    const TASK_STATUSES_VALUE_KEY = [
        'Pending' => 1,
        'In Progress' => 2,
        'Done' => 3
    ];

    const ALLOWED_TASK_STATUSES = [
        'Pending',
        'In Progress',
        'Done',
    ];
}
