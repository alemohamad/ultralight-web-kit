<?php

use Phinx\Migration\AbstractMigration;

class MessagesMigration extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('messages');
        $table->addColumn('name', 'string')
              ->addColumn('message', 'text')
              ->addColumn('image', 'string', ['null' => true])
              ->addColumn('active', 'boolean', ['default' => true])
              ->addColumn('deleted_at', 'timestamp', ['null' => true])
              ->addTimestamps()
              ->create();
    }
}
