<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DocumentType;

class Document extends Model
{
    use HasFactory;

    protected $table = 'documents';

    protected $fillable = ['document_type_id', 'student_id', 'file_path', 'status'];

    public function type()
    {
        return $this->belongsTo(DocumentType::class, 'document_type_id')->withDefault();
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id')->withDefault();
    }
}
