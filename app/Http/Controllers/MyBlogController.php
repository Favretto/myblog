<?php

namespace App\Http\Controllers;
use App\Models\BlogComments;
use App\Models\MyBlog;
use App\Models\BlogLog;

use Illuminate\Http\Request;

class MyBlogController extends Controller
{
    public function append(Request $req){
		// Validazione opzionale dei parametri
        $req->validate([
            'oggetto' => 'required|string|max:20',
            'codice_componente' => 'nullable|string|max:25',
            'messaggio' => 'required|string',
        ]);
		
		// Inserimento nel database
		// Associo $blog solo per ottenere l'id di istanza dellatransazione ...
		$blog = MyBlog::create([
			'nome' => $req->user()->name,
			'email' => $req->user()->email,
			'oggetto' => $req->oggetto,
			'codice_componente' => $req->codice_componente,
			'messaggio' => $req->messaggio,
		]);
		
		// Creazione log
		BlogLog::create([
			'user_id' => $req->user()->id,
			'blog_id' => $blog->id,
			'azione' => 'CREAZIONE',
			'dati' => $req->only(['oggetto', 'codice_componente', 'messaggio']),
		]);
	
		// Redirect con messaggio di successo
        return back()->with('success', 'Messaggio inserito correttamente!');
	}
	
	///////////////////////////////////////////////////////////////
    public function appendcomment(Request $req){
		
		// Validazione opzionale dei parametri
        $req->validate([
            'messaggio' => 'required|string',
        ]);
		
		// Inserimento nel database
		BlogComments::create([
			'blog_id' => $req->blog_id,
			'user_id' => $req->user_id,
			'testo' => $req->messaggio,
		]);
		
		// Creazione log
		BlogLog::create([
			'user_id' => $req->user_id,
			'blog_id' => $req->blog_id,
			'azione' => 'COMMENTO',
			'dati' => $req->only(['messaggio']),
		]);
	
		// Redirect con messaggio di successo
        return back()->with('success', 'Messaggio inserito correttamente!');
	}
	
	///////////////////////////////////////////////////////////////
	public function readall()
    {
        // prendi tutti i record ordinati per data
		$blogcollection = MyBlog::latest()->get();
		
		// passa i dati alla view
        return view('listblogs', compact('blogcollection'));
    }
	
	///////////////////////////////////////////////////////////////
	
	public function readlast50()
    {
        // prendi tutti i record ordinati per data
		$logcollection = BlogLog::latest()->get();
		
		// passa i dati alla view
        return view('listlogs', compact('logcollection'));
    }
	
	///////////////////////////////////////////////////////////////
	
	public function readallcomments($id)
    {
        // prendi tutti i commenti ordinati per data
		$commentscollection = BlogComments::where('blog_id', $id)
								->orderBy('created_at', 'asc')
								->get();
		
		// passa i dati alla view
        return view('listcomments', compact('commentscollection', 'id')); // Passo anche l'ID per il POST di una risposta ...
    }
	
	///////////////////////////////////////////////////////////////
	
	public function delete($id) {
		$blog = MyBlog::findOrFail($id);

		// opzionale: verifica che l'utente sia l'autore
		if ($blog->nome !== auth()->user()->name) {
			abort(403);
		}

		// Creazione log assolutamente prima di cancellare!
		BlogLog::create([
			'user_id' => auth()->id(),
			'blog_id' => $blog->id,
			'azione' => 'CANCELLAZIONE',
			'dati' => $blog->only(['oggetto', 'codice_componente', 'messaggio']),
		]);
		
		$blog->delete();
		
		return back()->with('success', 'Blog cancellato correttamente!');
	}
	
	///////////////////////////////////////////////////////////////
	
	public function readone($id)
    {
        // prendi tutti i record ordinati per data
		$oneblog = MyBlog::findOrFail($id);
		
		// passa i dati alla view
        return view('chblog', compact('oneblog'));
    }

	///////////////////////////////////////////////////////////////
	
	public function update(Request $req, $id)
	{
		$req->validate([
		'oggetto' => 'required|string|max:20',
		'codice_componente' => 'nullable|string|max:25',
		'messaggio' => 'required|string',
		]);

		$blog = MyBlog::findOrFail($id);
		$blog->update($req->only(['oggetto', 'codice_componente', 'messaggio']));
		
				// Creazione log
		BlogLog::create([
			'user_id' => $req->user()->id,
			'blog_id' => $blog->id,
			'azione' => 'MODIFICA',
			'dati' => $req->only(['oggetto', 'codice_componente', 'messaggio']),
		]);
		
		return back()->with('success', 'Messaggio aggiornato correttamente!');
		// return redirect()->route('manageblogs')->with('success', 'Blog aggiornato!');
	}
}
