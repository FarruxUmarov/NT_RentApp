<?php

namespace Controller;

use App\Branch;
use App\Status;

class BranchController
{
    public function branchShow(): void
    {

        $branches = (new \App\Branch())->getBranches();
//        dd($ad);

//        $ad->image = "../assets/images/ads/$ad->image";

        view(path: 'dashboard/showBranches', args: ['branches' => $branches]);
    }

    public function branchCreate(): void
    {
        $branches = (new Branch())->getBranches();
        $statuses = (new Status())->getStatuses();
        view('dashboard/showBranches', ['branches' => $branches, 'statuses' => $statuses]);
    }

}