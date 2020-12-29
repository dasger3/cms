<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SortController extends Controller
{
    public function sortByDefault(){
        $s=1;
        echo "!!!!!!!!!!!!!!!!!!!!";
        return view('admin.pages.index');
    }


}
