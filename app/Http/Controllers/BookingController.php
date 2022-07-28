<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Booking;
use App\Models\Service;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    // direct to booking list page
    public function bookingList()
    {
        $bookingData = DB::table('bookings')
                         ->select('bookings.*','customers.customer_name as name','customers.email as email')
                         ->leftjoin('customers', 'customers.customer_id', 'bookings.customer_id')
                         ->leftjoin('services', 'bookings.service_id', 'services.service_id')
                         ->get();

        return view('admin.booking.booking_list')->with(['booking' => $bookingData]);
    }

    public function addBooking()
    {
        // create booking in customer list page
        return view('admin.customer.customer_list');
    }

    public function inputBooking($id)
    {
        // get customer id to book
        $customerID = Customer::where('customer_id', $id)->first();

        // get services to show
        $serviceData = Service::get();

        // direct create booking page with customer id and additional services
        return view('admin.booking.create_booking')->with(['customer' => $customerID, 'service' => $serviceData]);
    }

    public function createBooking(Request $request)
    {
        // dd($request->toArray());
        // $data = $request->all();
        // $data['service'] = json_encode($data['service']);
        // dd($data['service']);

        $data = $request->service;

        $customerData = $this->getBookingData($request);
        // dd($customerData);

        Booking::create($customerData);
        return redirect()->route('booking#list')->with(['createSuccess' => 'Booking Created Successfully...']);
    }

    protected function getBookingData(Request $request)
    {
        $data = implode(',' , $request->service);
        // dd($data);
        return [
            'customer_id' => $request->customerID,
            // 'service_id' => $request->service,
            'service_id' => $data,
            'booking_date' => Carbon::now()->format('d M Y'),
            'car_number' => $request->carNo,
            'duration' => 1,
            'note' => $request->note,
        ];
    }
}
