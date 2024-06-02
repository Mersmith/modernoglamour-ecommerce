<header class="contenedor_navbar" x-data="dataSidebar" x-on:click.away="cerrarSidebar()"
    @resize.window="abiertoSidebar = false > 900">

    <nav class="navbar">
        <!-- HAMBURGUESA -->
        <div x-on:click="toggleSidebar" class="contenedor_hamburguesa">
            <i class="fa-solid fa-bars"></i>
        </div>
        <!-- LOGO -->
        <div class="contenedor_logo">
            <a href="" style="width: 100%; display: flex;
            justify-content: center;">
                <img src="{{ asset('imagenes/empresa/logo.png') }}" alt="" />
            </a>
        </div>
        <!-- MENU -->
        <div class="contenedor_menu_link">
            <div class="sidebar_logo">
                <a href="" style="width: 100%; display: flex;
                justify-content: center;">
                    <img src="{{ asset('imagenes/empresa/logo.png') }}" alt="" />
                </a>
                <i x-on:click="cerrarSidebar" style="cursor: pointer;" class="fa-solid fa-xmark"></i>
            </div>
            <hr>
            <div class="contenedor_administrador_sidebar">

                <img src="{{ asset('imagenes/perfil/sin_foto_perfil.png') }}">

                <p>Smith</p>
             
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf
                    <a href="{{ route('logout') }}" @click.prevent="$root.submit();">
                        {{ __('Cerrar') }}
                    </a>
                </form>
            </div>
            <hr>

            @include('erp.menu.menu-principal-contenedor')

            <hr>
            <!-- FIN MENU-PRINCIPAL -->
        </div>
        <!-- ICONOS -->
        <!--<div class="contenedor_iconos">
            <i class="fa-solid fa-heart" style="color: #ffa03d;"></i>
        </div> -->
    </nav>

</header>

@push('script')
    <script>
        window.addEventListener("resize", function(event) {
            if (document.body.clientWidth < 900) {
                document.querySelector(".contenedor_menu_link").style.left = "-100%";

            } else {
                document.querySelector(".contenedor_menu_link").style.left = "0";
            }
        })

        function dataSidebar() {
            return {
                seleccionadoPrincipal: null,
                seleccionarPrincipal(id) {
                    if (this.seleccionadoPrincipal == id) {
                        this.seleccionadoPrincipal = null;
                    } else {
                        this.seleccionadoPrincipal = id;
                    }
                },
                abiertoSidebar: false,
                toggleSidebar() {
                    this.abiertoSidebar = !this.abiertoSidebar
                    if (this.abiertoSidebar) {
                        document.querySelector(".contenedor_menu_link").style.left = "0";
                    } else {
                        document.querySelector(".contenedor_menu_link").style.left = "-100%";
                    }
                },
                /*abrirSidebar() {
                    if (this.abiertoSidebar) {
                        this.abiertoSidebar = false;
                        document.querySelector(".contenedor_menu_link").style.left = "-100%";
                    } else {
                        this.abiertoSidebar = true;
                        document.querySelector(".contenedor_menu_link").style.left = "0";
                    }
                },*/
                cerrarSidebar() {
                    let anchoPantalla = (window.innerWidth > 0) ? window.innerWidth : screen.width;
                    if (anchoPantalla < 900) {
                        this.abiertoSidebar = false;
                        document.querySelector(".contenedor_menu_link").style.left = "-100%";
                    }
                }
            }
        }

        function dataPrincipal() {
            return {
                seleccionadoSubMenu1: null,
                seleccionarSubMenu1(id) {
                    if (this.seleccionadoSubMenu1 == id) {
                        this.seleccionadoSubMenu1 = null;
                    } else {
                        this.seleccionadoSubMenu1 = id;
                    }
                },
            }
        }

        function dataSubMenu1() {
            return {
                seleccionadoSubMenu2: null,
                seleccionarSubMenu2(id) {
                    if (this.seleccionadoSubMenu2 == id) {
                        this.seleccionadoSubMenu2 = null;
                    } else {
                        this.seleccionadoSubMenu2 = id;
                    }
                },
            }
        }

        function dataSubMenu2() {
            return {
                seleccionadoSubMenu3: null,
                seleccionarSubMenu3(id) {
                    if (this.seleccionadoSubMenu3 == id) {
                        this.seleccionadoSubMenu3 = null;
                    } else {
                        this.seleccionadoSubMenu3 = id;
                    }
                },
            }
        }

        function dataSubMenu3() {
            return {
                seleccionadoSubMenu4: null,
                seleccionarSubMenu4(id) {
                    if (this.seleccionadoSubMenu4 == id) {
                        this.seleccionadoSubMenu4 = null;
                    } else {
                        this.seleccionadoSubMenu4 = id;
                    }
                },
            }
        }
    </script>
@endpush
