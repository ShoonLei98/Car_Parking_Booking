<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    // direct to customer list page
    public function customerList()
    {
        Session::forget('SEARCH_CUSTOMER');
        $customerData = Customer::get();
        return view('admin.customer.customer_list')->with(['customer' => $customerData]);
    }

    // direct to create customer page when click Add Customer
    public function addCustomer()
    {
        return view('admin.customer.add_customer');
    }

    // customer data to database
    public function createCustomer(Request $request)
    {
        $customer = $this->getCustomerData($request);
        Customer::create($customer);
        return redirect()->route('customer#list')->with(['createSuccess' => 'Customer Data Created Successfully...']);
    }

    // direct to update data
    public  function editCustomer($id)
    {
        $customerData = Customer::where('customer_id', $id)->first();
        return view('admin.customer.update_customer')->with(['customer' => $customerData]);
    }

    // data updated to database
    public function updateCustomer(Request $request)
    {
        $customer = $this->getCustomerData($request);
        Customer::where('customer_id', $request->id)->update($customer);
        return redirect()->route('customer#list')->with(['updateSuccess' => "Customer Data Updated Successfully..."]);
    }

    // data delete
    public function deleteCustomer($id)
    {
        Customer::where('customer_id', $id)->delete();
        return back()->with(['deleteSuccess' => 'Customer Data Deleted Successfully']);
    }

    public function searchCustomer(Request $request)
    {
        $searchItem = $request->searchCustomer;

        Session::put('SEARCH_CUSTOMER', $searchItem);

        $searchData = Customer::where(function($query) use($searchItem){
            $query->orWhere('customer_name', 'like', '%'.$searchItem.'%')
                  ->orWhere('email', 'like', '%'.$searchItem.'%');
              })->get();

        return view('admin.customer.customer_list')->with(['customer' => $searchData]);
    }

    protected function getCustomerData(Request $request)
    {
        return [
            'customer_name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ];
    }

}
