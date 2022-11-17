# crear usuario con tinker

> php artisan tinker

```php
$user = new App\Models\User();
$user->password = Hash::make('abc123');
$user->email = 'correo@correo.com';
$user->name = 'My Name';
$user->grupo = 'editor';
$user->save();
```

# Ejercicio 15 noviembre 2022

* Cree una autenticacion basada en roles. Para ello diseñe un modelo de roles y asocie el modelo User con ese modelo.

Rol:
* id
* nombre (texto)
* editar (entero)
* ver (entero)

ejemplo:

---------------
1  admin  1   1
2  user   0   1
----------------

Y agregue datos de ejemplo

User:
* id
* name
* email
* password
* rol (llave foranea a rol)

Y agregue datos de ejemplo usando el tinker.
