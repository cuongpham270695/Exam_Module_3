<?php


namespace App\Http\Repositories;


use App\Models\Agency;

class AgencyRepository
{
    public function getAll()
    {
        return Agency::with('status')->paginate(5);
    }


    public function findById($id)
    {
        return Agency::findOrFail($id);
    }

    public function update($agency)
    {
        $agency->update();
    }

    public function store($agency)
    {
        $agency->save();
    }
}
