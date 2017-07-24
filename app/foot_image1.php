<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Product_image
 *
 * @property integer $id
 * @property string $image
 * @property integer $product_id
 * @property string $created_at
 * @property string $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Product_image whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Product_image whereImage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Product_image whereProductId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Product_image whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Product_image whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Product_image extends Model
{
    protected $table = 'foot_images';

    protected $fillable = ['image','product_id'];

    public $timestamps = true;

    public function product()
    {
    	return $this->belongTo('App\Foot');
    }
}
