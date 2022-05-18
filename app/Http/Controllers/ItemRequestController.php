<?php

namespace App\Http\Controllers;

use App\Models\ItemRequest;
use App\Models\Item;
use App\Models\User;
use App\Models\Project;
use App\Models\Inventory;
use App\Models\InventoryItem;
use Illuminate\Http\Request;

class ItemRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ItemRequest  $itemRequest
     * @return \Illuminate\Http\Response
     */
    public function show(ItemRequest $itemRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ItemRequest  $itemRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemRequest $itemRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ItemRequest  $itemRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ItemRequest $itemRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ItemRequest  $itemRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemRequest $itemRequest)
    {
        //
    }

    public function approve(Request $request)
    {
        $validated = $request->validate([
            'status' => 'required|string|max:255'
        ]);
        
        try 
        {
            $itemRequest = ItemRequest::where('id',$request->request_id)->first();
            $item = InventoryItem::where('id',$request->inventory_item_id)->first();
            $inventory = Inventory::where('id',$request->inventory_id)->first();

            $itemRequest->update([
                'status_id' => $request->status,
            ]);
            $itemRequest->save();

            $data = array();
            $data['body'] = auth()->user()->name." Updated status of a request for ".$item->name." on Project : ".$inventory->name;
            $data['project_id'] = $inventory->project->id;
            $data['task_id'] = NULL;
            $data['sub_task_id'] = NULL;
            $data['grand_task_id'] = NULL;
            $data['great_task_id'] = NULL;
            $data['user_id'] = auth()->user()->id;

            $data['emails'] = $this->getIndividualEmails($inventory->project->manager->id); 
            $this->createLog($data);
            $this->CreateNotification($data);


            return back()->with('success', 'Request Status updated successfully.');
        }
        catch (\Exception $e) 
        {
            dd($e);
            return back()->with('error', "Oops, Error Updating Request Status");
        }
    }

    public function getTeamEmails($grand_task_id)
    {
        try 
        {
            $emails = Array();
            $members = ProjectMember::where('project_id', $project_id)->get();
            foreach ($members as $member) {
                $emails[] = $member->user()->email;
            }
            return $emails;
        }
        catch (\Exception $e) 
        {
            return false;
        }
    }

    public function getIndividualEmails($user_id)
    {
        try 
        {
            $emails = Array();
            $user = User::find($user_id);
            $emails[] = $user->email;
            return $emails;
        }
        catch (\Exception $e) 
        {
            return false;
        }
    }
}
