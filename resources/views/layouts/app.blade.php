<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CCS Student Portal')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        heading: ['Poppins', 'sans-serif'],
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            50: '#f5f3ff', 100: '#ede9fe', 200: '#ddd6fe',
                            300: '#c4b5fd', 400: '#a78bfa', 500: '#8b5cf6',
                            600: '#7c3aed', 700: '#6d28d9', 800: '#5b21b6', 900: '#4c1d95',
                        },
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, .font-heading { font-family: 'Poppins', sans-serif; }
        .bg-mesh {
            background-color: #f4f2f9;
            background-image:
                radial-gradient(at 0% 0%, rgba(139,92,246,0.12) 0px, transparent 50%),
                radial-gradient(at 100% 0%, rgba(109,40,217,0.10) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(148,163,184,0.15) 0px, transparent 50%);
        }
    </style>
</head>
<body class="bg-mesh min-h-screen text-slate-800">
    <nav class="bg-white/70 backdrop-blur-md border-b border-slate-200 sticky top-0 z-10">
        <div class="max-w-5xl mx-auto flex justify-between items-center px-6 py-4">
            <a href="{{ route('students.create') }}" class="flex items-center gap-2 font-heading font-bold text-lg text-brand-700">
                <span class="w-8 h-8 rounded-lg bg-gradient-to-br from-brand-500 to-brand-700 flex items-center justify-center text-white text-sm">🎓</span>
                CCS Student Portal
            </a>
            <div class="flex gap-6 text-sm font-medium text-slate-600">
                <a href="{{ route('students.create') }}" class="hover:text-brand-600 transition">Register</a>
                <a href="{{ route('students.index') }}" class="hover:text-brand-600 transition">All Students</a>
            </div>
        </div>
    </nav>

    <div class="max-w-5xl mx-auto py-10 px-4">
        @yield('content')
    </div>

    <footer class="text-center text-xs text-slate-400 pb-8">
        College of Computer Studies &middot; Student Registration System
    </footer>
</body>
</html>s