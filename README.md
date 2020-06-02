# CakephpIdentity plugin for CakePHP

Manage roles and permissions for CakePHP.

## Installation

You can install this plugin into your CakePHP application using [composer](https://getcomposer.org).

The recommended way to install composer packages is:

```bash
composer require maymeow/cakephp-identity
```

And run

```
php bin/cake.php migrations migrate -p CakephpIdentity
```

this will create following database tables.

|Table name | Description |
|---|---|
| identity_roles | Storing roles information - it's using to group permissions together|
| identity_permissions | Storing permissions information |
| identity_permission_roles | Binding permissions to roles |
| identity_roles_users | Binding users to roles, one user can have multiple roles |
