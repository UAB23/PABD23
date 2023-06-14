<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class VersionYYYYMMDDHHMMSS_CreateCommentTable extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create comment table';
    }

    public function up(Schema $schema): void
    {
        $table = $schema->createTable('comment');
        $table->addColumn('id', 'integer', ['autoincrement' => true]);
        $table->addColumn('text', 'text');
        $table->addColumn('user_id', 'integer');
        $table->addColumn('blog_post_id', 'integer');
        $table->addColumn('created_at', 'datetime');
        $table->addColumn('updated_at', 'datetime');

        $table->addForeignKeyConstraint('user', ['user_id'], ['id'], ['onDelete' => 'CASCADE']);
        $table->addForeignKeyConstraint('blog_post', ['blog_post_id'], ['id'], ['onDelete' => 'CASCADE']);
    }

    public function down(Schema $schema): void
    {
        $schema->dropTable('comment');
    }
}
