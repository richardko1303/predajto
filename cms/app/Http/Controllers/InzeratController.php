<?php
// TODO: overovanie
namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Models\Inzerat;

class InzeratController extends Controller
{

    // EXAMPLE REQUEST
//http://127.0.0.1:8000/api/search?q=iPhone15&city=bratislava&price_min=635&price_max=1000&onlyImgs=true
    public function search(Request $request) {
        $searchString = $request->input('q');
        $mesto = $request->input('city');
        $cenaOd = $request->input('price_min');
        $cenaDo = $request->input('price_max');
        $onlyWImgs = $request->input('onlyImgs');

        $inzerat = Inzerat::where('title', 'like', '%'.$searchString.'%');

        if ($mesto != null) {
            $inzerat = $inzerat->where('location', 'like', '%'.$mesto.'%');
        }

        $inzerat = $inzerat->where('price', '>=', $cenaOd)
            ->where('price', '<=', $cenaDo)
            ->get();

        return [
            'searchString' => $searchString,
            'mesto' => $mesto,
            'cenaOd' => $cenaOd,
            'cenaDo' => $cenaDo,
            'onlyWImgs' => $onlyWImgs
        ];
    }

    public function index() {
        return Inzerat::all();
    }

    public function show($id) {
        $inzerat = Inzerat::where('id', $id)->first();

        if($inzerat == null) {
            return ['status' => 'not found'];
        }

        return $inzerat;
    }

    public function store(Request $request) {
        $data = [
            'title' => $request->request->get('title'),
            'description' => $request->request->get('description'),
            'important_info' => $request->request->get('important_info'),
            'price' => $request->request->get('price'),
            'location' => $request->request->get('location'),
            'email' => $request->request->get('email'),
            'phone' => $request->request->get('phone'),
        ];

        // TODO: validation
        $inzerat = Inzerat::create($data);
    }

    public function update($id, Request $request) {
        $data = [
            'title' => $request->request->get('title'),
            'description' => $request->request->get('description'),
            'important_info' => $request->request->get('important_info'),
            'price' => $request->request->get('price'),
            'location' => $request->request->get('location'),
            'email' => $request->request->get('email'),
            'phone' => $request->request->get('phone'),
        ];

        $inzerat = Inzerat::where('id', $id)->first();

        if($inzerat == null) {
            return ['status' => 'not found'];
        }

        // TODO
        return "Inzerat::where('id', )->first()";
    }

    public function destroy($id) {
        $inzerat = Inzerat::where('id', $id)->first();

        if($inzerat == null) {
            return ['status' => 'not found'];
        }

        $inzerat->delete();
        return $inzerat + ['status' => 'deleted'];
    }
}
