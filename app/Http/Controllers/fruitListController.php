<?php

namespace App\Http\Controllers;

use App\Providers\ProductService;
use Illuminate\Http\Request;

class fruitListController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        return response()->json($this->productService->getAllProducts());
    }

    public function show($id)
    {
        return response()->json($this->productService->getProductById($id));
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'fruit_name' => 'required|unique:fruit_lists|max:100|min:3',
            'quantity' => 'required'
        ]);

        return response()->json($this->productService->createProduct($data), 200);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'fruit_name' => 'required|unique:fruit_lists|max:100|min:3',
            'quantity' => 'required'
        ]);
        return response()->json($this->productService->updateProduct($data, $id), 200);
    }

    public function destroy($id)
    {
        $this->productService->deleteProduct($id);
        return response()->json(['message' => 'Product deleted successfully']);
    }

//    public function showfruit($id)
//    {
//        $fruit = fruitList::FindOrFail($id);
//
//        return response()->json([
//            'status' => true,
//            'message' => 'Fruit Showed Successfully',
//            'data' => $fruit
//        ], 200);
//    }
//
//    public function showfruits()
//    {
//        $fruits = fruitList::all();
//
//        return response()->json([
//            'status' => true,
//            'message' => 'Fruits Showed Successfully',
//            'data' => $fruits
//        ], 200);
//    }
//
//    public function storefruit(Request $request)
//    {
//        $validate = Validator::make($request->all(), [
//            'fruit_name' => 'required|unique:fruit_lists|max:100|min:3',
//            'quantity' => 'required'
//        ]);
//        if ($validate->fails()) {
//            return response()->json([
//                'status' => false,
//                'message' => 'Error...',
//                'data' => $validate->errors()
//            ], 422);
//        }
//
//        $addfruit = FruitList::create($request->all());
//
//        return response()->json([
//            'status' => true,
//            'message' => 'Fruits Added Successfully',
//            'data' => $addfruit
//        ], 201);
//    }
//
//    public function updatefruit(Request $request, $id)
//    {
////        update entire data
//        $validate = Validator::make($request->all(), [
//            'fruit_name' => 'required|unique:fruit_lists|max:100|min:3',
//            'quantity' => 'required'
//        ]);
//        if ($validate->fails()) {
//            return response()->json([
//                'status' => false,
//                'message' => 'Error...',
//                'data' => $validate->errors()
//            ], 422);
//        }
//
//        $updatefruit = FruitList::FindOrFail($id)->update($request->all());
//
//        return response()->json([
//            'status' => true,
//            'message' => 'Fruit Updated Successfully',
//            "data" => $updatefruit
//        ], 200);
//    }
//
//    public function updatefruit2(Request $request, $id)
//    {
////        updates fruit name only
//        if (!isset($request->quantity) && isset($request->fruit_name)) {
//
//            $validate = Validator::make($request->all(), [
//                'fruit_name' => 'required|unique:fruit_lists|max:100|min:3'
//            ]);
//
//            if ($validate->fails()) {
//                return response()->json([
//                    'status' => false,
//                    'message' => 'Error...',
//                    'data' => $validate->errors()
//                ], 422);
//            }
//
//            $updatefruits = FruitList::FindOrFail($id)->update($request->all());
//
//            return response()->json([
//                'status' => true,
//                'message' => 'Fruit Updated Successfully',
//                "data" => $updatefruits
//            ], 200);
//        }
////        updates quantity only
//        elseif (isset($request->quantity) && !isset($request->fruit_name)) {
//
//            $validates = Validator::make($request->all(), [
//                'quantity' => 'required|unique:fruit_lists'
//            ]);
//
//            if ($validates->fails()) {
//                return response()->json([
//                    'status' => false,
//                    'message' => 'Error...',
//                    'data' => $validates->errors()
//                ], 422);
//            }
//
//            $updatefruit = FruitList::FindOrFail($id)->update($request->all());
//
//            return response()->json([
//                'status' => true,
//                'message' => 'Fruit Updated Successfully',
//                "data" => $updatefruit
//            ], 200);
//        }
//        else {
//            return response()->json([
//                'status' => false,
//                'message' => 'You must update one field',
//                "data" => '......'
//            ], 422);
//        }
//    }
//
//    public function removefruit($id)
//    {
//        FruitList::FindOrFail($id)->delete();
//
//        return response()->json([
//            'status' => true,
//            'message' => 'Fruit Removed Successfully',
//        ], 200);
//    }

}
