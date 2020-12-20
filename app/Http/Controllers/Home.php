<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;

class Home extends Controller
{
    function index() {
    	return view('welcome');
    }

    function donate(Request $request) {
    	$donation = $request->input('donation');

    	Donation::create([
    		'amount' => $donation
    	]);

    	$donationSum = Donation::sum('amount');

    	return view('donate', ['donation' => Donation::sum('amount')]);
    }
}
