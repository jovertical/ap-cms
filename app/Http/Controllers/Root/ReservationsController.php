<?php

namespace App\Http\Controllers\Root;

/**
 * Third party
 */
use Carbon, Notify, DataTables;

/**
 * Notifications
 */
use App\Notifications\{ResourceCreated, ResourceUpdated, ResourceDeleted};

/**
 * Models
 */
use App\{Reservation};

/**
 * Laravel
 */
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservationsController extends Controller
{
    /**
     * Display the listing of the resource.
     * @return view
     */
    public function index()
    {
        return view(user_env().'.reservations.index');
    }

    /**
     * Get data.
     * @return json
     */
	public function datatables()
	{
        return DataTables::of(Reservation::get())
            ->addColumn('products', function (Reservation $reservation) {
                return $reservation->products->toArray();
            })
            ->addColumn('status_code', function (Reservation $reservation) {
                return $reservation->status_code;
            })
            ->addColumn('creator', function (Reservation $reservation) {
                return optional($reservation->creator)->toArray();
            })
            ->addColumn('updater', function (Reservation $reservation) {
                return optional($reservation->updater)->toArray();
            })
            ->addColumn('deleter', function (Reservation $reservation) {
                return optional($reservation->deleter)->toArray();
            })
            ->setRowData([
                'show_route' => function($reservation) {
                    return route(user_env().'.reservations.show', $reservation);
                }
            ])
            ->make();
    }

    public function show(Reservation $reservation)
    {
        return view(user_env().'.reservations.show', compact('reservation'));
    }
}