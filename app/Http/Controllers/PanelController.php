<?php


namespace App\Http\Controllers;


use App\Models\Contact;
use App\Models\PointOfSale;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PanelController extends Controller
{
    public function index(): Factory|View|Application
    {
        $contacts = Contact::all();
        $contactsCount = Contact::count('id');
        $contactsToday = Contact::whereDate('created_at', today())->count();
        return view('panel.index', compact('contacts', 'contactsCount', 'contactsToday'));
    }

    public function pointOfSales(Request $request): Application|Factory|View|JsonResponse
    {
        if ($request->isMethod('POST')) {
            return $this->updateOrSavePOS($request);
        }

        if ($request->isMethod('DELETE')) {
            return $this->deletePOS($request->get('id'));
        }
        $pointOfSales = PointOfSale::paginate(20);
        return view('panel.point-of-sales', compact('pointOfSales'));
    }

    private function updateOrSavePOS(Request $request): JsonResponse
    {
        $validator = Validator::make($request->input(), [
            'name' => 'required',
            'image_url' => 'required|url',
            'description' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first()
            ]);
        }
        PointOfSale::create($request->input());
        return response()->json([
            'success' => true
        ]);
    }

    private function deletePOS(int $id): JsonResponse
    {
        $pos = PointOfSale::whereId($id)->get()->first();
        if ($pos !== null) {
            $pos->delete();
        }

        return response()->json([
            'success' => true
        ]);
    }

    public function products(): Factory|View|Application
    {
        $products = Product::paginate(5);
        return view('panel.products', compact('products'));
    }

    public function productForm(Request $request): Factory|View|Application
    {
        $product = null;
        if ($request->get('id', false) !== false)  {
            $product = Product::whereId($request->get('id'))->get()->first();
            if ($product === null) {
                throw new NotFoundHttpException();
            }
        }
        return view('panel.product-form', compact('product'));
    }
}
