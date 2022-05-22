<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Traffic;

class AjaxController extends Controller
{
    public function datatableProduct(Request $request) 
    {
        $products = Product::get();
        $data = array();

        foreach($products as $index => $item) {
            $data[] = [
                $index+1,
                $item->title,
                substr($item->description, 0, 30),
                $item->category->name,
                $item->attribute,
                $item->detail,
                $item->color,
                $item->price,
                $item->image ? '<span class="badge bg-success">Uploaded</span>' : '<span class="badge bg-success">Not Uploaded</span>',
                $item->image_thumb ? '<span class="badge bg-success">Uploaded</span>' : '<span class="badge bg-success">Not Uploaded</span>',
                $item->image_detail_1 ? '<span class="badge bg-success">Uploaded</span>' : '<span class="badge bg-success">Not Uploaded</span>',
                $item->online_shop_1,
                $item->online_shop_2,
                '<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/product/edit/'.$item->id.'"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                    <a class="dropdown-item" href="/product/delete/'.$item->id.'"><i class="bx bx-trash me-1"></i> Delete</a>
                </div>',
            ];
        }

        return [
            'data'  => $data
        ];
    }

    public function datatableCategory(Request $request) 
    {
        $categories = Category::get();
        $data = array();

        foreach($categories as $index => $item) {
            $data[] = [
                $index+1,
                $item->name,
            ];
        }

        return [
            'data'  => $data
        ];
    }

    public function dataVisitors()
    {
        $data       = array();
        $userVisits = Traffic::whereYear('created_at', \Carbon\Carbon::now()->format('Y'))->orderBy('created_at', 'DESC')->get();
        $months     = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $monthIndex = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];

        if($userVisits->isNotEmpty()) {
            $month = substr(\Carbon\Carbon::parse($userVisits->first()->created_at)->format('F'), 0, 3);
            $indexOfMonth = array_search($month, $months);
            
            for($i=0; $i<=$indexOfMonth; $i++) {
                $totalVisitor = Traffic::whereMonth('created_at', $monthIndex[$i])->count();
                $data['categories'][] = $months[$i];
                
                $data['total'][] = $totalVisitor;
            }
        }

        return $data;
    }

    public function dataProducts()
    {
        $data       = array();
        $categories = Category::get();

        if($categories->isNotEmpty()) {
            foreach($categories as $index => $item) {
                $data['categories'][]   = $item->name;
                $data['data'][]         = $item->products ? $item->products->count() : 0;
            }
        }

        return $data;
    }
}
