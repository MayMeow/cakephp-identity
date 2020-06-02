# CakephpIdentity plugin for CakePHP

Manage roles and permissions for CakePHP.

## Requirements

* CakePHP 4.*
* PHP >= 7.3
* Database (Mysql/MariaDB/Postgres)
* Existing Users table where are stored users data used for authentication.

If you do not have users table you can create new migration and update `change()` function to look like this

```php
/**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('users');
        $table->addColumn('email', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('password', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
    }
```

or use `cake`

```bash
php bin/cake.php bake migration CreateUsers email:string password:string created modified
```

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

## How to use

Permissions are using action strings to verify permissions. Action string looks like this
`Plugin:/prefix/Controller/Action` or `__:/prefix/Controller/Action` when plugin is not available;

You can get action string via `CakephpIdentity\Factories\ActionFactory::getActionString($this->request)` from any controller;
