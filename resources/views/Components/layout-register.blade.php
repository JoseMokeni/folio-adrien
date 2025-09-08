<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inscription | Mon Application</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#6366F1',   // Indigo moderne
                        secondary: '#1E293B', // Slate foncé
                        accent: '#F59E0B',   // Orange doré
                        background: '#0F172A', // Fond sombre
                        surface: '#1E293B',  // Surface des cartes
                    },
                },
            },
        };
    </script>
</head>

<body class="bg-background min-h-screen flex items-center justify-center relative overflow-hidden">
{{ $slot }}
</body>

</html>
