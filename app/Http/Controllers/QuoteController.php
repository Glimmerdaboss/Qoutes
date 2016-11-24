<?php

namespace App\Http\Controllers;

use App\Author;
use App\Quote;
use App\AuthorLog;

use Illuminate\Http\Request;
use App\Events\QuoteCreated;
use Illuminate\Support\Facades\Event;

/**
* 
*/
class QuoteController extends Controller
{
	
	public function getIndex($author = null)
	{
		if (!is_null($author)) {
			$quote_author = Author::where('name',$author)->first();
				if($quote_author){
					$quotes = $quote_author->quotes()->orderBy('created_at','desc')->paginate(6);
			}
			}else{
				$quotes = Quote::orderBy('created_at','desc')->paginate(6); 
			}
			// get all quotes from db
		return view('index',['quotes'=>$quotes]); // view it on index page	
	}

	public function postQuote(Request $request) // Get request(hämtar förfrågan på sve)
	{
		$this->validate($request ,[
			'author' =>'required|max:60|alpha',
			'quote' =>'required|max:500',
			'email'=>'required|email'
		]); // Validation of quotes, they cant be empty


		$authorText = ucfirst($request['author']); // Uppcase first letter, gets author and stores it in authortext 
		$quoteText = $request['quote']; //gets quote and stores it in request and that stores in quotetext in authortext 

		$author = Author::where('name',$authorText)->first(); // Model Author, Fetch the result of name and authortext and get first result
		if (!$author) { // Dont exist
		$author = new Author(); // Create a new author
		$author->name = $authorText; // get athurtext and name
		$author->email = $request['email'];
		$author->save(); // and save it to db

		}
		$quote= new Quote(); // Create a new quote
		$quote->quote = $quoteText; // get quote text and quote
		$author->quotes()->save($quote); // save quote in db with/under author

		Event::fire(new QuoteCreated($author));

		return redirect()->route('index')->with([ // Specil message and prints out to the user
			'success' => 'Quoted Saved!'
			]);
	}

		public function getDeleteQuote($quote_id)
		{
			$quote = Quote::find($quote_id);
			$author_deleted = false;

			if (count($quote->author->quotes) === 1) {
				$quote->author->delete();
				$author_deleted = true;
		}

		$quote->delete();

		$msg = $author_deleted ? 'Quote and author deleted!' : 'Quote deleted'; 
		return redirect()->route('index')->with(['success' => $msg]);
	}

		public function getMailCallBack($author_name)
		{	
			$author_log = new AuthorLog();
			$author_log->author = $author_name;
			$author_log->save();
			return view('email.callback',['author'=>$author_log]);
		}	
}				