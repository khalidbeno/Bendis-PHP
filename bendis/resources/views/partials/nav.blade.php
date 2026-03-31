<header class="border-b bg-white/80 backdrop-blur">
    <nav class="max-w-6xl mx-auto px-4 py-3 flex items-center justify-between gap-4">
        {{-- Logo / Marca --}}
        <a href="{{ url('/') }}" class="flex items-center gap-2">
            <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-slate-900 text-white text-sm font-bold">
                B
            </span>
            <span class="font-semibold tracking-tight">Bendis</span>
        </a>

        {{-- Enlaces principales --}}
        <div class="flex items-center gap-4 text-sm">
            <a href="{{ url('/productos') }}" class="hover:text-slate-900 text-slate-600">
                Productos
            </a>
            <a href="{{ url('/carrito') }}" class="hover:text-slate-900 text-slate-600">
                Carrito
            </a>

            {{-- Zona de auth (ajustaremos rutas cuando veamos tu auth) --}}
            @auth
                <span class="hidden sm:inline text-slate-500">
                    Hola, {{ auth()->user()->name }}
                </span>
                <form action="{{ url('/logout') }}" method="POST" class="inline">
                    @csrf
                    <button class="text-slate-600 hover:text-slate-900">
                        Salir
                    </button>
                </form>
            @else
                <a href="{{ url('/login') }}" class="text-slate-600 hover:text-slate-900">
                    Entrar
                </a>
                <a href="{{ url('/register') }}" class="hidden sm:inline text-slate-600 hover:text-slate-900">
                    Crear cuenta
                </a>
            @endauth
        </div>
    </nav>
</header>
