<?php
// author model 
namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public function quotes() 
    {
    	return $this->hasMany('App\Quote'); // Relationship between tabels: "Author has many quotes", one to many relation in db.
    }
}
