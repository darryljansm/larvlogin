<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EncodingBuildingPermit extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'encoding_building_permit';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'application_number',
        'or_number',
        'building_permit_number',
        'date_issued',
        'applicant_name',
        'location',
        'use_or_coc',
        'project_title',
        'area',
        'estimated_cost',
        'building_permit_fee',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
}
