<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
// use Illuminate\Foundation\Auth\Access\AuthorizesResources;

use App\Committeetype;
use View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests; 
    // AuthorizesResources

    public function __construct() 
    {
      $committeetypes = Committeetype::all();

      View::share('committeetypes', $committeetypes);
    }

}
