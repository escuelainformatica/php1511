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
