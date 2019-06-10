<?php

namespace Modules\Admin\Http\Controllers\Organization;

use App\Organization;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

class OrganizationListingController extends Controller
{
    public function __invoke(Request $request) : View
    {
        $organizations = Organization::all();

        return view('admin::organization.listing', compact('organizations'));
    }
}
