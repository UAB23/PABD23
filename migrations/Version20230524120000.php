<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230524120000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create pgr_data_db table';
    }

    public function up(Schema $schema): void
    {
        $table = $schema->createTable('pgr_data_db');
        $table->addColumn('id', 'integer', ['autoincrement' => true]);
        $table->addColumn('name', 'string', ['length' => 255]);
        $table->addColumn('email', 'string', ['length' => 255]);
        $table->addColumn('location', 'string', ['length' => 255]);
        $table->addColumn('bio', 'text');
        $table->addColumn('about_me', 'text');
        $table->addColumn('skills', 'json');

        $table->setPrimaryKey(['id']);
    }

    public function down(Schema $schema): void
    {
        $schema->dropTable('pgr_data_db');
    }
}
