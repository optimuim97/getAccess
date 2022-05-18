<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTicketStatusRequest;
use App\Http\Requests\UpdateTicketStatusRequest;
use App\Repositories\TicketStatusRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class TicketStatusController extends AppBaseController
{
    /** @var  TicketStatusRepository */
    private $ticketStatusRepository;

    public function __construct(TicketStatusRepository $ticketStatusRepo)
    {
        $this->ticketStatusRepository = $ticketStatusRepo;
    }

    /**
     * Display a listing of the TicketStatus.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $ticketStatuses = $this->ticketStatusRepository->all();

        return view('ticket_statuses.index')
            ->with('ticketStatuses', $ticketStatuses);
    }

    /**
     * Show the form for creating a new TicketStatus.
     *
     * @return Response
     */
    public function create()
    {
        return view('ticket_statuses.create');
    }

    /**
     * Store a newly created TicketStatus in storage.
     *
     * @param CreateTicketStatusRequest $request
     *
     * @return Response
     */
    public function store(CreateTicketStatusRequest $request)
    {
        $input = $request->all();

        $ticketStatus = $this->ticketStatusRepository->create($input);

        Flash::success('Ticket Status saved successfully.');

        return redirect(route('ticketStatuses.index'));
    }

    /**
     * Display the specified TicketStatus.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ticketStatus = $this->ticketStatusRepository->find($id);

        if (empty($ticketStatus)) {
            Flash::error('Ticket Status not found');

            return redirect(route('ticketStatuses.index'));
        }

        return view('ticket_statuses.show')->with('ticketStatus', $ticketStatus);
    }

    /**
     * Show the form for editing the specified TicketStatus.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ticketStatus = $this->ticketStatusRepository->find($id);

        if (empty($ticketStatus)) {
            Flash::error('Ticket Status not found');

            return redirect(route('ticketStatuses.index'));
        }

        return view('ticket_statuses.edit')->with('ticketStatus', $ticketStatus);
    }

    /**
     * Update the specified TicketStatus in storage.
     *
     * @param int $id
     * @param UpdateTicketStatusRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTicketStatusRequest $request)
    {
        $ticketStatus = $this->ticketStatusRepository->find($id);

        if (empty($ticketStatus)) {
            Flash::error('Ticket Status not found');

            return redirect(route('ticketStatuses.index'));
        }

        $ticketStatus = $this->ticketStatusRepository->update($request->all(), $id);

        Flash::success('Ticket Status updated successfully.');

        return redirect(route('ticketStatuses.index'));
    }

    /**
     * Remove the specified TicketStatus from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ticketStatus = $this->ticketStatusRepository->find($id);

        if (empty($ticketStatus)) {
            Flash::error('Ticket Status not found');

            return redirect(route('ticketStatuses.index'));
        }

        $this->ticketStatusRepository->delete($id);

        Flash::success('Ticket Status deleted successfully.');

        return redirect(route('ticketStatuses.index'));
    }
}
