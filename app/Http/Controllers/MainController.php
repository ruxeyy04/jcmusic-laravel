<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use App\Models\Rent;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    // WebPage Client
    public function homepage()
    {
        return view('index');
    }
    public function aboutpage()
    {
        return view('about');
    }
    public function viewproducts()
    {
        return view('viewproducts');
    }
    public function orders()
    {
        return view('orders');
    }
    public function rents()
    {
        return view('rents');
    }
    public function cart()
    {
        return view('cart');
    }
    public function profile()
    {
        return view('profile');
    }
    public function login()
    {
        return view('login');
    }
    // ========================

    // API for Products
    public function getAvailableItems()
    {
        $items = Item::where('status', 'Available')->get();

        return response()->json(['prod' => $items]);
    }

    public function getSingleItem(Request $request)
    {
        $insid = $request->input('getProd');
        $item = Item::where('ins_idno', $insid)->first();

        return response()->json($item);
    }

    public function addToCart(Request $request)
    {
        $id = $request->input('addCart');
        $userid = $request->input('userid');
        $quant = $request->input('quant');

        if (!empty($quant) && $quant !== null) {
            $cartItem = Cart::where('ins_no', $id)->first();

            if ($cartItem) {
                $cartItem->quantity = $quant;
                $cartItem->save();
                return response()->json(['status' => 'Success', 'message' => 'Quantity updated in Cart']);
            } else {
                Cart::create(['ins_no' => $id, 'userID' => $userid, 'quantity' => $quant]);
                return response()->json(['status' => 'Success', 'message' => 'Added to Cart']);
            }
        } else {
            return response()->json(['status' => 'Error', 'message' => 'Quantity is empty']);
        }
    }

    public function addToRent(Request $request)
    {
        $id = $request->input('addRent');
        $userid = $request->input('userid');
        $date = $request->input('date');
        $rentAmount = $request->input('rent');

        if (!empty($date) && $date !== null) {
            $rentItem = Rent::where('ins_no', $id)->where('status', 'Rented')->first();

            if ($rentItem) {
                return response()->json(['status' => 'Error', 'message' => 'You already rented this item. Return the item first']);
            }

            $currentDate = date('Y-m-d');
            if ($currentDate == $date) {
                return response()->json(['status' => 'Error', 'message' => 'The day of borrowing should be 1 or more than']);
            }

            Rent::create([
                'ins_no' => $id,
                'userID' => $userid,
                'totalamountrent' => $rentAmount,
                'quantity' => 1,
                'status' => 'Rented',
                'datetoreturn' => $date,
            ]);

            return response()->json(['status' => 'Success', 'message' => 'Item rented successfully']);
        } else {
            return response()->json(['status' => 'Error', 'message' => 'Select a return date']);
        }
    }
    // ========================

    // Login & Register
    public function loginform(Request $request)
    {
        $user = $request->input('user');
        $pass = $request->input('pass');

        // Use Eloquent to retrieve user data
        $userModel = User::where('username', $user)->first();

        if ($userModel && Hash::check($pass, $userModel->password)) {
            $userId = $userModel->userID;
            $userType = $userModel->usertype;

            return response()->json(['status' => 'Success', 'message' => 'Login Successful', 'userId' => $userId, 'userType' => $userType]);
        } else {
            return response()->json(['status' => 'Error', 'message' => 'Invalid username or password']);
        }
    }
    public function registerform(Request $request)
    {
        $fname = $request->input('fname');
        $lname = $request->input('lname');
        $add = $request->input('address');
        $user = $request->input('username');
        $pass = $request->input('password');

        $userModel = new User();
        $userModel->firstname = $fname;
        $userModel->lastname = $lname;
        $userModel->address = $add;
        $userModel->username = $user;
        $userModel->password = Hash::make($pass);
        $userModel->usertype = 'Visitor';

        if ($userModel->save()) {
            return response()->json(['status' => 'Success', 'message' => 'Registered Successfully']);
        } else {
            return response()->json(['status' => 'Error', 'message' => 'Register Failed']);
        }
    }
    // ========================

    // User Profile
    public function getUserInfo(Request $request)
    {
        $userId = $request->input('userid');
        $user = User::find($userId);

        if ($user) {
            return response()->json(['userinfo' => $user]);
        } else {
            return response()->json(['status' => 'Error', 'message' => 'User not found']);
        }
    }

    public function updateProfile(Request $request)
    {
        $userId = $request->input('updateProfile');
        $fname = $request->input('fname');
        $mname = $request->input('mname');
        $lname = $request->input('lname');
        $address = $request->input('address');
        $username = $request->input('user'); // Change the variable name to avoid conflict
        $pass = $request->input('pass');

        $user = User::find($userId);

        if ($user) {
            $user->firstname = $fname;
            $user->midname = $mname;
            $user->lastname = $lname;
            $user->address = $address;
            $user->username = $username; // Use the correct variable name here
            $user->password = Hash::make($pass);
            $user->save();

            return response()->json(['status' => 'Success', 'message' => 'Profile Updated']);
        } else {
            return response()->json(['status' => 'Error', 'message' => 'User not found']);
        }
    }

    // ========================

    // Orders
    public function getUserOrders(Request $request)
    {
        $userId = $request->input('userid');

        $orders = Order::select(
            'orders.orderid AS order_id', // Specify the table using alias
            Order::raw('SUM(order_details.totalamount) AS total_amount'),
            Order::raw('COUNT(order_details.ins_no) AS items'),
            'orders.date AS date_ordered', // Specify the table using alias
            'orders.status'
        )
            ->leftJoin('order_details', 'orders.orderid', '=', 'order_details.orderid') // Specify the table using alias
            ->where('orders.userID', $userId)
            ->groupBy('orders.orderid', 'orders.date', 'orders.status')
            ->get();

        return response()->json(['order' => $orders]);
    }

    public function getOrderDetail(Request $request)
    {
        $orderId = $request->input('getDetail');

        $order = Order::select(
            'orders.orderid',
            'orders.date',
            'orders.status AS orderStatus',
            Order::raw('COUNT(order_details.ins_no) AS total_items'),
            Order::raw('SUM(order_details.totalamount) AS total_amount')
        )
            ->leftJoin('order_details', 'orders.orderid', '=', 'order_details.orderid')
            ->where('orders.orderid', $orderId)
            ->groupBy('orders.orderid', 'orders.date', 'orders.status')
            ->first();

        $items = OrderDetail::select('order_details.*', 'items.*')
            ->leftJoin('items', 'order_details.ins_no', '=', 'items.ins_idno')
            ->where('order_details.orderid', $orderId)
            ->get();

        $order['items'] = $items;

        return response()->json($order);
    }

    public function getAllTransactions()
    {
        $orders = Order::select(
            'orders.*',
            'orders.orderid AS order_id',
            Order::raw('COUNT(order_details.quantity) as totalItem'),
            Order::raw('SUM(order_details.price) as totalAmount'),
            'users.firstname',
            'users.lastname'
        )
            ->leftJoin('order_details', 'orders.orderid', '=', 'order_details.orderid')
            ->leftJoin('users', 'orders.userID', '=', 'users.userID')
            ->groupBy('orders.orderid', 'orders.date', 'orders.status', 'orders.userID', 'users.firstname', 'users.lastname')
            ->get();

        return response()->json(['order' => $orders]);
    }

    public function updateOrderStatus(Request $request)
    {
        $orderId = $request->input('updateOrder');
        $status = $request->input('status');

        $order = Order::find($orderId);
        $order->status = $status;
        $order->save();

        return response()->json(['status' => 'Success', 'message' => 'Order Update Successful']);
    }
    // ===========================

    // Rent
    public function getAllRents(Request $request)
    {
        $userId = $request->input('userid');

        $rents = Rent::select('rents.*', 'items.*', 'rents.status AS statusRent')
            ->leftJoin('items', 'rents.ins_no', '=', 'items.ins_idno');

        if ($userId) {
            $rents->where('rents.userID', $userId);
        }

        $rents = $rents->get();

        return response()->json(['rent' => $rents]);
    }

    public function returnRent(Request $request)
    {
        $rentId = $request->input('returnRent');
        $date = $request->input('date');

        $rent = Rent::find($rentId);
        $rent->status = 'Returned';
        $rent->returnedDate = $date;
        $rent->save();

        return response()->json(['status' => 'Success', 'message' => 'Successfully Returned Item']);
    }
    // ===============================
    
    // Cart
    public function getCart(Request $request)
    {
        $userId = $request->input('userid');

        $cart = Cart::select('carts.*', 'items.*')
            ->leftJoin('items', 'carts.ins_no', '=', 'items.ins_idno')
            ->where('carts.userID', $userId)
            ->get();

        return response()->json(['cart' => $cart]);
    }

    public function deleteCart(Request $request)
    {
        $cartId = $request->input('delCart');
        $result = Cart::destroy($cartId);

        if ($result) {
            return response()->json(['status' => 'Success', 'message' => 'Cart has been Deleted']);
        } else {
            return response()->json(['status' => 'Error', 'message' => 'Cart failed to delete']);
        }
    }

    public function getCartItem(Request $request)
    {
        $cartId = $request->input('getCart');

        $cartItem = Cart::select('carts.*', 'items.*')
            ->leftJoin('items', 'carts.ins_no', '=', 'items.ins_idno')
            ->where('carts.cartid', $cartId)
            ->get();

        return response()->json(['cart' => $cartItem]);
    }

    public function updateCart(Request $request)
    {
        $cartId = $request->input('updateCart');
        $quantity = $request->input('quant');

        $cart = Cart::find($cartId);
        $cart->quantity = $quantity;
        $cart->save();

        return response()->json(['status' => 'Success', 'message' => 'Update Successfully']);
    }

    public function confirmOrder(Request $request)
    {
        $userId = $request->input('confirmOrder');
        $date = now();
        $status = 'Pending';

        $randomString = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 4);
        $orderId = date('Ymd') . $randomString;

        $order = Order::create([
            'orderid' => $orderId,
            'date' => $date,
            'status' => $status,
            'userID' => $userId,
        ]);

        if ($order) {
            $cartItems = Cart::select('carts.*', 'items.price')
                ->leftJoin('items', 'carts.ins_no', '=', 'items.ins_idno')
                ->where('carts.userID', $userId)
                ->get();

            if ($cartItems->count() > 0) {
                foreach ($cartItems as $cartItem) {
                    $insNo = $cartItem->ins_no;
                    $quantity = $cartItem->quantity;
                    $price = intval(str_replace(['₱', ','], '', $cartItem->price));
                    $totalAmount = $quantity * $price;

                    OrderDetail::create([
                        'orderid' => $orderId,
                        'ins_no' => $insNo,
                        'quantity' => $quantity,
                        'price' => $price,
                        'totalamount' => $totalAmount,
                    ]);
                }

                Cart::where('userID', $userId)->delete();

                return response()->json(['status' => 'Success', 'message' => 'Successfully Ordered']);
            } else {
                return response()->json(['status' => 'Error', 'message' => 'No items found in the cart.']);
            }
        } else {
            return response()->json(['status' => 'Error', 'message' => 'Error inserting order']);
        }
    }
    // ===================


}
