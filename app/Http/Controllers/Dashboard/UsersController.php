<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use App\Http\Requests\General\MultiDelete;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends GeneralController
{
    protected $viewPath = 'users.';
    protected $path = 'users';
    private $route = 'dashboard.users';

    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    /**
     * Get All Data Model
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // Get all data model
        $data = $this->getData();
        // Search By Phone Or Email Or Username
        request()->whenFilled('username', function() use ($data) {
            $req = request()->username;
            if (filter_var($req, FILTER_VALIDATE_EMAIL))
                $search = 'email';
            else
                $search = 'first_name';
            $data->where($search, 'like', '%' . $req . '%');
        });
        // Filter Social Type
        request()->whenFilled('social_type', function() use($data) {
            $data->whereSocialType(request()->social_type);
        });
        $data = $data->paginate($this->paginate);
        // Get Types Of Drivers
        $drivers = $this->model->drivers;
        return view($this->viewPath($this->viewPath . 'index'), compact('data', 'drivers'));
    }




    /**
     * Delete Data from DB
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete($id)
    {
        // Get and Check Data
        $data = $this->GetItem($id);
        // Delete Data from DB
        $data->delete();
        $this->flash('success', __('lang.deleted'));
        return redirect(route($this->route));
    }


    /**
     * Delete Multi Records From DB
     * @param MultiDelete $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deletes(MultiDelete $request)
    {
        // Get Inputs Data From Request
        $data = $request->validated();
        // Get Items Selected
        $items = $this->model->whereIn('id', $data['data']);
        // Check If Not Have Count Items Or Check If User Delete Yourself
        if(!$items->count()) {
            $this->flash('warning', __('lang.select_least_one'));
            return back();
        }
        // Get & Delete Data Selected
        $items->delete();
        $this->flash('success', __('lang.deleted'));
        return redirect(route($this->route));
    }

}
