<?php

namespace JackNersary\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Response;

class ItemController extends Controller
{
    //
	public function pdfview(Request $request)
    {
        $pdf = PDF::loadView('pdfview');
		return $pdf->download('child_register_form.pdf');
    }
	public function registerationForm(Request $request)
    {
        $pdf = PDF::loadView('registerationForm');
		return $pdf->download('registeration_form.pdf');
    }
}
