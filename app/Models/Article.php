<?php

namespace App\Models;

use Engine\Fields\Text;
use Engine\Fields\Textarea;
use Engine\HasFields;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory, HasFields;

    protected $fillable = [
        'title', 'content'
    ];

    public function fields() {
        return [
            Text::create('Title')->required()->rules('string', 'max:150'),
            Textarea::create('Content')->visible('title', '!==', null)->rules('string', 'max:10000'),
        ];
    }
}
