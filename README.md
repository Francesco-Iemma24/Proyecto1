# 📊 Proyecto #1 - Programación Orientada a Objetos en PHP

<div align="center">

## Universidad Tecnológica de Panamá

### Facultad de Ingeniería de Sistemas Computacionales

**Desarrollo de Software VII**

</div>

---

## 👥 Integrantes

* Carlos Concepción
* Francesco Iemma
* Abrahan Tuñon



**Grupo:** 1GS131
**Profesor:** Irina Fong
**Fecha de Realización:** 07/06/2026

---

# 📖 Introducción

El presente proyecto fue desarrollado con el propósito de aplicar los conceptos fundamentales de la Programación Orientada a Objetos (POO) utilizando PHP. La aplicación permite resolver distintos problemas matemáticos y estadísticos mediante una estructura organizada y modular, facilitando la reutilización del código y el mantenimiento del sistema.

Para el desarrollo se implementó una arquitectura basada en el patrón Modelo-Vista-Controlador (MVC), separando la lógica de negocio, la presentación de datos y el control de las solicitudes. Esta estructura contribuye a una mejor organización del proyecto y permite futuras ampliaciones de manera sencilla.

---

# 🎯 Objetivos

## Objetivo General

Desarrollar una aplicación web utilizando PHP y Programación Orientada a Objetos para resolver diversos problemas matemáticos y estadísticos aplicando buenas prácticas de desarrollo de software.

## Objetivos Específicos

* Aplicar los principios de la Programación Orientada a Objetos.
* Implementar clases y métodos para la resolución de problemas matemáticos.
* Utilizar métodos estáticos para funciones reutilizables.
* Validar y sanitizar los datos ingresados por el usuario.
* Organizar el proyecto utilizando una estructura modular basada en MVC.
* Facilitar el mantenimiento y escalabilidad del sistema.

---

# 🚀 Tecnologías Utilizadas

<div align="center">

<img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg" alt="PHP" width="80"/>
<img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original.svg" alt="HTML5" width="80"/>
<img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/css3/css3-original.svg" alt="CSS3" width="80"/>
<img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/git/git-original.svg" alt="Git" width="80"/>
<img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/github/github-original.svg" alt="GitHub" width="80"/>

</div>

<div align="center">

### PHP • HTML5 • CSS3 • Git • GitHub

</div>

---

# 🏗️ Arquitectura del Proyecto

El proyecto sigue una estructura basada en el patrón MVC (Modelo - Vista - Controlador), permitiendo separar las responsabilidades de cada componente.

* **Models:** Contienen la lógica de negocio y los cálculos matemáticos.
* **Views:** Gestionan la presentación de la información al usuario.
* **Controllers:** Intermedian entre las vistas y los modelos.
* **Assets:** Recursos estáticos como estilos e imágenes.

---

# 💻 Programación Orientada a Objetos Implementada

Durante el desarrollo del proyecto se aplicaron diversos conceptos de Programación Orientada a Objetos.

### Características Utilizadas

* Clases y Objetos
* Encapsulación
* Métodos Públicos
* Métodos Estáticos
* Modularidad
* Reutilización de Código
* Separación de Responsabilidades

Cada problema se encuentra representado mediante una clase específica dentro de la carpeta **Models**, donde se encapsula toda la lógica necesaria para resolver el ejercicio correspondiente.

---

# 🧮 Cálculos Matemáticos

La lógica matemática del proyecto se encuentra centralizada dentro de la carpeta **Models**, donde cada clase implementa la solución de un problema específico.

Entre las operaciones desarrolladas se incluyen:

* Cálculo de media aritmética.
* Desviación estándar.
* Sumatorias.
* Potencias.
* Determinación de valores máximos y mínimos.
* Identificación de múltiplos.
* Estadísticas relacionadas con edades.
* Distribución de presupuestos.
* Operaciones con fechas.

Esta organización permite mantener una clara separación entre la lógica matemática y la interfaz de usuario.

---

# ⚙️ Métodos Estáticos

Se implementó una clase denominada **Utilidades**, la cual contiene métodos estáticos reutilizables que pueden ser utilizados desde cualquier parte de la aplicación sin necesidad de crear instancias de la clase.

### Métodos Implementados

```php
Utilidades::validarNumero();
Utilidades::validarEntero();
Utilidades::validarFecha();
Utilidades::limpiarTexto();
Utilidades::escaparSalida();
Utilidades::calcularMedia();
Utilidades::calcularDesviacion();
```

