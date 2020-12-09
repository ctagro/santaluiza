<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use App\Models\Despesa;
use App\User;
use App\Models\Origem;
use DateTime;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

        public function index()
        {
           
            return  view('admin.home.index');
        }

}
