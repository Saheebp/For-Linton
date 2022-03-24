<?php

namespace App\Imports;

use App\Models\InventoryItem;
use App\Models\Inventory;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

use Auth;

//traits
use App\Traits\AppStatus;

class InventoryImport implements ToCollection
{
    use AppStatus;

    public $available;

    public function __construct()
    {
        $this->available = $this->returnStatusId("Available");
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            InventoryItem::create([
                'name' => $row[1],
                'quantity' => $row[2], 
                'threshold' => 5,
                'created_by' => Auth::user()->id,
                'batch_id' => NULL,
                'image' => NULL,
                'status_id' => $this->available,
                'category_id' => NULL,
                'inventory_id' => NULL
            ]);
        }
    }
}
