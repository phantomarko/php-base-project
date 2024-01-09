<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20240109115056 extends AbstractMigration
{
    public const TABLE_SPECIES = 'species';
    public const COLUMN_ID = 'id';

    public function getDescription(): string
    {
        return 'Create specie table';
    }

    public function up(Schema $schema): void
    {
        $table = $schema->createTable(self::TABLE_SPECIES);
        $table->addColumn(self::COLUMN_ID, 'bigint');
        $table->addColumn('name', 'string', ['length' => 50]);
        $table->addColumn('types', 'text', ['length' => 100]);
        $table->setPrimaryKey([self::COLUMN_ID]);
    }

    public function down(Schema $schema): void
    {
        $schema->dropTable(self::TABLE_SPECIES);
    }
}
