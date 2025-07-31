# Felifondos

<div align="center">
  <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white" alt="CSS3">
  <img src="https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black" alt="JavaScript">
  <img src="https://img.shields.io/badge/Python-3776AB?style=for-the-badge&logo=python&logoColor=white" alt="Python">
  <img src="https://img.shields.io/badge/Hack-FF6600?style=for-the-badge&logo=hacklang&logoColor=white" alt="Hack">
</div>

## 📝 Descripción

Felifondos es una plataforma web completa dedicada a la gestión y descarga de fondos de pantalla. La aplicación permite a los usuarios explorar una amplia colección de wallpapers de alta calidad, organizados por categorías y con funcionalidades avanzadas de personalización.

### ✨ Características principales:
- **Galería visual** - Explora y visualiza fondos de pantalla en alta resolución
- **Sistema de descargas** - Descarga tus wallpapers favoritos de forma rápida y sencilla  
- **Favoritos personalizados** - Guarda tus fondos preferidos en tu colección personal
- **Recomendaciones inteligentes** - Algoritmo personalizado que sugiere contenido basado en tu historial de descargas y preferencias por categoría

## 🚀 Tecnologías Utilizadas

- **PHP** - Backend y lógica del servidor
- **CSS3** - Diseño responsive y experiencia visual
- **JavaScript** - Interactividad y funciones dinámicas del frontend
- **Python** - Algoritmos de recomendación y procesamiento de datos
- **Hack** - Optimización del rendimiento del backend

## 📋 Requisitos

- PHP 7.4 o superior
- Servidor web (Apache/Nginx)
- MySQL para base de datos
- Python 3.x (para sistema de recomendaciones)
- Extensiones PHP: GD, PDO, JSON

## 🔧 Instalación

1. Clona el repositorio:
```bash
git clone https://github.com/Ghost-ofc/Felifondos.git
```

2. Navega al directorio del proyecto:
```bash
cd Felifondos
```

3. Configura la base de datos:
```bash
# Importa el esquema de la base de datos
mysql -u usuario -p nombre_base_datos < database/schema.sql
```

4. Configura las variables de entorno:
```bash
cp config/config.example.php config/config.php
# Edita config.php con tus credenciales de base de datos
```

5. Configura tu servidor web para apuntar al directorio del proyecto

6. Instala las dependencias de Python para el sistema de recomendaciones:
```bash
pip install -r requirements.txt
```

## 🎯 Funcionalidades

### Para Usuarios
- Lista de favoritos personalizable

### Sistema de Recomendaciones
- Análisis de patrones de descarga del usuario
- Sugerencias personalizadas por categoría
- Algoritmo de aprendizaje adaptativo
- Trending wallpapers basado en popularidad

## 📱 Responsive Design

Felifondos está optimizado para funcionar perfectamente en:
- 💻 Escritorio
- 📱 Móviles
- 📟 Tablets

## 🤝 Contribuciones

Las contribuciones son bienvenidas. Por favor:

1. Fork el proyecto
2. Crea una rama para tu feature (`git checkout -b feature/NuevaFuncionalidad`)
3. Commit tus cambios (`git commit -m 'Agregar nueva funcionalidad'`)
4. Push a la rama (`git push origin feature/NuevaFuncionalidad`)
5. Abre un Pull Request

## 👤 Autor

<i>Desarrollado con ❤️ por Felines</i>
