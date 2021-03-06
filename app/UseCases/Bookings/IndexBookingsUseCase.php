<?php


namespace App\UseCases\Bookings;


use App\Models\Service;
use App\UseCases\Contracts\Bookings\IndexBookingsUseCaseInterface;

class IndexBookingsUseCase implements IndexBookingsUseCaseInterface
{
    public function handle(): array|\Illuminate\Database\Eloquent\Collection
    {
        $services = Service::all();
        return $services;
    }

}
