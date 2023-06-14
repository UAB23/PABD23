<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class VersionYYYYMMDDHHMMSS_CreateBlogPostTable extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create blog post table';
    }

    public function up(Schema $schema): void
    {
        $table = $schema->createTable('blog_post');
        $table->addColumn('id', 'integer', ['autoincrement' => true]);
        $table->addColumn('title', 'string', ['length' => 255]);
        $table->addColumn('image', 'string', ['length' => 255]);
        $table->addColumn('text', 'text');
        $table->addColumn('user_id', 'integer');
        $table->addColumn('created_at', 'datetime');
        $table->addColumn('updated_at', 'datetime');

        $table->addForeignKeyConstraint('user', ['user_id'], ['id'], ['onDelete' => 'CASCADE']);
    }

    public function down(Schema $schema): void
    {
        $schema->dropTable('blog_post');
    }
}
