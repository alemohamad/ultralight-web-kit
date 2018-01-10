<?php

use Phinx\Migration\AbstractMigration;

class UsersMigration extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('users');
        $table->addColumn('username', 'string')
              ->addColumn('password', 'string')
              ->addColumn('deleted_at', 'timestamp', ['null' => true])
              ->addTimestamps()
              ->create();
    }
}
