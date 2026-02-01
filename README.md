<p align="center">
  <a href="https://github.com/Revalyx/Arkium" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Arkium Logo">
  </a>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/backend-Laravel-red" alt="Backend">
  <img src="https://img.shields.io/badge/API-REST-blue" alt="API">
  <img src="https://img.shields.io/badge/estado-en%20desarrollo-yellow" alt="Estado">
  <img src="https://img.shields.io/badge/licencia-MIT-green" alt="Licencia">
</p>

## Sobre Arkium

**Arkium** es un **backend API-first** desarrollado con **Laravel**, diseñado como un **archivo personal centralizado** para registrar, organizar y reflexionar sobre contenido consumido, como:

- 🎬 Películas  
- 📺 Series  
- 📚 Libros  
- 🎮 Videojuegos  

El proyecto está concebido con una mentalidad de **robustez, seguridad y escalabilidad**, permitiendo que distintos clientes (web, móvil o escritorio) consuman el mismo backend sin dependencias entre ellos.

Arkium **no está ligado a ningún frontend**, y actúa como un núcleo reutilizable sobre el que construir diferentes aplicaciones.

---

## Funcionalidades principales

- Registro y autenticación de usuarios
- Acceso seguro mediante tokens
- Gestión de elementos multimedia (películas, series, libros y videojuegos)
- Asociación con autores, directores, estudios u otros creadores
- Registro de fechas de consumo y metadatos
- Reseñas, notas personales y críticas
- Base preparada para futuras funcionalidades sociales

---

## Principios de arquitectura

Arkium sigue una arquitectura **API pura y desacoplada**:

- Endpoints RESTful
- Autenticación sin estado (stateless)
- Separación clara de responsabilidades
- API versionada (`/api/v1`)
- Esquema de base de datos controlado exclusivamente por migraciones
- Independencia total del cliente consumidor

Gracias a este enfoque, Arkium puede ser utilizado como backend para:
- Aplicaciones móviles
- Aplicaciones web
- Aplicaciones de escritorio
- Integraciones externas

---

## Tecnologías utilizadas

- Framework: Laravel  
- Lenguaje: PHP  
- Base de datos: MySQL / PostgreSQL (SQLite para desarrollo local)  
- Autenticación: API basada en tokens (preparada para OAuth)  
- ORM: Eloquent  
- Control de versiones: Git  

---

## Gestión de base de datos

La estructura de la base de datos se gestiona íntegramente mediante **migraciones**.

Este enfoque garantiza que:
- El esquema sea reproducible en cualquier entorno
- No se realicen cambios manuales en la base de datos
- Local, VPS y producción mantengan la misma estructura

---

## Roadmap

Algunas de las mejoras previstas para el proyecto:

- Autenticación con Google
- Integración con APIs externas para enriquecer metadatos
- Búsqueda avanzada y filtrado
- Sistema de valoraciones
- Niveles de privacidad del contenido
- Perfiles públicos opcionales

---

## Contribuciones

Arkium es un proyecto personal en desarrollo.  
Las ideas, sugerencias y aportaciones constructivas son bienvenidas.

---

## Seguridad

Si se detecta alguna vulnerabilidad de seguridad, se recomienda **no abrir issues públicos** y comunicarlo de forma responsable para su corrección.

---

## Licencia

Arkium es software de código abierto bajo la **licencia MIT**.
