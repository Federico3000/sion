<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome (Iconos) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --color-primary: #2563eb;
            --color-secondary: #1e40af;
            --color-background: white;
            --color-text: #1e293b;
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--color-background);
            color: var(--color-text);
            margin: 0;
            padding: 0;
            height: 100vh;
            overflow: hidden;
        }

        .sidebar {
            width: 200px;
            background: var(--color-primary);
            color: white;
            position: fixed;
            height: 100vh;
            padding-top: 60px;
            z-index: 1000;
            transition: transform 0.3s ease;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 12px 20px;
            display: block;
            transition: background-color 0.2s ease;
        }

        .sidebar a:hover {
            background: var(--color-secondary);
        }

        .content {
            flex: 1;
            margin-left: 200px;
            margin-top: 60px;
            padding: 20px;
            overflow-y: auto;
            background: var(--color-background);
            transition: margin-left 0.3s ease;
        }

        .navbar {
            background: var(--color-primary);
            color: white;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1001;
            padding: 10px 20px;
            box-shadow: var(--shadow);
            height: 60px;
        }

        .navbar-brand {
            font-weight: 600;
        }

        .sidebar-toggle {
            display: none;
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                width: 200px;
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .content {
                margin-left: 0;
            }

            .sidebar-toggle {
                display: block;
            }
        }
    </style>
</head>

