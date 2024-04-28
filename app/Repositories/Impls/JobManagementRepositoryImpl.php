<?php

namespace App\Repositories\Impls;

use App\Repositories\Interf\JobManagementRepository;
use App\Http\Requests\Web\Employer\PostJobRequest;
use App\Models\ActiveJob;
use App\Models\Applicant;
use App\Models\JobActivityLog;
use App\Models\JobListing;
use App\Models\JobCategory;
use App\Models\Rating;
use App\Models\WishList;
use App\Notifications\ConfirmJobNotification;
use App\Traits\ImageTrait;
use Carbon\Carbon;
use Exception;
use Yajra\DataTables\Facades\DataTables;

class JobManagementRepositoryImpl implements JobManagementRepository
{
    use ImageTrait;

    public function getData($fields)
    {
        return JobListing::select($fields)->latest();
    }

    public function postJob(PostJobRequest $request)
    {
        $newJob = JobListing::create($request->validated());

        return $newJob;
    }

    public function manageJob_DataTable()
    {
        if (request()->ajax()) {
            $data = JobListing::query()->with(['jobCategory:name,id', 'applicants:job_id,id'])->where('user_id', request()->user()->id)->latest();
            return Datatables::eloquent($data)
                ->addIndexColumn()
                ->addColumn('jobCategory', function ($query) {
                    return $query->jobCategory->name;
                })
                ->addColumn('applicants', function ($query) {
                    return count($query->applicants);
                })
                ->addColumn('action', function ($query) {
                    $applicant_route = route('web.employers.managejob.manage-job.applications', $query->slug);
                    $delete_route = route('web.employers.managejob.manage-job.destroy', $query->slug);
                    $edit_route = route('web.employers.managejob.manage-job.update', $query->slug);
                    $params = $query;
                    $actionBtn = "<div class='flex items-center space-x-2'>";
                    $actionBtn .= "<a href='{$applicant_route}' class='inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:ring-teal-300 dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800 space-x-2'>
                                        <i class='fa fa-list'></i>
                                        <span class='hidden lg:block'>Applications</span>
                                    </a>";
                    $actionBtn .= "<button type='button' onclick='openUpdateDrawer(this)' data-href='{$edit_route}' data-query='{$params}'
                                        class='inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 space-x-2'>
                                        <i class='fa fa-edit'></i>
                                        <span class='hidden lg:block'>Update</span>
                                    </button>";
                    $actionBtn .= "<button type='button' data-href='{$delete_route}' onclick='openDeleteDrawer(this)' class='inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900 space-x-2'><i class='fa fa-trash'></i> <span class='hidden lg:block'>Delete</span></button>";
                    $actionBtn .= "</div>";
                    return $actionBtn;
                })
                ->editColumn('expired_at', function ($query) {
                    return Carbon::parse($query->expired_at)->format('d M, Y g:i A');
                })
                ->editColumn('status', function ($query) {
                    if ($query->status == EXPIRED) {
                        return "<span class='bg-red-500 px-3 py-1 rounded-lg text-xs text-white capitalize'>{$query->status}</span>";
                    } else {
                        return "<span class='bg-green-600 px-3 py-1 rounded-lg text-xs text-white capitalize'>{$query->status}</span>";
                    }
                })
                ->editColumn('created_at', function ($query) {
                    return Carbon::parse($query->created_at)->format('d M, Y g:i A');
                })
                ->rawColumns(['action', 'status'])->toJson();
        }

        $jobCategories = JobCategory::select('id', 'name')->get();
        return view('web.employers.manage-job.index', compact('jobCategories'));
    }

