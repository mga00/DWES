<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250505101420 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE jugador ADD entrenador_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE jugador ADD CONSTRAINT FK_527D6F184FE90CDB FOREIGN KEY (entrenador_id) REFERENCES entrenador (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_527D6F184FE90CDB ON jugador (entrenador_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE jugador DROP FOREIGN KEY FK_527D6F184FE90CDB
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_527D6F184FE90CDB ON jugador
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE jugador DROP entrenador_id
        SQL);
    }
}
