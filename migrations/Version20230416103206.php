<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230416103206 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE epreuve_obstacle (epreuve_id INT NOT NULL, obstacle_id INT NOT NULL, INDEX IDX_28E472D2AB990336 (epreuve_id), INDEX IDX_28E472D2F616DCDF (obstacle_id), PRIMARY KEY(epreuve_id, obstacle_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE epreuve_obstacle ADD CONSTRAINT FK_28E472D2AB990336 FOREIGN KEY (epreuve_id) REFERENCES epreuve (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE epreuve_obstacle ADD CONSTRAINT FK_28E472D2F616DCDF FOREIGN KEY (obstacle_id) REFERENCES obstacle (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE parametrer CHANGE hauteur hauteur VARCHAR(50) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE epreuve_obstacle DROP FOREIGN KEY FK_28E472D2AB990336');
        $this->addSql('ALTER TABLE epreuve_obstacle DROP FOREIGN KEY FK_28E472D2F616DCDF');
        $this->addSql('DROP TABLE epreuve_obstacle');
        $this->addSql('ALTER TABLE parametrer CHANGE hauteur hauteur VARCHAR(50) DEFAULT NULL');
    }
}
