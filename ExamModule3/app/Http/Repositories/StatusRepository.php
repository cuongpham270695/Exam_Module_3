<?php


namespace App\Http\Repositories;


use App\Models\Status;

class StatusRepository
{
    public function getAll()
    {
        return Status::all();
    }

    public function store($status)
    {
        $status->save();
    }

    public function findById($id)
    {
        return Status::findOrFail($id);
    }

    public function update($status)
    {
        $status->update();
    }
}
