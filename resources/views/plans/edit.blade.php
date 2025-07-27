<!DOCTYPE html>
<html>
<head>
    <title>Edit Plan</title>
</head>
<body>
    <h1>Edit Plan</h1>
    <form method="POST" action="{{ route('plans.update', $plan) }}">
        @csrf
        @method('PUT')
        <div>
            <label>Name</label>
            <input type="text" name="name" value="{{ $plan->name }}" required>
        </div>
        <div>
            <label>Vendor</label>
            <select name="vendor_id" required>
                @foreach($vendors as $vendor)
                    <option value="{{ $vendor->id }}" @selected($plan->vendor_id == $vendor->id)>{{ $vendor->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <h3>Menu Items</h3>
            @foreach($menuItems as $item)
                <div>
                    <label>{{ $item->name }}</label>
                    <input type="text" name="items[{{ $item->id }}]" value="{{ $plan->menuItems->find($item->id)?->pivot->portion }}" placeholder="portion">
                </div>
            @endforeach
        </div>
        <button type="submit">Update</button>
    </form>
</body>
</html>
