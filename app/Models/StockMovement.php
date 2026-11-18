<?php
namespace App\Models; use Illuminate\Database\Eloquent\Model; class StockMovement extends Model {protected $fillable=['item_id','movement_type','quantity','reference','notes','movement_date'];protected $casts=['movement_date'=>'date'];}