    public function application_DataTable($job)
    {
        if (request()->ajax()) {
            $data = Applicant::query()->where('job_id', $job->id)->with(['user', 'job'])->latest();
            return Datatables::eloquent($data)
                ->addIndexColumn()
                ->addColumn('action', function ($query) use ($job) {
                    $csrf_token = csrf_token();
                    $update_route = route('web.employers.managejob.manage-job.applications.update');
                    $actionBtn = "<div class='flex items-center space-x-2'>";
                    if ($query->status == PENDING) {
                        if ($job->status == ACTIVE) {
                            $actionBtn .= "<form action='{$update_route}' method='POST'>
                                        <input type='hidden' name='status' value='confirm'>
                                        <input type='hidden' name='applicant_id' value='{$query->id}'>
                                        <input type='hidden' name='_token' value='{$csrf_token}'>

                                        <button type='submit' class='inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:ring-green-300 dark:focus:ring-green-900 space-x-2'>
                                            <i class='fa fa-check-circle'></i>
                                            <span class='hidden lg:block'>Confirm</span>
                                        </button>
                                    </form>
                                    <form action='{$update_route}' method='POST'>
                                        <input type='hidden' name='status' value='reject'>
                                        <input type='hidden' name='applicant_id' value='{$query->id}'>
                                        <input type='hidden' name='_token' value='{$csrf_token}'>

                                        <button type='submit' class='inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900 space-x-2'>
                                            <i class='fa fa-times-circle'></i>
                                            <span class='hidden lg:block'>Reject</span>
                                        </button>
                                    </form>";
                        }
                    }

                    if ($query->status == CONFIRM) {
                        $actionBtn .= "<div class='inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-700 rounded-md space-x-2'>
                                            <i class='fa fa-check-circle'></i>
                                        </div>";
                    }

                    if ($query->status == REJECT) {
                        $actionBtn .= "<div class='inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-md space-x-2'>
                                                <i class='fa fa-times-circle'></i>
                                            </div>";
                    }

                    $actionBtn .= "</div>";
                    return $actionBtn;
                })
                ->addColumn('rating', function ($query) {
                    $html = "<label>";

                    if ($query->user->ratings->average('score') < 1) {
                        $html .= '<span class="icon">★</span>
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                                <span class="icon">★</span>';
                    } else if ($query->user->ratings->average('score') > 1 && $query->user->ratings->average('score') < 2) {
                        $html .= '<span class="icon text-yellow-300">★</span>
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                                <span class="icon">★</span>';
                    } else if ($query->user->ratings->average('score') > 2 && $query->user->ratings->average('score') < 3) {
                        $html .= '<span class="icon text-yellow-300">★</span>
                                <span class="icon text-yellow-300">★</span>
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                                <span class="icon">★</span>';
                    } else if ($query->user->ratings->average('score') > 3 && $query->user->ratings->average('score') < 4) {
                        $html .= '<span class="icon text-yellow-300">★</span>
                                <span class="icon text-yellow-300">★</span>
                                <span class="icon text-yellow-300">★</span>
                                <span class="icon">★</span>
                                <span class="icon">★</span>';
                    } else if ($query->user->ratings->average('score') > 4 && $query->user->ratings->average('score') < 5) {
                        $html .= '<span class="icon text-yellow-300">★</span>
                                <span class="icon text-yellow-300">★</span>
                                <span class="icon text-yellow-300">★</span>
                                <span class="icon text-yellow-300">★</span>
                                <span class="icon">★</span>';
                    } else {
                        $html .= '<span class="icon text-yellow-300">★</span>
                                <span class="icon text-yellow-300">★</span>
                                <span class="icon text-yellow-300">★</span>
                                <span class="icon text-yellow-300">★</span>
                                <span class="icon text-yellow-300">★</span>';
                    }

                    $html .= "</label>";

                    return $html;
                })
                ->editColumn('resume', function ($query) {
                    return "<a href='{$query->resume}' class='inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:ring-teal-300 dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800 space-x-2'>
                                        <i class='fa fa-eye'></i>
                                        <span class='hidden lg:block'>Click to View</span>
                                    </a>";
                })
                ->editColumn('resume_text', function ($query) {
                    return "<button type='button' onclick='openResumeModal(this)' data-query='{$query->resume_text}'
                                        class='inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:ring-teal-300 dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800 space-x-2'>
                                        <i class='fa fa-eye'></i>
                                        <span class='hidden lg:block'>Click to View</span>
                                    </button>";
                })
                ->editColumn('status', function ($query) {
                    if ($query->status == PENDING) {
                        return "<span class='bg-amber-600 px-3 py-1 rounded-lg text-xs text-white capitalize'>{$query->status}</span>";
                    } else if ($query->status == CONFIRM) {
                        return "<span class='bg-green-600 px-3 py-1 rounded-lg text-xs text-white capitalize'>{$query->status}</span>";
                    } else {
                        return "<span class='bg-red-500 px-3 py-1 rounded-lg text-xs text-white capitalize'>{$query->status}</span>";
                    }
                })
                ->editColumn('created_at', function ($query) {
                    return Carbon::parse($query->created_at)->format('d M, Y g:i A');
                })
                ->rawColumns(['action', 'status', 'resume', 'resume_text', 'rating'])->toJson();
        }

        return view('web.employers.manage-job.applicantions', compact('job'));
    }

