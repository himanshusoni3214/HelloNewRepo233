<!DOCTYPE html>
<html>
<head>
    <title>Create Plan</title>
</head>
<body>
    <h1>Create Plan</h1>
    <form method="POST" action="{{ route('plans.store') }}">
        @csrf
        <div>
            <label>Name</label>
            <input type="text" name="name" required>
        </div>
        <div>
            <label>Vendor</label>
            <select name="vendor_id" required>
                @foreach($vendors as $vendor)
                    <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <h3>Menu Items</h3>
            @foreach($menuItems as $item)
                <div>
                    <label>{{ $item->name }}</label>
                    <input type="text" name="items[{{ $item->id }}]" placeholder="portion">
                </div>
            @endforeach
        </div>
        <button type="submit">Save</button>
    </form>
</body>
</html>
