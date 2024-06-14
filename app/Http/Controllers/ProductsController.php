<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Product; 
use Illuminate\Support\Facades\Auth;
use App\Models\UserProduct;
  
class ProductsController extends Controller
{

        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_name = Auth::user()->name;
        $products = Product::all();
        return view('products', compact('user_name','products'));
    }
  
    public function cart()
    {
      $product = UserProduct::all();
        return view('cart',compact('product'));

    }

    


    public function addToCart($id)
    {
$user_id= Auth::user()->id;
        $user_name = Auth::user()->name;
        $product = Product::findOrFail($id);
  
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        }  else {
            $cart[$id] = [
                "product_name" => $product->product_name,
                "photo" => $product->photo,
                "price" => $product->price,
                "quantity" => 1,
                "user_id"  =>$user_name
            ];
        }

        $data = [
            'price' => $user_id,
            'user_id' => $user_name,
            'product_id' => $product->id,
            'quantity' => 1// Assuming quantity starts with 1 when adding to cart
            // Add other fields as needed
        ];
        UserProduct::create($data);    

        
  
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product add to cart successfully!');
    }
  
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart successfully updated!');
        }
    }
  
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully removed!');
        }
    }


    public function image(){
        return view('lodu');
    }
}