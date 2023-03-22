<?php

namespace App\Http\BasketControllers;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class BasketController extends Controller
{

    public function addProduct (Request $request )
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
