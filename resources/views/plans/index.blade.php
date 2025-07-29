<!DOCTYPE html>
<html>
<head>
    <title>Plans</title>
</head>
<body>
    <h1>Plans</h1>
    <a href="{{ route('plans.create') }}">Create Plan</a>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>Name</th>
            <th>Vendor</th>
            <th>Menu Items</th>
            <th>Actions</th>
        </tr>
        @foreach($plans as $plan)
        <tr>
            <td>{{ $plan->name }}</td>
            <td>{{ $plan->vendor->name }}</td>
            <td>
                <ul>
                @foreach($plan->menuItems as $item)
                    <li>{{ $item->name }} - {{ $item->pivot->portion }}</li>
                @endforeach
                </ul>
            </td>
            <td>
                <a href="{{ route('plans.edit', $plan) }}">Edit</a>
                <form method="POST" action="{{ route('plans.destroy', $plan) }}" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Delete?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
