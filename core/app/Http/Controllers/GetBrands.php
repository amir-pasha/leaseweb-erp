<?php


namespace App\Http\Controllers;


use App\Repositories\BrandRepository;

class GetBrands
{
    public function __construct(private BrandRepository $repository)
    {
        //
    }

    public function __invoke()
    {
        return response()->json(
            $this->repository->index()->get()
        );
    }
}
