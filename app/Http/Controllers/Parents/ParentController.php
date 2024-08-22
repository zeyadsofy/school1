<?php


namespace App\Http\Controllers\Parents;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreParent;

use App\Models\MyParent;
use CodeZero\UniqueTranslation\UniqueTranslationRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ParentController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $Parents = MyParent::all();
    return view('pages.Parents.showParent',compact('Parents'));
  }



  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(StoreParent $request)
  {
  
      try{
        $validated = $request->validated();
        MyParent::create([
            "Name_Father"=>['en' => $request->Name_Father, 'ar' => $request->Name_Father_en],
            "Email"=>$request["Email"],
            "National_ID_Father"=>$request["National_ID_Father"],
            "Phone_Father"=>$request["Phone_Father"],
            "Job_Father"=>['en' => $request->Job_Father, 'ar' => $request->Job_Father_en],
            "Address_Father"=>$request["Address_Father"],
            "Password"=>Hash::make($request["Password"]),
        ]);
        $this->successMessage = trans('messages.success');
        return redirect()->route("Parents.index");
    }
    catch (Exception $e) {
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
   public function update(Request $request)
 {
  try {

    // $validated = $request->validated();
    $MyParent = MyParent::findOrFail($request->id);
    $MyParent->update([
      "Name_Father"=>['en' => $request->Name_Father, 'ar' => $request->Name_Father_en],
      "Email"=>$request["Email"],
      "National_ID_Father"=>$request["National_ID_Father"],
      "Phone_Father"=>$request["Phone_Father"],
      "Job_Father"=>['en' => $request->Job_Father, 'ar' => $request->Job_Father_en],
      "Address_Father"=>$request["Address_Father"],
      "Password"=>Hash::make($request["Password"]),    
    ]);
    toastr()->success(trans('messages.Update'));
    return redirect()->route('Parents.index');
}
catch
(\Exception $e) {
    return redirect()->back()->withErrors(['error' => $e->getMessage()]);
}
 }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Request $request)
  {
    
    $Parents = MyParent::findOrFail($request->id)->delete();
    toastr()->error(trans('messages.Delete'));
    return redirect()->route('Parents.index');

  }

}
