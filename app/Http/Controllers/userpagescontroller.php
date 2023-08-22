<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\orderItems;
use App\Models\Packages;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class UserPagesController extends Controller
{
    public function index()
    {
        $packs = Packages::all();
        return view('Landings.index', compact('packs'));
    }

    public function allDataPackages()
    {
        $packs = Packages::all();
        return view('Landings.allDataProducts', compact('packs'));
    }

    public function wishList()
    {
        return view('Landings.wishList');
    }

    public function cart()
    {
        $cart = Session::get('cart', []);
        return view('Landings.cart', compact('cart'));
    }

    public function checkout()
    {
        return view('Landings.checkOut');
    }

    public function profile()
    {
        return view('Landings.profile');
    }

    public function login()
    {
        return view('Landings.login');
    }

    public function signup()
    {
        return view('Landings.signup');
    }

    public function addToCart(Request $request, $id)
    {
        $package = Packages::findorFail($id);

        if (!$package) {
            return redirect()
                ->back()
                ->with('error', 'Package not found.');
        }

        $cart = Session::get('cart', []);

        $cart[$id] = [
            'id' => $package->id,
            'name' => $package->name,
            'price' => $package->price,
        ];

        Session::put('cart', $cart);

        return redirect()
            ->route('cart')
            ->with('success', 'Package added to cart.');
    }

    public function removeFromCart($id)
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            Session::put('cart', $cart);
        }

        return redirect()
            ->route('cart')
            ->with('success', 'Item removed from cart.');
    }

    public function clearCart()
    {
        Session::forget('cart');
        return redirect()
            ->route('cart')
            ->with('success', 'Cart cleared.');
    }

    public function addToCartWithPhone(Request $request)
    {
        $request->validate([
            'phone' => 'required|array',
            'phone.*' => 'required|numeric|digits:10',
        ]);

        $phones = $request->input('phone');
        $cart = session()->get('cart', []);

        foreach ($cart as $id => $item) {
            if (isset($phones[$id]) && !empty($phones[$id])) {
                $cart[$id]['phone'] = $phones[$id];
            } else {
                return redirect()
                    ->back()
                    ->withErrors(['phone.' . $id => 'Phone number is required.']);
            }
        }

        session()->put('cart', $cart);

        return redirect()->route('checkout');
    }

    public function processCheckout(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $user = auth()->user();

        if ($request->has('account-create')) {
            // Create a new user using the provided email and a default password
            $user = User::create([
                'fname' => $validatedData['first_name'],
                'lname' => $validatedData['last_name'],
                'email' => $validatedData['email'],
                'password' => bcrypt('defaultpassword'), // You can generate a more secure password here
            ]);
        }

        $order = new Order([
            'user_id' => $user ? $user->id : null,
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
        ]);

        $order->save();

        foreach (session('cart') as $id => $item) {
            $package = Packages::find($item['id']);
            $orderItem = new orderItems([
                'package_id' => $package->id,
                'name' => $package->name,
                'price' => $package->price,
                'phone' => $item['phone'],
            ]);
            $order->orderItems()->save($orderItem);
        }

        session()->forget('cart');

        Alert::success('Order Placed', 'Your order has been placed successfully!');
        return redirect()->route('home');
    }

    public function registerUser(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        $user = User::create([
            'fname' => $validatedData['first_name'],
            'lname' => $validatedData['last_name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        Auth::login($user);
        Alert::success('Registration Success', 'Congrats! You Succesffuly Registered');

        return redirect()->route('home');
    }
    public function loginUsers(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        }

        Session::flash('login_error', 'Invalid credentials ');
        return back();
    }

    public function logoutUser()
{
     Auth::logout();

    // You can also clear the session data
    session()->flush();

    return redirect()->route('home'); // Redirect to the desired page after logout
}
}