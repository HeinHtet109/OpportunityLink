<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\ApplyJobRequest;
use App\Models\Applicant;
use App\Models\User;
use App\Models\WishList;
use App\Repositories\Interf\FaqRepository;
use App\Repositories\Interf\JobCategoryRepository;
use App\Repositories\Interf\JobManagementRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class NavigationController extends Controller
{
    private FaqRepository $repository;
    private JobManagementRepository $jobManageRepo;
    private JobCategoryRepository $jobCategoryRepo;

    public function __construct(FaqRepository $repository, JobManagementRepository $jobManageRepo, JobCategoryRepository $jobCategoryRepo)
    {
        $this->repository = $repository;
        $this->jobManageRepo = $jobManageRepo;
        $this->jobCategoryRepo = $jobCategoryRepo;
    }

    public function home() : View {
        $employers = User::where('role', EMPLOYER)->whereHas('employerProfile', function($q) {
            $q->where('status', ACTIVE);
        })->latest()->take(4)->get();

        $jobListings = $this->jobManageRepo->getData(['title', 'slug', 'location', 'offer_salary','user_id', 'id', 'experience_level'])
        ->when(isset(request()->search), function($query) {
            $query->where('title', 'like', '%' . urldecode(request()->search) .'%')->orWhereHas('employer', function($q) {
                $q->whereHas('employerProfile', function($tq) {
                    $tq->where('company_name', urldecode(request()->search));
                });
            });
        })
        ->when(isset(request()->c), function($query) {
            $query->whereHas('jobCategory', function($q) {
                $q->where('slug', urldecode(request()->c));
            });
        })
        ->when(isset(request()->e), function($query) {
            $query->where('experience_level', urldecode(request()->e));
        })
        ->whereDate('expired_at', '>=', now())
        ->where('status', ACTIVE)
        ->with(['employer:name,id,photo'])
        ->paginate(6);

        if(request()->user() && request()->user()->isFreelancer()) {
            $wishListJobs = WishList::where('user_id', request()->user()->id)->take(3)->get();
        }else{
            $wishListJobs = [];
        }

        $jobCategories = $this->jobCategoryRepo->getData(['slug', 'name'])->get();

        return view('web.starter.home', compact('jobListings', 'employers', 'jobCategories', 'wishListJobs'));
    }

    public function jobDetail($slug) {
        $job = $this->jobManageRepo->getBySlug($slug);

        if (request()->user()) {
            $appliedJob = Applicant::where('user_id', request()->user()->id)->where('job_id', $job->id)->first();
        } else {
            $appliedJob = null;
        }

        if($job->status == EXPIRED && $appliedJob->status == REJECT) {
            abort(404);
        }

        return view('web.starter.job-detail', compact('job', 'appliedJob'));
    }

    public function applyJob(ApplyJobRequest $request) {

        try {
            $this->jobManageRepo->applyJob($request->validated());
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['status' => $th->getMessage()]);
        }

        return redirect()->back()->with('status', 'Successfully Applied!');
    }

    public function about(): View
    {
        return view('web.starter.about');
    }

    public function faq(): View
    {
        $faqs = $this->repository->getData(['ques','slug','ans','created_at'])->paginate(6);
        return view('web.starter.faq', compact('faqs'));
    }

    public function faqSingle($slug): View
    {
        $faq = $this->repository->getBySlug($slug);
        return view('web.starter.faq-single', compact('faq'));
    }

    public function contact(): View
    {
        return view('web.starter.contact');
    }

    public function term(): View
    {
        return view('web.starter.term');
    }

    public function privacy(): View {
        return view('web.starter.privacy');
    }

    public function addToWishList(Request $request) {
        $request->validate([
            'user_id' => 'in:'. request()->user()->id,
        ]);

        try {
            $res = $this->jobManageRepo->addToWishList($request->all());

            return response()->json(['status' => true, 'data' => $res]);
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'message' => "Failed to add job in wishlist"], 422);
        }
    }
}
