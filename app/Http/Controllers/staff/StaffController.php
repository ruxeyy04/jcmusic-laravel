<?php

namespace App\Http\Controllers\staff;

use App\Models\Item;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StaffController extends Controller
{
    // Admin Webpage
    public function aboutpage()
    {
        return view('admin.about');
    }
    public function accountpage()
    {
        return view('admin.account');
    }
    public function addproductspage()
    {
        return view('admin.addproducts');
    }
    public function indexpage()
    {
        return view('admin.index');
    }
    public function modproducts()
    {
        return view('admin.modproducts');
    }
    public function profilepage()
    {
        return view('admin.profile');
    }
    public function rentpage()
    {
        return view('admin.rent');
    }
    public function transactionpage()
    {
        return view('admin.transactions');
    }
    public function viewproductspage()
    {
        return view('admin.viewproducts');
    }
    // ===============

    // Incharge Webpage
    public function inchargeaboutpage()
    {
        return view('incharge.about');
    }

    public function inchargeindexpage()
    {
        return view('incharge.index');
    }

    public function inchargeprofilepage()
    {
        return view('incharge.profile');
    }
    public function inchargerentpage()
    {
        return view('incharge.rent');
    }
    public function inchargetransactionpage()
    {
        return view('incharge.transactions');
    }

    // ===============


    // Product Mod
    public function getInfoProd(Request $request)
    {
        $itemId = $request->input('getInfoProd');
        $item = Item::where('ins_idno', $itemId)->get();
        return response()->json(['item' => $item]);
    }

    public function updateProd(Request $request)
    {
        $id = $request->input('insid');
        $name = $request->input('name');
        $type = $request->input('type');
        $year = $request->input('year');
        $model = $request->input('model');
        $brand = $request->input('brand');
        $price = $request->input('price');
        $status = $request->input('status');

        // Check if a new image was uploaded
        if ($request->hasFile('image')) {
            $oldImage = Item::where('ins_idno', $id)->value('img');
            if (!empty($oldImage)) {
                Storage::delete('pics/' . $oldImage);
            }

            $imageName = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('pics', $imageName, 'public');

            $formattedPrice = '₱' . number_format($price, 0, '.', ',');
            $item = Item::where('ins_idno', $id)->update([
                'ins_name' => $name,
                'ins_type' => $type,
                'datereleased' => $year,
                'ins_model' => $model,
                'brand' => $brand,
                'price' => $formattedPrice,
                'img' => $imageName,
                'status' => $status,
            ]);
        } else {
            $formattedPrice = '₱' . number_format($price, 0, '.', ',');
            $item = Item::where('ins_idno', $id)->update([
                'ins_name' => $name,
                'ins_type' => $type,
                'datereleased' => $year,
                'ins_model' => $model,
                'brand' => $brand,
                'price' => $formattedPrice,
                'status' => $status,
            ]);
        }

        if ($item) {
            return response()->json(['status' => 'success', 'message' => 'Item updated successfully']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Failed to update item']);
        }
    }

    public function delItem(Request $request)
    {
        $itemId = $request->input('delItem');

        $item = Item::where('ins_idno', $itemId)->delete();

        if ($item) {
            return response()->json(['status' => 'success', 'message' => 'Item deleted successfully']);
        } else {
            Item::where('ins_idno', $itemId)->update(['status' => 'Not Available']);
            return response()->json(['status' => 'error', 'message' => 'Failed to delete item and update status']);
        }
    }
    public function addProd(Request $request)
    {
        $name = $request->input('name');
        $type = $request->input('type');
        $year = $request->input('year');
        $model = $request->input('model');
        $brand = $request->input('brand');
        $price = $request->input('price');
        $status = 'Available';

        // Handling the uploaded image file
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');

            $fileName = $file->getClientOriginalName();
            $img_ex = pathinfo($fileName, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $newFilename = uniqid("product-", true) . '.' . $img_ex_lc;
            $fileDestination = public_path('pics') . '/' . $newFilename;

            // Move the uploaded file to the destination
            $file->move(public_path('pics'), $newFilename);
            // Remove the 'public/' prefix from the image path for database storage
            $imageNameForDb = $newFilename;
        } else {
            // If no image is uploaded, use a default image
            $imageName = 'default.png';
            $imageNameForDb = 'default.png';
        }

        $formattedPrice = '₱' . number_format($price, 0, '.', ',');

        // Perform the database insertion
        $item = Item::create([
            'ins_name' => $name,
            'ins_type' => $type,
            'datereleased' => $year,
            'ins_model' => $model,
            'brand' => $brand,
            'price' => $formattedPrice,
            'img' => $imageNameForDb,
            'status' => $status,
        ]);

        if ($item) {
            return response()->json(['status' => 'success', 'message' => 'Item added successfully']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Failed to add item']);
        }
    }

    // ===============

    // Accounts
    public function getAllAccounts()
    {
        $users = User::all();

        if ($users->count() > 0) {
            $response['account'] = $users;
        } else {
            $response['account'] = [];
        }

        return response()->json($response);
    }

    public function getAccount(Request $request)
    {
        $userId = $request->input('getAccount');
        $user = User::find($userId);

        return response()->json($user);
    }

    public function updateUser(Request $request)
    {
        $userId = $request->input('userid');
        $username = $request->input('username');
        $password = $request->input('password');
        $usertype = $request->input('usertype');

        $user = User::find($userId);

        if ($user) {
            $user->username = $username;
            $user->password = Hash::make($password);
            $user->usertype = $usertype;
            $user->save();

            return response()->json(['status' => 'Success', 'message' => 'Update successfully']);
        } else {
            return response()->json(['status' => 'Error', 'message' => 'User not found']);
        }
    }
    // ==================

    // Order Mod
    public function getUserOrders(Request $request)
    {
        if ($request->method() === 'GET' && $request->has('userid')) {
            $userid = $request->input('userid');

            $orders = Order::select('orderid', 'date', 'status')
                ->selectRaw('SUM(orderdetail.totalamount) AS total_amount')
                ->selectRaw('COUNT(orderdetail.ins_no) AS items')
                ->leftJoin('orderdetail', 'orders.orderid', '=', 'orderdetail.orderid')
                ->where('orders.userID', $userid)
                ->groupBy('orders.orderid', 'orders.date', 'orders.status')
                ->get();

            if ($orders->count() > 0) {
                $response['order'] = $orders;
            } else {
                $response['order'] = [];
            }

            return response()->json($response);
        }

        return response()->json(['error' => 'Invalid request']);
    }

    public function getOrderDetails(Request $request)
    {
        if ($request->has('getDetail')) {
            $orderid = $request->input('getDetail');
            $item = [];

            $orderDetails = OrderDetail::select('orderdetail.*', 'items.*')
                ->leftJoin('items', 'orderdetail.ins_no', '=', 'items.ins_idno')
                ->where('orderdetail.orderid', $orderid)
                ->get();

            $totalItems = OrderDetail::where('orderid', $orderid)
                ->selectRaw('COUNT(ins_no) AS total_items')
                ->selectRaw('SUM(totalamount) AS total_amount')
                ->first();

            $orderStatus = Order::select('status AS orderStatus')
                ->where('orderid', $orderid)
                ->first();

            $item['orderid'] = $orderid;
            $item['totalItem'] = $totalItems->total_items;
            $item['total_amount'] = $totalItems->total_amount;
            $item['orderStatus'] = $orderStatus->orderStatus;
            $item['items'] = $orderDetails;

            return response()->json($item);
        }

        return response()->json(['error' => 'Invalid request']);
    }

    public function getAllTransactions()
    {
        $transactions = Order::select('orders.*', 'user.firstname', 'user.lastname')
            ->leftJoin('orderdetail', 'orders.orderid', '=', 'orderdetail.orderid')
            ->leftJoin('user', 'orders.userID', '=', 'user.userID')
            ->groupBy('orders.orderid')
            ->get();

        if ($transactions->count() > 0) {
            $response['order'] = $transactions;
        } else {
            $response['order'] = [];
        }

        return response()->json($response);
    }

    public function updateOrderStatus(Request $request)
    {
        if ($request->has('updateOrder')) {
            $orderid = $request->input('updateOrder');
            $status = $request->input('status');

            $order = Order::where('orderid', $orderid)->update(['status' => $status]);

            if ($order) {
                return response()->json(['status' => 'Success', 'message' => 'Order Update Successful']);
            } else {
                return response()->json(['status' => 'Error', 'message' => 'Order Update Failed']);
            }
        }

        return response()->json(['error' => 'Invalid request']);
    }
    // ==================
}
