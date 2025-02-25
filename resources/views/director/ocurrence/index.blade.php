<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ocorrências</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="p-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Ocorrências</h1>
        <div class="grid grid-cols-1 gap-6">
            @foreach($occurrences as $occurrence)
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-xl font-semibold text-gray-800">{{ $occurrence->name }}</h2>
                    <p class="text-gray-600 mt-2">{{ $occurrence->description }}</p>
                    <div class="mt-4">
                        <p class="text-sm text-gray-500">Aluno: {{ $occurrence->student->name }}</p>
                        <p class="text-sm text-gray-500">Responsável: {{ $occurrence->responsible->name }}</p>
                        <p class="text-sm text-gray-500">Duração: {{ $occurrence->duration_days }} dias</p>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('occurrences.show', $occurrence->id) }}" class="text-blue-500 hover:text-blue-700">Ver detalhes</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>