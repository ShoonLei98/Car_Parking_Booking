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
                         ->get();

        return view('admin.booking.booking_list')->with(['booking' => $bookingData]);
    }

    // redirct booking create page from add booking in booking list
    public function addBooking()
    {
        // create booking in customer list page
        return view('admin.customer.customer_list');
    }

    // redirect booking create page from booking in customer list
    public function inputBooking($id)
    {
        // get customer id to book
        $customerID = Customer::where('customer_id', $id)->first();

        // get services to show
        $serviceData = Service::get();

        // direct create booking page with customer id and additional services
        return view('admin.booking.create_booking')->with(['customer' => $customerID, 'service' => $serviceData]);
    }

    // booking creation
    public function createBooking(Request $request)
    {
        $customerData = $this->getBookingData($request);

        Booking::create($customerData);
        return redirect()->route('booking#list')->with(['createSuccess' => 'Booking Created Successfully...']);
    }

    public function editBooking($id)
    {
        $bookingData = Booking::where('booking_id', $id)->first();

        // dd($bokingData);
        $data = json_decode($bookingData->service_id);
        $bookingData->service_id = $data;

         // get services to show
         $serviceData = Service::get();
        return view('admin.booking.update_booking')->with(['booking' => $bookingData, 'service' => $serviceData]);
    }

    public function updateBooking(Request $request)
    {
        $updateData = $this->getUpdateBookingData($request);

        Booking::where('booking_id', $request->bookingID)->update($updateData);

        return redirect()->route('booking#list')->with(['updateSuccess' => 'Booking Updated Successfully...']);
    }

    public function deleteBooking($id)
    {
        Booking::where('booking_id', $id)->delete();
        return back()->with(['deleteSuccess' => 'Booking Deleted Successfully...']);
    }

    protected function getBookingData(Request $request)
    {
        // $data = implode(',' , $request->service);
        // dd($data);
        return [
            'customer_id' => $request->customerID,
            'service_id' => json_encode($request->service),
            'booking_date' => Carbon::now()->format('d M Y'),
            'car_number' => $request->carNo,
            'duration' => 1,
            'note' => $request->note,
        ];
    }

    protected function getUpdateBookingData(Request $request)
    {
        return [
            'customer_id' => $request->customerID,
            'service_id' => json_encode($request->service),
            'booking_date' => $request->bookingDate,
            'car_number' => $request->carNo,
            'duration' => 1,
            'note' => $request->note,
        ];
    }
}
