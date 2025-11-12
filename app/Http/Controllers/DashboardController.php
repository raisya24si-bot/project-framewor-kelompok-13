<?php
<<<<<<< HEAD

=======
>>>>>>> f790496c5bfb9deccc48f33270e6582e533336f1
namespace App\Http\Controllers;

use Illuminate\Http\Request;

<<<<<<< HEAD
class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('admin.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
=======

class DashboardController extends Controller
    {
        public function index()
        {
            return view('admin.dashboard');
        }
    }

?>
>>>>>>> f790496c5bfb9deccc48f33270e6582e533336f1