<body>
    <!-- Barra de menú superior (navbar) -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <button class="sidebar-toggle" id="sidebarToggle">
                <i class="fas fa-bars"></i>
            </button>
            <a class="navbar-brand" href="#">Gestión Dashboard</a>
        </div>
    </nav>

    <!-- Menú lateral (sidebar) -->
    <div class="sidebar" id="sidebar">
        <a href="#" id="inicio-link"><i class="fas fa-home"></i> Inicio</a>
        <a href="#" id="miembros-link"><i class="fas fa-users"></i> Miembros</a>
        <a href="#" id="ministerios-link"><i class="fas fa-hands-helping"></i> Ministerios</a>
        <a href="#" id="comunicacion-link"><i class="fas fa-mail-bulk"></i> Comunicación</a>
        <a href="#" id="actividades-link"><i class="fas fa-clipboard-list"></i> Actividades</a>
        <a href="#" id="finanzas-link"><i class="fas fa-hand-holding-usd"></i> Finanzas</a>
        <a href="#" id="reportes-link"><i class="fas fa-chart-line"></i> Reportes</a>
        <a href="#" id="configuracion-link"><i class="fas fa-cog"></i> Configuración</a>
        <a href="#" class="text-danger"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
    </div>

    <!-- Contenido principal (dynamic-content) -->
    <div class="content" id="content">
        <div id="dynamic-content">
            <!-- Aquí se cargará el contenido dinámico -->
            <h2 class="text-center">Bienvenido al Dashboard</h2>
            <p class="text-center">Selecciona una opción del menú para comenzar.</p>
        </div>
    </div>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JavaScript para funcionalidades -->
    <script>
        // Mostrar/ocultar el sidebar en móviles
        const sidebarToggle = document.getElementById("sidebarToggle");
        const sidebar = document.getElementById("sidebar");
        const content = document.getElementById("content");

        sidebarToggle.addEventListener("click", () => {
            sidebar.classList.toggle("active");
        });

        // Función para cerrar el sidebar en móviles
        function closeSidebarOnMobile() {
            if (window.innerWidth <= 768) {
                sidebar.classList.remove("active");
            }
        }

        // Función para cargar contenido dinámicamente
        function loadContent(url, title = "", description = "") {
            fetch(url)
                .then(response => response.text())
                .then(data => {
                    document.getElementById("dynamic-content").innerHTML = `
            ${ title ? `<h2 class="text-center">${title}</h2>` : "" }
            ${ description ? `<p class="text-center">${description}</p>` : "" }
            <hr>
            ${data}
          `;
                })
                .catch(error => console.error("Error al cargar " + url, error));
            closeSidebarOnMobile();
        }

        // Cargar contenido dinámico y cerrar el sidebar en móviles
        document.getElementById("inicio-link").addEventListener("click", function(event) {
            event.preventDefault();
            document.getElementById("dynamic-content").innerHTML = `
                <h2 class="text-center">Inicio</h2>
                <p class="text-center">Bienvenido al panel de inicio.</p>
                <hr>
            `;
            closeSidebarOnMobile();
        });

        document.getElementById("miembros-link").addEventListener("click", function(event) {
            event.preventDefault();
            fetch('miembros.php')
                .then(response => response.text())
                .then(data => {
                    document.getElementById("dynamic-content").innerHTML = `
                        <h2 class="text-center">Miembros</h2>
                        <p class="text-center">Gestiona tus Miembros.</p>
                        <hr>
                        ${data}
                    `;
                })
                .catch(error => console.error('Error al cargar miembros.php:', error));
            closeSidebarOnMobile();
        });

        document.getElementById("ministerios-link").addEventListener("click", function(event) {
            event.preventDefault();
            fetch('ministerios.php')
                .then(response => response.text())
                .then(data => {
                    document.getElementById("dynamic-content").innerHTML = `
                        <h2 class="text-center">Ministerios</h2>
                        <p class="text-center">Gestiona tus Ministerios.</p>
                        <hr>
                        ${data}
                    `;
                })
                .catch(error => console.error('Error al cargar ministerios.php:', error));
            closeSidebarOnMobile();
        });

        document.getElementById("comunicacion-link").addEventListener("click", function(event) {
            event.preventDefault();
            fetch('comunicacion.php')
                .then(response => response.text())
                .then(data => {
                    document.getElementById("dynamic-content").innerHTML = `
                        <h2 class="text-center">Comunicación</h2>
                        <p class="text-center">Gestiona tus Comunicaciones.</p>
                        <hr>
                        ${data}
                    `;
                })
                .catch(error => console.error('Error al cargar comunicacion.php:', error));
            closeSidebarOnMobile();
        });

        document.getElementById("actividades-link").addEventListener("click", function(event) {
            event.preventDefault();
            fetch('actividades.php')
                .then(response => response.text())
                .then(data => {
                    document.getElementById("dynamic-content").innerHTML = `
                        <h2 class="text-center">Actividades</h2>
                        <p class="text-center">Gestiona tus Actividades.</p>
                        <hr>
                        ${data}
                    `;
                })
                .catch(error => console.error('Error al cargar actividades.php:', error));
            closeSidebarOnMobile();
        });

        document.getElementById("finanzas-link").addEventListener("click", function(event) {
            event.preventDefault();
            fetch('finanzas.php')
                .then(response => response.text())
                .then(data => {
                    document.getElementById("dynamic-content").innerHTML = `
                        <h2 class="text-center">Finanzas</h2>
                        <p class="text-center">Gestiona tus Finanzas.</p>
                        <hr>
                        ${data}
                    `;
                })
                .catch(error => console.error('Error al cargar finanzas.php:', error));
            closeSidebarOnMobile();
        });

        document.getElementById("reportes-link").addEventListener("click", function(event) {
            event.preventDefault();
            fetch('reportes.php')
                .then(response => response.text())
                .then(data => {
                    document.getElementById("dynamic-content").innerHTML = `
                        <h2 class="text-center">Reportes</h2>
                        <p class="text-center">Gestiona tus Reportes.</p>
                        <hr>
                        ${data}
                    `;
                })
                .catch(error => console.error('Error al cargar reportes.php:', error));
            closeSidebarOnMobile();
        });

        document.getElementById("configuracion-link").addEventListener("click", function(event) {
            event.preventDefault();
            document.getElementById("dynamic-content").innerHTML = `
                <h2 class="text-center">Configuración</h2>
                <p class="text-center">Aquí puedes configurar tu cuenta.</p>
                <hr>
            `;
            closeSidebarOnMobile();
        });

        // Cerrar el sidebar al hacer clic fuera de él (solo en móviles)
        document.addEventListener("click", (event) => {
            const sidebar = document.getElementById("sidebar");
            const sidebarToggle = document.getElementById("sidebarToggle");

            if (window.innerWidth <= 768 && !sidebar.contains(event.target) && !sidebarToggle.contains(event.target)) {
                sidebar.classList.remove("active");
            }
        });

        // Evitar que el sidebar se cierre al hacer clic dentro de él
        sidebar.addEventListener("click", (event) => {
            event.stopPropagation();
        });
    </script>
</body>

</html>