<?php

namespace Modules\Admin\Http\Controllers\Organization;

use App\Organization;
use App\Skills;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

class OrganizationDetailController extends Controller
{
    public function __invoke(Organization $organization) : View
    {
        $skills = Skills::whereOrganization($organization->code)->get();
        return view('admin::organization.detail', compact('organization','skills'));
    }
}
