<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Payout\BulkDestroyPayout;
use App\Http\Requests\Admin\Payout\DestroyPayout;
use App\Http\Requests\Admin\Payout\IndexPayout;
use App\Http\Requests\Admin\Payout\StorePayout;
use App\Http\Requests\Admin\Payout\UpdatePayout;
use App\Models\Payout;
use App\Models\User;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Log;
use Osen\Mpesa\B2C;

class PayoutsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexPayout $request
     * @return array|Factory|View
     */
    public function index(IndexPayout $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Payout::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'user_id', 'method', 'status', 'amount', 'currency', 'reference', 'transaction_id'],

            // set columns to searchIn
            ['id', 'method', 'status', 'currency', 'reference', 'transaction_id']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.payout.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.payout.create');

        $users = User::all(['name', 'id']);
        return view('admin.payout.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePayout $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StorePayout $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        B2C::init([
            "env"              => "sandbox",
            "type"             => 4,
            "shortcode"        => 600980,
            "headoffice"       => 600980,
            "key"              => "QXQ6t5DzdhfsrqLAsmjAXPzAZBfswPmu",
            "secret"           => "XRIwvsXwcB2sYn0z",
            "username"         => "testapi",
            "password"         => "Safaricom980!",
            "callback_url"     => url("api/lipwa/reconcile"),
            "timeout_url"      => url("api/lipwa/timeout"),
            "results_url"      => url("api/lipwa/results"),
        ]);

        $user = User::find($request->user_id);

        $requested = B2C::send($user->phone, $sanitized['amount'], $sanitized['reference'], "Payout to {$user->name}");
        Log::info($requested);
        if (isset($requested['ConversationID'])) {
            $sanitized['reference'] = $requested['ConversationID'];

            // Store the Payout
            $payout = Payout::create($sanitized);

            if ($request->ajax()) {
                return ['redirect' => url('admin/payouts'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
            }

            return redirect('admin/payouts');
        } else {
            if ($request->ajax()) {
                return array('redirect' => url('admin/payouts'), 'message' => "Payout failed. {$requested['errorMessage']}");
            }

            return back()->with('message', "Payout failed. {$requested['errorMessage']}");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Payout $payout
     * @throws AuthorizationException
     * @return void
     */
    public function show(Payout $payout)
    {
        $this->authorize('admin.payout.show', $payout);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Payout $payout
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Payout $payout)
    {
        $this->authorize('admin.payout.edit', $payout);


        $users = User::all(['name', 'id']);
        return view('admin.payout.edit', [
            'payout' => $payout,
            'users' => $users
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePayout $request
     * @param Payout $payout
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdatePayout $request, Payout $payout)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Payout
        $payout->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/payouts'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/payouts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyPayout $request
     * @param Payout $payout
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyPayout $request, Payout $payout)
    {
        $payout->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyPayout $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyPayout $request): Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Payout::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
