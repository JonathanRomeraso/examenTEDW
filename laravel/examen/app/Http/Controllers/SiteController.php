<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class SiteController extends Controller
{
    public function index(){
        $response = Http::timeout(1000000)->get('http://localhost:3005/api/properties');
        $properties = $response->object();
        return view('homeland.index', compact('properties'));

    }

    public function about(){
        return view('homeland.about');
    }

    public function contact(){
        return view('homeland.contact');
    }
    public function login(){
        return view('homeland.login');
    }

    public function properties(){
        $response = Http::timeout(1000000)->get('http://localhost:3005/api/properties');
        $properties = $response->object();
        return view('homeland.properties', compact('properties'));
    }

    public function property_details($property_id){
        $response = Http::timeout(1000000)->get('http://localhost:3005/api/properties/'.$property_id);
        $properties = $response->json();
        $property = !empty($properties) ? (object)$properties[0] : null;
        $responseAll = Http::timeout(1000000)->get('http://localhost:3005/api/properties');
        $allproperties = $responseAll->object();
        return view('homeland.property-details', compact('property', 'allproperties'));
    }

    public function buy(){
        $response = Http::timeout(1000000)->get('http://localhost:3005/api/properties/status/Sale');
        $properties = $response->object();
        return view('homeland.properties', compact('properties'));
    }

    public function rent(){
        $response = Http::timeout(1000000)->get('http://localhost:3005/api/properties/status/Rent');
        $properties = $response->object();
        return view('homeland.properties', compact('properties'));
    }

    public function search($type, $status){
        $response = Http::timeout(1000000)->get('http://localhost:3005/api/properties/type/'.$type.'/status/'.$status);
        $properties = $response->object();
        return view('homeland.properties', compact('properties'));
    }

    public function type($type){
        $response = Http::timeout(1000000)->get('http://localhost:3005/api/properties/type/'.$type);
        $properties = $response->object();
        return view('homeland.properties', compact('properties'));
    }

    public function sort($type){
        $response = Http::timeout(1000000)->get('http://localhost:3005/api/properties/sort/'.$type);
        $properties = $response->object();
        return view('homeland.properties', compact('properties'));
    }



    public function register(){
        return view('homeland.register');
    }





    /*
    public function store(Request $request)
    {
        if ($request->isMethod('post'))
        {
            $contactData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'subject' => 'required|string|max:255',
                'message' => 'required|string',
            ]);

            try {
                Mail::to('21030021@itcelaya.edu.mx')->send(new ContactFormMail($contactData));
                return response()->json(['message' => 'Mensaje Enviado'], 201);

            } catch (\Exception $e) {
                return response()->json(['error' => 'Error al enviar mensaje'], 500);
            }
        }
    }
    */
}
