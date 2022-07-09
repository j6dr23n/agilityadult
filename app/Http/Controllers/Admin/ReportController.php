<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReportRequest;
use App\Models\Report;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        $reports = $this->getReport();

        return view('backend.reports.index', compact('reports'));
    }

    public function store(ReportRequest $request)
    {
        $data = $request->validated();

        $this->storeReport($data);

        return redirect()->back()->with('success', 'We\'ll contact you back sooner. ');
    }

    private function storeReport($data)
    {
        $report = Report::create([
            'video_id' => $data['video_id'],
            'user_id' => auth()->id(),
            'name' => $data['name'],
            'email' => $data['email'],
            'ph_number' => $data['ph_number'],
            'info' => $data['info'],
        ]);

        return $report;
    }

    private function getReport()
    {
        $report = DB::table('reports')->join('users', 'users.id', '=', 'reports.user_id')->join('videos', 'videos.id', '=', 'reports.video_id')->select('reports.*', 'users.id as userID', 'videos.slug as videoSLug')->paginate(15);

        return $report;
    }
}
