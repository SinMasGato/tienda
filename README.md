Documentación MVC Manual PHP 8.2 19/11/2024

# 🖥️ Tienda de Informática - Sistema MVC de Gestión

![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-00000F?style=for-the-badge&logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white)

## 📋 Tabla de Contenidos
- [Descripción](#-descripción)
- [Características](#-características)
- [Tecnologías](#-tecnologías)
- [Estructura](#-estructura)
- [Instalación](#-instalación)
- [Documentación](#-documentación)
- [Capturas](#-capturas)
- [Licencia](#-licencia)

## 📝 Descripción
Sistema de búsqueda y gestión de productos informáticos implementando el patrón MVC (Modelo-Vista-Controlador) con PHP y MySQL.

## ⭐ Características
- Búsqueda por fabricante
- Búsqueda por tipo de producto
- Búsqueda por precio máximo
- Interfaz responsive con Bootstrap 5
- Sistema de rutas amigable
- Manejo de errores
- Protección contra SQL Injection

## 🛠️ Tecnologías
- PHP 7.4+
- MySQL 5.7+
- Bootstrap 5
- PDO
- Apache/Nginx

## 📂 Estructura
```
tienda/
├── 📄 index.php          # Punto de entrada
├── 📄 .htaccess         # Configuración Apache
├── 📁 assets/           # Recursos estáticos
│   └── 📁 css/
├── 📁 controllers/      # Controladores MVC
│   ├── 📄 Autoload.php
│   ├── 📄 PreguntasController.php
│   ├── 📄 Router.php
│   └── 📄 ViewController.php
├── 📁 models/          # Modelos de datos
│   └── 📄 ModelBBDD.php
└── 📁 views/           # Vistas
    ├── 📄 header.php
    ├── 📄 footer.php
    ├── 📄 error.php
    └── 📄 preguntas.php
```

## 🚀 Instalación

1. Clonar repositorio:
```bash
git clone https://github.com/usuario/tienda-informatica
cd tienda-informatica
```

2. Configurar base de datos:
```sql
mysql -u root -p < database.sql
```

3. Configurar conexión en `models/ModelBBDD.php`:
```php
private $host = 'localhost';
private $db = 'tienda';
private $user = 'root';
private $password = '';
```

4. Configurar servidor web:
- Habilitar `mod_rewrite`
- Ajustar permisos
- Configurar VirtualHost

## 📚 Documentación

### Principales Consultas

#### 🔍 Búsqueda por Fabricante
```php
public function buscarPorFabricante($fabricante) {
    $query = "SELECT p.*, f.nombre as fabricante 
              FROM producto p 
              JOIN fabricante f ON p.fk_codigo = f.pk_codigo 
              WHERE f.nombre = :fabricante";
}
```

#### 🔍 Búsqueda por Tipo
Categorías disponibles:
- 💻 Portátil
- 🖥️ Monitor
- 🖨️ Impresora
- 💾 Almacenamiento
- 🎮 Tarjeta Gráfica
- 🧮 Memoria RAM

#### 🔍 Búsqueda por Precio
```php
public function buscarPorPrecio($precio) {
    $query = "SELECT p.*, f.nombre as fabricante 
              FROM producto p 
              JOIN fabricante f ON p.fk_codigo = f.pk_codigo 
              WHERE p.precio <= :precio";
}
```

### 🔒 Seguridad
- ✅ PDO con Prepared Statements
- ✅ Validación de entradas
- ✅ Escapado HTML
- ✅ Protección SQL Injection

## 📸 Capturas
![Dashboard](https://via.placeholder.com/800x400)
![Búsqueda](https://via.placeholder.com/800x400)

## 📜 Licencia
Este proyecto está bajo la Licencia MIT. Ver [LICENSE](LICENSE) para más detalles.

## 👤 Autor
**Fredy SinMas**
- 📧 Email: fredysinmas@gmail.com
- 🌐 GitHub: [@fredysinmas](https://github.com/fredysinmas)

---
⌨️ con ❤️ por [Fredy SinMas](https://github.com/fredysinmas)
