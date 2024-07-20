<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Client;
use App\Models\Equipment;
use App\Models\Staff;
use App\Models\DashboardResponse;

class DashboardController extends Controller
{
  public function adminDashboard()
  {
    $dashboardResponse = new DashboardResponse();

    $dashboardResponse -> totalStaff = Staff::count();
    $dashboardResponse -> totalClient = Client::count();
    $dashboardResponse -> totalEquipment = Equipment::count();
    $dashboardResponse -> totalApplication = Application::count();

    return response() -> json(array('data' => $dashboardResponse), 200);
  }
}
