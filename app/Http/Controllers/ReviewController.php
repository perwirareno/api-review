<?php 
namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller {

    public function index(){

        $data_review = DB::connection('mongodb')->collection('review')->get();

        foreach ($data_review as $key => $val) {
            $arr_review[] = [
                'reviewer_name' => $val['reviewer_name'],
                'message' => $val['message'],
                'rate' => $val['rate'],
                'created_date' => $val['created_date']
            ];
        }
        // dd($arr_review); die();
        
        $data = [
            'message' => "Get All Data Review Successfully!",
            'review' => $arr_review
        ];

        return $data;
    }

    public function create (Request $request) {
        
        // dd($request->all()); die();

        $review = new Review();
        $review->reviewer_name = $request->reviewer_name;
        $review->message = $request->message;
        $review->rate = $request->rate;
        $review->created_date = $request->created_date;
        $review->save();

        $data_review = Review::get();

        foreach ($data_review as $key => $val) {
            $arr_review[] = [
                'reviewer_name' => $val['reviewer_name'],
                'message' => $val['message'],
                'rate' => $val['rate'],
                'created_date' => $val['created_date']
            ];
        }

        $data = [
            'message' => 'Review Created Successfully!',
            'review' => $arr_review
        ];

        return $data;
    }
}
?>