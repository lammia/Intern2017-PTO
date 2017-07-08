<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class requestInfo extends Model
{
    protected $table ="pto_request";
    protected $fillable = ['id','mgid','dateofrequest','datestart','dateend','reason','approvalofmanager','reasonforrejected','approvalofadmin'];
  	public $timestamps = false;
}
