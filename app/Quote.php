<?php
// quote model
namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    
	public function author()
	{
		return $this->belongsTo('App\Author'); // Relationship between tabels: "one quote has only one athur", one to one relation in db.
	}   
}
