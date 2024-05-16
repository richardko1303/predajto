<?php
// TODO: overovanie
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Models\Inzerat;
use App\Http\Resources\Inzerat as InzeratResource;

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

        if($cenaDo == null) {
            $cenaDo = 999999999;
        }

        if($cenaOd == null) {
            $cenaOd = 0;
        }

        $inzerat = new Collection();

        if ($mesto == null) {
            $inzerat = collect(
                Inzerat::where('title', 'like', '%'.$searchString.'%')
                    ->orWhere('description', 'like', '%'.$searchString.'%')
                    ->where('price', '>=', $cenaOd)
                    ->where('price', '<=', $cenaDo)
                    ->get()
            );
        } else {
            $inzerat = collect(
                Inzerat::where('title', 'like', '%'.$searchString.'%')
                    ->orWhere('description', 'like', '%'.$searchString.'%')
                    ->where('location', 'like', '%'.$mesto.'%')
                    ->where('price', '>=', $cenaOd)
                    ->where('price', '<=', $cenaDo)
                    ->get()
            );
        }

        if($inzerat == null) {
            return ['status' => 'not found'];
        }

        return InzeratResource::collection($inzerat);
    }

    public function index() {
        return InzeratResource::collection(Inzerat::all());
    }

    public function show($id) {
        $inzerat = Inzerat::where('id', $id)->first();

        if($inzerat == null) {
            return ['status' => 'not found'];
        }

        return new InzeratResource($inzerat);
    }

    public function create(Request $request) {
        $user = User::where('id', $request->get('tokenUserID'))->first();

        $data = [
            'title' => $request->request->get('title'),
            'description' => $request->request->get('description'),
            'important_info' => $request->request->get('important_info'),
            'price' => $request->request->get('price'),
            'location' => $request->request->get('location'),
            'email' => $request->request->get('email'),
            'phone' => $request->request->get('phone'),
            'user_id' => $user->id,
            'sub_category_id' => 1
        ];

        foreach ($data as $key => $value) {
            if($value == null) {
                return ['status' => 'missing '.$key.' field'];
            }
        }

        $inzerat = Inzerat::create($data);

        return new InzeratResource($inzerat);
    }

    public function update($id, Request $request) {
        $user = User::where('id', $request->get('tokenUserID'))->first();

        $data = [
            'title' => $request->request->get('title'),
            'description' => $request->request->get('description'),
            'important_info' => $request->request->get('important_info'),
            'price' => $request->request->get('price'),
            'location' => $request->request->get('location'),
            'email' => $request->request->get('email'),
            'phone' => $request->request->get('phone'),
        ];

        foreach ($data as $key => $value) {
            if($value == null) {
                return ['status' => 'missing '.$key.' field'];
            }
        }

        $inzerat = Inzerat::where('id', $id)
            ->where('user_id', $user->id)
            ->first();

        if($inzerat == null) {
            return ['status' => 'not found'];
        }

        $inzerat->update($data);

        return new InzeratResource($inzerat);
    }

    public function destroy($id, Request $request) {
        $user = User::where('id', $request->get('tokenUserID'))->first();
        $inzerat = Inzerat::where('id', $id)
            ->where('user_id', $user->id)
            ->first();

        if($inzerat == null) {
            return ['status' => 'not found'];
        }

        $inzerat->delete();
        return $inzerat + ['status' => 'deleted'];
    }
}
