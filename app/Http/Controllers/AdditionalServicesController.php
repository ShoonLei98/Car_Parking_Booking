<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class AdditionalServicesController extends Controller
{
    // servic list
    public function servicesList()
    {
        $serviceData = Service::get();
        return view('admin.services.service_list')->with(['service' => $serviceData]);
    }

    // direct to create service
    public function addService()
    {
        return view('admin.services.create_services');
    }

    // create servcie to database
    public function createService(Request $request)
    {
        $service = [
            'service_id' => $request->additionalService,
            'service_name' => $request->additionalService,
            'service_price' => $request->price
        ];

        Service::create($service);
        return redirect()->route('services#list')->with(['createSuccess' => 'Service Created Successfully...']);
    }

// direct to update service page with data
    public function editService($id)
    {
        $service = Service::where('service_id', $id)->first();
        return view('admin.services.update_services')->with(['service' => $service]);
    }

    // update service data to database
    public function updateService(Request $request)
    {
        $service = [
            'service_id' => $request->additionalService,
            'service_name' => $request->additionalService,
            'service_price' => $request->price
        ];

        Service::where('service_id', $request->id)->update($service);
        return redirect()->route('services#list')->with(['updateSuccess' => 'Service Updated Successfully...']);
    }

    // delete servcie
    public function deleteService($id)
    {
        Service::where('service_id', $id)->delete();
        return back()->with(['deleteSuccess' => 'Service Deleted Successfully...']);
    }
}
