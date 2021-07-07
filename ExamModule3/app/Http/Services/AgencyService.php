<?php


namespace App\Http\Services;


use App\Http\Repositories\AgencyRepository;
use App\Models\Agency;

class AgencyService
{
    protected $agencyRepo;

    public function __construct(AgencyRepository $productRepository)
    {
        $this->agencyRepo = $productRepository;
    }

    public function getAll()
    {
        return $this->agencyRepo->getAll();
    }

    public function store($request)
    {
        $agency = new Agency();
        $agency->fill($request->all());
        $agency->category_id = $request->category;
        $this->agencyRepo->store($agency);
    }

    public function getById($id)
    {
        return $this->agencyRepo->findById($id);
    }

    public function delete($id)
    {
        $product = $this->agencyRepo->findById($id);
        $product->delete();;
    }

    public function update($request)
    {

        $agency = $this->agencyRepo->findById($request->id);
        $agency->fill($request->all());
        $agency->status_id = $request->status_id;
        $agency->save();
    }

}

