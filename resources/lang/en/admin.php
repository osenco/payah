<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',

            //Belongs to many relations
            'roles' => 'Roles',

        ],
    ],

    'payment' => [
        'title' => 'Payments',

        'actions' => [
            'index' => 'Payments',
            'create' => 'New Payment',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',

        ],
    ],

    'create-payments-table' => [
        'title' => 'Create Payments Table',

        'actions' => [
            'index' => 'Create Payments Table',
            'create' => 'New Create Payments Table',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',

        ],
    ],

    'payment' => [
        'title' => 'Payments',

        'actions' => [
            'index' => 'Payments',
            'create' => 'New Payment',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'user_id' => 'User',
            'order_id' => 'Order',
            'method' => 'Method',
            'status' => 'Status',
            'amount' => 'Amount',
            'currency' => 'Currency',
            'reference' => 'Reference',
            'transaction_id' => 'Transaction',

        ],
    ],

    'payout' => [
        'title' => 'Payouts',

        'actions' => [
            'index' => 'Payouts',
            'create' => 'New Payout',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'user_id' => 'User',
            'method' => 'Method',
            'status' => 'Status',
            'amount' => 'Amount',
            'currency' => 'Currency',
            'reference' => 'Command ID',
            'transaction_id' => 'Transaction',

        ],
    ],

    'user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Full name',
            'email' => 'Email address',
            'phone' => 'Phone number',
            'email_verified_at' => 'Email verified at',
            'password' => 'Account password',
            'password_repeat' => 'Password confirmation',

        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];
