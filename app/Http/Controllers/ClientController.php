<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Mail\WelcomeMail;
use App\Models\Client;
use App\Service\ClientService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ClientController extends Controller
{
    public function __construct(private  ClientService $clientService)
    {

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * After Use Single Responsibility Principle
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request) : JsonResponse
    {
        $client= $this->clientService->create($request->validated());
        Mail::to($client->email)->send(new WelcomeMail($client));
        return response()->json($client, 201);
    }

    /**
     * ❌ This function breaks the Single Responsibility Principle
     *
     * @throws ValidationException
     */
    public function storeClient(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(),
            [
                'name' => 'required',
                'email' => 'required|email',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $client = Client::create($validator->validated());
        Mail::send('emails.welcome', ['user' => $client], function ($message) use ($client) {
            $message->to($client->email)->subject('Welcome!');
        });
        Log::info('New user created: '.$client->email);

        return response()->json($client, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
    }
}
