<?php

namespace App\CRUD;

use EasyPanel\Contracts\CRUDComponent;
use EasyPanel\Parsers\Fields\Field;
use App\Models\History;

class HistoryComponent implements CRUDComponent
{
    public $create = false;
    public $delete = false;
    public $update = false;

    // If you will set it true it will automatically
    // add `user_id` to create and update action
    public $with_user_id = true;

    public function getModel()
    {
        return History::class;
    }

    // which kind of data should be showed in list page
    public function fields()
    {
        return ['id' , 'user_id','accepted_by', 'history', 'status', 'reason', 'accepted_time'];
    }

    // Searchable fields, if you dont want search feature, remove it
    public function searchable()
    {
        return ['reason', 'id', 'user_id', 'name', 'ability', 'history', 'accepted_by'];
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
