<?php

namespace App\CRUD;

use EasyPanel\Contracts\CRUDComponent;
use EasyPanel\Parsers\Fields\Field;
use App\Models\Tire;
use EasyPanel\Parsers\HTMLInputs\Number;
use EasyPanel\Parsers\HTMLInputs\Text;

class TireComponent implements CRUDComponent
{
    // Manage actions in crud
    public $create = true;
    public $delete = true;
    public $update = true;

    // If you will set it true it will automatically
    // add `user_id` to create and update action
    public $with_user_id = false;

    public function getModel()
    {
        return Tire::class;
    }

    // which kind of data should be showed in list page
    public function fields()
    {
        return ['name', 'expire', 'price'];
    }

    // Searchable fields, if you dont want search feature, remove it
    public function searchable()
    {
        return ['name', 'expire', 'price'];
    }

    // Write every fields in your db which you want to have a input
    // Available types : "ckeditor", "checkbox", "text", "select", "file", "textarea"
    // "password", "number", "email", "select", "date", "datetime", "time"
    public function inputs()
    {
        return [
            'name' => Text::label('name')->withoutAutocomplete(),
            'expire' => Number::label('expire')->withoutAutocomplete()->placeholder('day'),
            'price' => Number::label('price')->withoutAutocomplete()->placeholder('toman'),
            'discord_roll_id' => Number::label('discord_roll_id')->withoutAutocomplete()
        ];
    }

    // Validation in update and create actions
    // It uses Laravel validation system
    public function validationRules()
    {
        return [
            'name' => 'required|min:2|max:255',
            'expire' => 'required|numeric|min:1',
            'price' => 'required|numeric|min:0'
        ];
    }

    // Where files will store for inputs
    public function storePaths()
    {
        return [];
    }
}
