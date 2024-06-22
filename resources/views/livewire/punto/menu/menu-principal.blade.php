<header class="side-mini-panel" x-data="dataSidebar">
    <nav class="mini-nav">
        <p x-on:click="toggleSidebar">X</p>
        <ul>
            <li>
                <a href="{{ route('punto.inicio') }}">Inicio Punto</a>
            </li>
        </ul>
    </nav>

    <div class="sidebarmenu">
        <div class="brand-logo">
            <p>L</p>
        </div>

        <div class="sidebar-nav">
            <div class="simplebar-mask">
                <ul>
                    <li>
                        <a href="{{ route('punto.inicio') }}">Inicio Punto 0</a>
                    </li>
                    <li>
                        <a href="{{ route('punto.inicio') }}">Inicio Punto</a>
                    </li>
                    <li>
                        <a href="{{ route('punto.inicio') }}">Inicio Punto</a>
                    </li>
                    <li>
                        <a href="{{ route('punto.inicio') }}">Inicio Punto</a>
                    </li>
                    <li>
                        <a href="{{ route('punto.inicio') }}">Inicio Punto</a>
                    </li>
                    <li>
                        <a href="{{ route('punto.inicio') }}">Inicio Punto</a>
                    </li>
                    <li>
                        <a href="{{ route('punto.inicio') }}">Inicio Punto</a>
                    </li>
                    <li>
                        <a href="{{ route('punto.inicio') }}">Inicio Punto</a>
                    </li>
                    <li>
                        <a href="{{ route('punto.inicio') }}">Inicio Punto</a>
                    </li>
                    <li>
                        <a href="{{ route('punto.inicio') }}">Inicio Punto</a>
                    </li>
                    <li>
                        <a href="{{ route('punto.inicio') }}">Inicio Punto</a>
                    </li>
                    <li>
                        <a href="{{ route('punto.inicio') }}">Inicio Punto</a>
                    </li>
                    <li>
                        <a href="{{ route('punto.inicio') }}">Inicio Punto</a>
                    </li>
                    <li>
                        <a href="{{ route('punto.inicio') }}">Inicio Punto</a>
                    </li>
                    <li>
                        <a href="{{ route('punto.inicio') }}">Inicio Punto</a>
                    </li>
                    <li>
                        <a href="{{ route('punto.inicio') }}">Inicio Punto</a>
                    </li>
                    <li>
                        <a href="{{ route('punto.inicio') }}">Inicio Punto</a>
                    </li>
                    <li>
                        <a href="{{ route('punto.inicio') }}">Inicio Punto</a>
                    </li>
                    <li>
                        <a href="{{ route('punto.inicio') }}">Inicio Punto 100</a>
                    </li>
                    <li>
                        <a href="{{ route('punto.inicio') }}">Inicio Punto</a>
                    </li>
                    <li>
                        <a href="{{ route('punto.inicio') }}">Inicio Punto</a>
                    </li>
                    <li>
                        <a href="{{ route('punto.inicio') }}">Inicio Punto</a>
                    </li>
                    <li>
                        <a href="{{ route('punto.inicio') }}">Inicio Punto</a>
                    </li>
                    <li>
                        <a href="{{ route('punto.inicio') }}">Inicio Punto</a>
                    </li>
                    <li>
                        <a href="{{ route('punto.inicio') }}">Inicio Punto</a>
                    </li>
                    <li>
                        <a href="{{ route('punto.inicio') }}">Inicio Punto</a>
                    </li>
                    <li>
                        <a href="{{ route('punto.inicio') }}">Inicio Punto</a>
                    </li>
                    <li>
                        <a href="{{ route('punto.inicio') }}">Inicio Punto</a>
                    </li>
                    <li>
                        <a href="{{ route('punto.inicio') }}">Inicio Punto</a>
                    </li>
                    <li>
                        <a href="{{ route('punto.inicio') }}">Inicio Punto</a>
                    </li>
                    <li>
                        <a href="{{ route('punto.inicio') }}">Inicio Punto</a>
                    </li>
                    <li>
                        <a href="{{ route('punto.inicio') }}">Inicio Punto</a>
                    </li>
                    <li>
                        <a href="{{ route('punto.inicio') }}">Inicio Punto</a>
                    </li>
                    <li>
                        <a href="{{ route('punto.inicio') }}">Inicio Punto</a>
                    </li>
                    <li>
                        <a href="{{ route('punto.inicio') }}">Inicio Punto 400</a>
                    </li>
                    <li>
                        <a href="{{ route('punto.inicio') }}">Inicio Punto</a>
                    </li>
                    <li>
                        <a href="{{ route('punto.inicio') }}">Inicio Punto</a>
                    </li>
                    <li>
                        <a href="{{ route('punto.inicio') }}">Inicio Punto</a>
                    </li>
                    <li>
                        <a href="{{ route('punto.inicio') }}">Inicio Punto</a>
                    </li>
                    <li>
                        <a href="{{ route('punto.inicio') }}">Inicio Punto</a>
                    </li>
                    <li>
                        <a href="{{ route('punto.inicio') }}">Inicio Punto</a>
                    </li>
                    <li>
                        <a href="{{ route('punto.inicio') }}">Inicio Punto</a>
                    </li>
                    <li>
                        <a href="{{ route('punto.inicio') }}">Inicio Punto</a>
                    </li>
                    <li>
                        <a href="{{ route('punto.inicio') }}">Inicio Punto</a>
                    </li>
                    <li>
                        <a href="{{ route('punto.inicio') }}">Inicio Punto</a>
                    </li>
                    <li>
                        <a href="{{ route('punto.inicio') }}">Inicio Punto</a>
                    </li>
                    <li>
                        <a href="{{ route('punto.inicio') }}">Inicio Punto</a>
                    </li>
                    <li>
                        <a href="{{ route('punto.inicio') }}">Inicio Punto 500</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>

@push('script')
    <script>
        window.addEventListener("resize", function(event) {
            if (document.body.clientWidth < 900) {
                document.querySelector(".side-mini-panel").style.left = "-320px";

            } else {
                document.querySelector(".side-mini-panel").style.left = "0";                
            }
        })

        function dataSidebar() {
            return {
                abiertoSidebar: false,
                toggleSidebar() {
                    this.abiertoSidebar = !this.abiertoSidebar
                    if (this.abiertoSidebar) {
                        document.querySelector(".sidebarmenu").style.left = "-240px";
                    } else {
                        document.querySelector(".sidebarmenu").style.left = "80px";
                    }
                },
                cerrarSidebar() {
                    let anchoPantalla = (window.innerWidth > 0) ? window.innerWidth : screen.width;
                    if (anchoPantalla < 900) {
                        this.abiertoSidebar = false;
                        document.querySelector(".sidebarmenu").style.left = "-240px";
                    }
                }
            }
        }
    </script>
@endpush
