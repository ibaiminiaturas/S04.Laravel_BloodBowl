<!DOCTYPE html>
<html>
<head>
    <title>Player Types</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6 text-center">Player Types</h1>

        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead>
                <tr>
                    @foreach (['Name', 'Movement', 'Strength', 'Agility', 'Passing', 'Armor', 'Cost', 'Max per team', 'Roster ID'] as $header)
                        <th class="py-3 px-4 bg-gray-200 text-center">{{ $header }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($playerTypes as $player)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-2 px-4 text-center">{{ $player->name }}</td>
                        <td class="py-2 px-4 text-center">{{ $player->movement }}</td>
                        <td class="py-2 px-4 text-center">{{ $player->strength }}</td>
                        <td class="py-2 px-4 text-center">{{ $player->agility }}</td>
                        <td class="py-2 px-4 text-center">{{ $player->passing }}</td>
                        <td class="py-2 px-4 text-center">{{ $player->armor }}</td>
                        <td class="py-2 px-4 text-center">{{ $player->cost }}</td>
                        <td class="py-2 px-4 text-center">{{ $player->max_per_team }}</td>
                        <td class="py-2 px-4 text-center">{{ $player->roster_id }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
