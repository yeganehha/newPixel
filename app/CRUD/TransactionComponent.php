<?php

namespace App\CRUD;

use EasyPanel\Contracts\CRUDComponent;
use EasyPanel\Parsers\Fields\Field;
use App\Models\Transaction;

class TransactionComponent implements CRUDComponent
{
    // Manage actions in crud
    public $create = false;
    public $delete = false;
    public $update = false;

    // If you will set it true it will automatically
    // add `user_id` to create and update action
    public $with_user_id = false;

    public function getModel()
    {
        return Transaction::class;
    }

    // which kind of data should be showed in list page
    public function fields()
    {
        return ['id',
            'user.avatar' => Field::title("Users profile")
                ->asImage()
                ->roundedImage()
                ->withoutSorting() ,
            'user.discriminator' ,
            'tire.name' ,
            'amount',
            'is_pay' => Field::title("is_pay")
                ->asBooleanBadge()
                ->trueValue('پرداخت شده')
                ->falseValue('ناموفق'),
            'trans_id',
            'result'
        ];
    }

    // Searchable fields, if you dont want search feature, remove it
    public function searchable()
    {
        return ['id', 'user.discriminator' ,'tire.name' , 'trans_id', 'result'];
    }

    // Write every fields in your db which you want to have a input
    // Available types : "ckeditor", "checkbox", "text", "select", "file", "textarea"
    // "password", "number", "email", "select", "date", "datetime", "time"
    public function inputs()
    {
        return [];
    }

    // Validation in update and create actions
    // It uses Laravel validation system
    public function validationRules()
    {
        return [];
    }

    // Where files will store for inputs
    public function storePaths()
    {
        return [];
    }
}
