<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Livewire</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <livewire:styles />
    <livewire:scripts />

</head>
<body class="flex justify-center">
    <div class="flex w-10/12 my-10">
        <div class="w-5/12 p-2 border rounded">
            <livewire:tickets />
        </div>
        <div class="w-7/12 p-2 mx-2 border rounded">
            <livewire:comments />
        </div>
    </div>
</body>
</html>