    public function application_Update($data)
    {
        $applicant = Applicant::findOrFail($data['applicant_id']);

        if ($data['status'] == CONFIRM) {
            $applicant->user->notify(new ConfirmJobNotification($applicant->job));

            $applicant->update(['status' => $data['status']]);

            $applicant->job->update(['status' => EXPIRED]);

            Applicant::where([
                ['id', '!=', $applicant->id],
                ['job_id', $applicant->job->id],
            ])->update(['status' => REJECT]);

            ActiveJob::create([
                'job_id' => $applicant->job_id,
                'freelancer_id' => $applicant->user_id,
                'employer_id' => request()->user()->id,
            ]);
        } else {
            $applicant->update(['status' => $data['status']]);
        }

        return $applicant;
    }

    public function getBySlug($slug)
    {
        return JobListing::where('slug', $slug)->first();
    }

    public function updateJob(JobListing $job, $data): JobListing
    {
        $job->update($data);

        return $job;
    }

    public function delete(string $slug): void
    {
        $job = $this->getBySlug($slug);
        $job->delete();
    }

    public function applyJob($data)
    {
        if (isset(request()->user()->freelancerProfile) && request()->user()->freelancerProfile->status == ACTIVE) {
            $job = $this->getBySlug($data['job']);

            $exist = Applicant::where('user_id', request()->user()->id)->where('job_id', $job->id)->count() > 0 ? true : false;

            if ($exist) {
                throw new Exception("You already applied this job!", 422);
            }

            $pdf = $this->uploadImage($data['resume'], 'applicant-pdf');

            $applicant = Applicant::create(array_merge($data, ['job_id' => $job->id, 'resume' => $pdf]));

            return $applicant;
        } else {
            throw new Exception("To apply job, Please update and publish your personal profile in dashboard!.");
        }
    }

    public function appliedJob_DataTable()
    {
        if (request()->ajax()) {
            $data = JobListing::query()->whereHas('applicants', function ($q) {
                $q->where('user_id', request()->user()->id);
            })->with('jobCategory:name,id')->latest();

            return Datatables::eloquent($data)
                ->addIndexColumn()
                ->addColumn('jobCategory', function ($query) {
                    return $query->jobCategory->name;
                })
                ->addColumn('action', function ($query) {
                    $detail_route = route('web.starter.job.detail', $query->slug);
                    $application = Applicant::where('user_id', request()->user()->id)->where('job_id', $query->id)->first();
                    $actionBtn = "<div class='flex items-center space-x-2'>";
                    if ($application->status != REJECT) {
                        $actionBtn .= "<a href='{$detail_route}'
                                        class='inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 space-x-2'>
                                        <i class='fa fa-eye'></i>
                                        <span class='hidden lg:block'>View Detail</span>
                                    </a>";
                    }
                    $actionBtn .= "</div>";
                    return $actionBtn;
                })
                ->editColumn('expired_at', function ($query) {
                    return Carbon::parse($query->expired_at)->format('d M, Y g:i A');
                })
                ->addColumn('application_status', function ($query) {
                    $application = Applicant::where('user_id', request()->user()->id)->where('job_id', $query->id)->first();

                    if ($application) {
                        if ($application->status == PENDING) {
                            return "<span class='bg-amber-600 px-3 py-1 rounded-lg text-xs text-white capitalize'>{$application->status}</span>";
                        } else if ($application->status == CONFIRM) {
                            return "<span class='bg-green-600 px-3 py-1 rounded-lg text-xs text-white capitalize'>{$application->status}</span>";
                        } else {
                            return "<span class='bg-red-600 px-3 py-1 rounded-lg text-xs text-white capitalize'>{$application->status}</span>";
                        }
                    }
                    return null;
                })
                ->editColumn('created_at', function ($query) {
                    return Carbon::parse($query->created_at)->format('d M, Y g:i A');
                })
                ->rawColumns(['action', 'application_status'])->toJson();
        }
        return view('web.freelancers.manage-job.applied-job');
    }

