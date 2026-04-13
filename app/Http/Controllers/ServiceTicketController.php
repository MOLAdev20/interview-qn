<?php

namespace App\Http\Controllers;

use App\Models\ServiceTicket;
use Illuminate\Http\Request;

class ServiceTicketController extends Controller
{
    public function index()
    {
        return view("service-ticket");
    }

    public function getAll()
    {
        $data = ServiceTicket::all();

        if (empty($data)) {
            return response()->json([
                "status" => "error",
                "message" => "Data not found"
            ], 404);
        }

        return response()->json([
            "status" => "success",
            "data" => $data
        ]);
    }

    public function store(Request $request)
    {
        $validator = $request->validate(
            [
                "date_wo" => "required",
                "branch" => "required",
                "no_wo_client" => "required",
                "type_wo" => "required",
                "client" => "required",
                "teknisi" => "required"
            ],
            [
                "date_wo.required" => "Date WO is required",
                "branch.required" => "Branch is required",
                "no_wo_client.required" => "No WO Client is required",
                "type_wo.required" => "Type WO is required",
                "client.required" => "Client is required",
                "teknisi.required" => "Teknisi is required"
            ]
        );

        ServiceTicket::create($validator);

        return response()->json([
            "status" => "success",
            "message" => "new services ticket has been added"
        ]);
    }

    public function remove($id)
    {
        $data = ServiceTicket::find($id);

        if (empty($data)) {
            return response()->json([
                "status" => "error",
                "message" => "Data not found"
            ], 404);
        }

        $data->delete();

        return response()->json([
            "status" => "success",
            "data" => $data
        ]);
    }

    public function detail($id)
    {
        $data = ServiceTicket::find($id);

        if (empty($data)) {
            return response()->json([
                "status" => "error",
                "message" => "Data not found"
            ], 404);
        }

        return response()->json([
            "status" => "success",
            "data" => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = $request->validate(
            [
                "date_wo" => "required",
                "branch" => "required",
                "no_wo_client" => "required",
                "type_wo" => "required",
                "client" => "required",
                "teknisi" => "required"
            ],
            [
                "date_wo.required" => "Date WO is required",
                "branch.required" => "Branch is required",
                "no_wo_client.required" => "No WO Client is required",
                "type_wo.required" => "Type WO is required",
                "client.required" => "Client is required",
                "teknisi.required" => "Teknisi is required"
            ]
        );

        $data = ServiceTicket::find($id);

        if (empty($data)) {
            return response()->json([
                "status" => "error",
                "message" => "Data not found"
            ], 404);
        }

        $data->update($validator);

        return response()->json([
            "status" => "success",
            "data" => $data
        ]);
    }

    public function changeStatus($id)
    {
        $data = ServiceTicket::find($id);

        if (empty($data)) {
            return response()->json([
                "status" => "error",
                "message" => "Data not found"
            ], 404);
        }

        $data->update(["is_active" => !$data->is_active]);

        return response()->json([
            "status" => "success",
            "data" => $data
        ]);
    }
}