El uso de métodos estáticos permite reducir la duplicación de código y mantener una arquitectura más limpia y eficiente.

---

# 🛡️ Validación y Sanitización de Datos

Con el fin de garantizar la integridad y seguridad de la información procesada, se implementaron funciones especializadas para validar y sanitizar los datos ingresados por el usuario.

## Validación de Datos

Se implementaron métodos para:

* Validar números enteros.
* Validar números decimales.
* Validar fechas.

### Ejemplos

```php
Utilidades::validarNumero($valor);
Utilidades::validarEntero($valor);
Utilidades::validarFecha($fecha);
```

---

## Sanitización de Datos

Se implementaron funciones para limpiar y proteger los datos antes de procesarlos o mostrarlos al usuario.

### Métodos Utilizados

```php
Utilidades::limpiarTexto($texto);
Utilidades::escaparSalida($texto);
```

### Beneficios

* Eliminación de espacios innecesarios.
* Conversión de caracteres especiales.
* Protección contra ataques XSS.
* Mayor seguridad en la salida de información.

---

# 📂 Estructura del Proyecto

```text
PROYECTO1
│
├── assets/
│   ├── css/
│   │   └── estilo.css
│   └── img/
│
├── controllers/
│   ├── Problema1Controller.php
│   ├── Problema2Controller.php
│   ├── Problema3Controller.php
│   ├── Problema4Controller.php
│   ├── Problema5Controller.php
│   ├── Problema6Controller.php
│   ├── Problema7Controller.php
│   ├── Problema8Controller.php
│   └── Problema9Controller.php
│
├── models/
│   ├── problema1.php
│   ├── problema2.php
│   ├── problema3.php
│   ├── problema4.php
│   ├── problema5.php
│   ├── problema6.php
│   ├── problema7.php
│   ├── problema8.php
│   └── problema9.php
│
├── utils/
│   ├── navegacion.php
│   └── utilidades.php
│
├── views/
│   ├── header.php
│   ├── menu.php
│   ├── footer.php
│   ├── problema1.php
│   ├── problema2.php
│   ├── problema3.php
│   ├── problema4.php
│   ├── problema5.php
│   ├── problema6.php
│   ├── problema7.php
│   ├── problema8.php
│   └── problema9.php
│
├── index.php
└── README.md
```

## Descripción de las Carpetas

| Carpeta | Descripción |
|----------|------------|
| **assets** | Contiene los recursos estáticos del proyecto como hojas de estilo e imágenes. |
| **controllers** | Gestionan las solicitudes del usuario y coordinan la comunicación entre modelos y vistas. |
| **models** | Contienen la lógica de negocio y los cálculos matemáticos de cada problema. |
| **utils** | Incluye funciones auxiliares reutilizables para validación, sanitización y navegación. |
| **views** | Contienen las interfaces que interactúan con el usuario. |
| **index.php** | Punto de entrada principal de la aplicación. |

---

# 🔧 Instalación

### 1. Clonar el repositorio

```bash
git clone URL_DEL_REPOSITORIO
```

### 2. Acceder al directorio del proyecto

```bash
cd nombre-del-proyecto
```

### 3. Copiar el proyecto al servidor local

Ubicar el proyecto dentro de:

```text
C:\wamp64\www\
```

o

```text
htdocs\
```

según el servidor utilizado.

### 4. Iniciar Apache

Iniciar los servicios correspondientes desde WampServer o XAMPP.

### 5. Ejecutar la aplicación

Abrir el navegador y acceder a:

```text
http://localhost/nombre_del_proyecto
```

---

# 📚 Aprendizajes Obtenidos

Durante el desarrollo del proyecto se reforzaron conocimientos relacionados con:

* Programación Orientada a Objetos.
* Uso de clases y métodos.
* Métodos estáticos.
* Validación de datos.
* Sanitización de entradas.
* Arquitectura MVC.
* Organización de proyectos PHP.
* Uso de Git y GitHub para control de versiones.

---

# ✅ Conclusión

Este proyecto permitió aplicar de manera práctica los conceptos de Programación Orientada a Objetos en PHP mediante la implementación de clases especializadas, métodos estáticos, validación de datos y funciones matemáticas. La estructura modular adoptada facilita el mantenimiento del código, promueve la reutilización de componentes y sigue buenas prácticas de desarrollo de software, logrando una solución organizada, escalable y segura.