    public function addToWishList($data)
    {
        if ($data['status'] == 'false') {
            WishList::updateOrCreate([
                'user_id' => $data['user_id'],
                'job_id' => $data['job_id'],
            ], [
                'user_id' => $data['user_id'],
                'job_id' => $data['job_id'],
            ]);

            return true;
        } else {
            WishList::where([
                ['user_id', $data['user_id']],
                ['job_id', $data['job_id']]
            ])->delete();

            return false;
        }
    }

    public function wishListedJob_DataTable()
    {
        if (request()->ajax()) {
            $data = JobListing::query()->whereHas('wishList', function ($query) {
                $query->where('user_id', request()->user()->id);
            })->with(['jobCategory:name,id'])->latest();

            return Datatables::eloquent($data)
                ->addIndexColumn()
                ->addColumn('jobCategory', function ($query) {
                    return $query->jobCategory->name;
                })
                ->addColumn('action', function ($query) {
                    $application = Applicant::where('user_id', request()->user()->id)->where('job_id', $query->id)->first();
                    $detail_route = route('web.starter.job.detail', $query->slug);
                    $actionBtn = "<div class='flex items-center space-x-2'>";
                    if ($application && $application->status == REJECT) {
                    } else {
                        $actionBtn .= "<a href='{$detail_route}'
                                        class='inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 space-x-2'>
                                        <i class='fa fa-eye'></i>
                                        <span class='hidden lg:block'>View Detail</span>
                                    </a>";
                    }
                    $actionBtn .= "</div>";
                    return $actionBtn;
                })
                ->editColumn('expired_at', function ($query) {
                    return Carbon::parse($query->expired_at)->format('d M, Y g:i A');
                })
                ->editColumn('status', function ($query) {
                    if ($query->status == EXPIRED) {
                        return "<span class='bg-red-500 px-3 py-1 rounded-lg text-xs text-white capitalize'>{$query->status}</span>";
                    } else {
                        return "<span class='bg-green-600 px-3 py-1 rounded-lg text-xs text-white capitalize'>{$query->status}</span>";
                    }
                })
                ->editColumn('created_at', function ($query) {
                    return Carbon::parse($query->created_at)->format('d M, Y g:i A');
                })
                ->rawColumns(['action', 'status'])->toJson();
        }

        return view('web.freelancers.manage-job.wishlisted-job');
    }

    public function activeJob_DataTable()
    {
        if (request()->ajax()) {
            $data = ActiveJob::query()->with(['job:title,id', 'employer:name,id'])->where('freelancer_id', request()->user()->id)->latest();

            return Datatables::eloquent($data)
                ->addIndexColumn()
                ->addColumn('job', function ($query) {
                    return $query->job->title;
                })
                ->addColumn('employer', function ($query) {
                    return $query->employer->employerProfile->company_name;
                })
                ->addColumn('action', function ($query) {
                    $detail_route = route('web.freelancers.chat.index', $query->id);
                    $actionBtn = "<div class='flex items-center space-x-2'>";
                    $actionBtn .= "<a href='{$detail_route}'
                                        class='inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 space-x-2'>
                                        <i class='fa fa-cogs'></i>
                                        <span class='hidden lg:block'>Manage</span>
                                    </a>";
                    $actionBtn .= "</div>";
                    return $actionBtn;
                })
                ->editColumn('start_at', function ($query) {
                    return Carbon::parse($query->start_at)->format('d M, Y g:i A');
                })
                ->editColumn('status', function ($query) {
                    if ($query->status == ONGOING && ($query->freelancer_end || $query->employer_end)) {
                        return "<span class='bg-amber-600 px-3 py-1 rounded-lg text-xs text-white capitalize'>Closing</span>";
                    } else {
                        if ($query->status == ONGOING) {
                            return "<span class='bg-amber-600 px-3 py-1 rounded-lg text-xs text-white capitalize'>{$query->status}</span>";
                        } else {
                            return "<span class='bg-red-500 px-3 py-1 rounded-lg text-xs text-white capitalize'>{$query->status}</span>";
                        }
                    }
                })
                ->editColumn('end_at', function ($query) {
                    if ($query->end_at != null) {
                        return Carbon::parse($query->end_at)->format('d M, Y g:i A');
                    }
                    return null;
                })
                ->editColumn('created_at', function ($query) {
                    return Carbon::parse($query->created_at)->format('d M, Y g:i A');
                })
                ->rawColumns(['action', 'status'])->toJson();
        }

        return view('web.freelancers.manage-job.active-job');
    }

