<?php


namespace App\Http\Services;


use App\Http\Repositories\StatusRepository;
use App\Models\Status;
use Illuminate\Database\Eloquent\Model;

class StatusService
{
    protected StatusRepository $statusRepository;

    public function __construct(StatusRepository $statusRepository)
    {
        $this->statusRepository = $statusRepository;
    }

    public function getAll()
    {
        return $this->statusRepository->getAll();
    }

    public function store($request)
    {
        $status = new Status();
        $status->name = $request->name;
        $this->statusRepository->store($status);
    }

    public function getById($id)
    {
        return $this->statusRepository->findById($id);
    }

    public function update($request)
    {
        $status = $this->statusRepository->findById($request->id);
        $status->name = $request->name;
        $this->statusRepository->update($status);
    }

    public function delete($id)
    {
        $status = $this->statusRepository->findById($id);
        $status->delete();
    }
}
