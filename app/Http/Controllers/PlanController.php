<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Vendor;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::with('menuItems')->get();
        return view('plans.index', compact('plans'));
    }

    public function create()
    {
        $vendors = Vendor::all();
        $menuItems = MenuItem::all();
        return view('plans.create', compact('vendors', 'menuItems'));
    }

    public function store(Request $request)
    {
        $plan = Plan::create($request->validate([
            'name' => 'required|string',
            'vendor_id' => 'required|exists:vendors,id',
        ]));

        $items = $request->input('items', []);
        foreach ($items as $itemId => $portion) {
            if ($portion) {
                $plan->menuItems()->attach($itemId, ['portion' => $portion]);
            }
        }

        return redirect()->route('plans.index');
    }

    public function edit(Plan $plan)
    {
        $vendors = Vendor::all();
        $menuItems = MenuItem::all();
        $plan->load('menuItems');
        return view('plans.edit', compact('plan', 'vendors', 'menuItems'));
    }

    public function update(Request $request, Plan $plan)
    {
        $plan->update($request->validate([
            'name' => 'required|string',
            'vendor_id' => 'required|exists:vendors,id',
        ]));

        $plan->menuItems()->detach();
        $items = $request->input('items', []);
        foreach ($items as $itemId => $portion) {
            if ($portion) {
                $plan->menuItems()->attach($itemId, ['portion' => $portion]);
            }
        }

        return redirect()->route('plans.index');
    }

    public function destroy(Plan $plan)
    {
        $plan->menuItems()->detach();
        $plan->delete();
        return redirect()->route('plans.index');
    }
}