    public function E_activeJob_DataTable()
    {
        if (request()->ajax()) {
            $data = ActiveJob::query()->with(['job:title,id', 'freelancer:name,id'])->where('employer_id', request()->user()->id)->latest();

            return Datatables::eloquent($data)
                ->addIndexColumn()
                ->addColumn('job', function ($query) {
                    return $query->job->title;
                })
                ->addColumn('freelancer', function ($query) {
                    return $query->freelancer->name;
                })
                ->addColumn('action', function ($query) {
                    $detail_route = route('web.employers.chat.index', $query->id);
                    $actionBtn = "<div class='flex items-center space-x-2'>";
                    $actionBtn .= "<a href='{$detail_route}'
                                        class='inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 space-x-2'>
                                        <i class='fa fa-cogs'></i>
                                        <span class='hidden lg:block'>Manage</span>
                                    </a>";
                    $actionBtn .= "</div>";
                    return $actionBtn;
                })
                ->editColumn('start_at', function ($query) {
                    return Carbon::parse($query->start_at)->format('d M, Y g:i A');
                })
                ->editColumn('status', function ($query) {
                    if ($query->status == ONGOING && ($query->freelancer_end || $query->employer_end)) {
                        return "<span class='bg-amber-600 px-3 py-1 rounded-lg text-xs text-white capitalize'>Closing</span>";
                    } else {
                        if ($query->status == ONGOING) {
                            return "<span class='bg-amber-600 px-3 py-1 rounded-lg text-xs text-white capitalize'>{$query->status}</span>";
                        } else {
                            return "<span class='bg-red-500 px-3 py-1 rounded-lg text-xs text-white capitalize'>{$query->status}</span>";
                        }
                    }
                })
                ->editColumn('end_at', function ($query) {
                    if ($query->end_at != null) {
                        return Carbon::parse($query->end_at)->format('d M, Y g:i A');
                    }
                    return null;
                })
                ->editColumn('created_at', function ($query) {
                    return Carbon::parse($query->created_at)->format('d M, Y g:i A');
                })
                ->rawColumns(['action', 'status'])->toJson();
        }

        return view('web.employers.manage-job.active-job');
    }

    public function getActiveJobData($fields)
    {
        return ActiveJob::select($fields)->latest();
    }

    public function activeJob_Activity_Store($data): JobActivityLog
    {
        $activity = JobActivityLog::create($data);

        return $activity;
    }

    public function activeJob_End($activeJob_id)
    {
        $activeJob = ActiveJob::findOrFail($activeJob_id);

        if (request()->user()->isFreelancer()) {
            if ($activeJob->employer_end == true) {
                $activeJob->update([
                    'freelancer_end' => true,
                    'status' => ENDED,
                    'end_at' => now()
                ]);
            } else {
                $activeJob->update([
                    'freelancer_end' => true,
                    'end_at' => now()
                ]);
            }
        } else {
            if ($activeJob->freelancer_end == true) {
                $activeJob->update([
                    'employer_end' => true,
                    'status' => ENDED,
                    'end_at' => now()
                ]);
            } else {
                $activeJob->update([
                    'employer_end' => true,
                    'end_at' => now()
                ]);
            }
        }
    }

    public function submitRating($data)
    {
        $activeJob = ActiveJob::findOrFail($data['activeJob_id']);

        if (request()->user()->isFreelancer()) {
            Rating::create([
                'freelancer_id' => $activeJob->freelancer_id,
                'employer_id' => $activeJob->employer_id,
                'score' => $data['stars'],
                'type' => FREELANCER
            ]);
        } else {
            Rating::create([
                'freelancer_id' => $activeJob->freelancer_id,
                'employer_id' => $activeJob->employer_id,
                'score' => $data['stars'],
                'type' => EMPLOYER
            ]);
        }
    }
}
