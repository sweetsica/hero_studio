<?php
 namespace App\Http\ViewComposers;

 use App\Models\Notify;
 use Illuminate\View\View;

 class NotifyComposer
 {
     public $notifies = [];
     /**
      * Create a movie composer.
      *
      * @return void
      */
     public function __construct()
     {
         $this->notifies = Notify::where('active', '=', '1')->orderByDesc("created_at")->take(5)->get();
     }

     /**
      * Bind data to the view.
      *
      * @param  View  $view
      * @return void
      */
     public function compose(View $view)
     {
         $view->with('notifies', $this->notifies);
     }
 }
