<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class ExamPaper extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'exam_paper';
    
}
