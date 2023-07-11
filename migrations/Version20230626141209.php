<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230626141209 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE obstacle DROP FOREIGN KEY FK_CCBF5DB1FC8CE522');
        $this->addSql('ALTER TABLE cavalier DROP FOREIGN KEY FK_FFD9B8A7FC8CE522');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649FC8CE522');
        $this->addSql('ALTER TABLE posseder_note_total DROP FOREIGN KEY FK_E264181C1DB77787');
        $this->addSql('ALTER TABLE posseder_note_total DROP FOREIGN KEY FK_E264181CFC8CE522');
        $this->addSql('ALTER TABLE penalite_note_total DROP FOREIGN KEY FK_4410E019D0CCF327');
        $this->addSql('ALTER TABLE penalite_note_total DROP FOREIGN KEY FK_4410E019FC8CE522');
        $this->addSql('ALTER TABLE posseder_type_note DROP FOREIGN KEY FK_9CB4DF311DB77787');
        $this->addSql('ALTER TABLE posseder_type_note DROP FOREIGN KEY FK_9CB4DF31ECC67A0');
        $this->addSql('DROP TABLE posseder_note_total');
        $this->addSql('DROP TABLE posseder');
        $this->addSql('DROP TABLE penalite_note_total');
        $this->addSql('DROP TABLE note_total');
        $this->addSql('DROP TABLE type_note');
        $this->addSql('DROP TABLE posseder_type_note');
        $this->addSql('DROP INDEX IDX_FFD9B8A7FC8CE522 ON cavalier');
        $this->addSql('ALTER TABLE cavalier DROP note_total_id');
        $this->addSql('DROP INDEX IDX_CCBF5DB1FC8CE522 ON obstacle');
        $this->addSql('ALTER TABLE obstacle DROP note_total_id');
        $this->addSql('DROP INDEX IDX_8D93D649FC8CE522 ON user');
        $this->addSql('ALTER TABLE user DROP note_total_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE posseder_note_total (posseder_id INT NOT NULL, note_total_id INT NOT NULL, INDEX IDX_E264181C1DB77787 (posseder_id), INDEX IDX_E264181CFC8CE522 (note_total_id), PRIMARY KEY(posseder_id, note_total_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE posseder (id INT AUTO_INCREMENT NOT NULL, val INT NOT NULL, nom VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE penalite_note_total (penalite_id INT NOT NULL, note_total_id INT NOT NULL, INDEX IDX_4410E019D0CCF327 (penalite_id), INDEX IDX_4410E019FC8CE522 (note_total_id), PRIMARY KEY(penalite_id, note_total_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE note_total (id INT AUTO_INCREMENT NOT NULL, note DOUBLE PRECISION DEFAULT NULL, observation VARCHAR(250) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE type_note (id INT AUTO_INCREMENT NOT NULL, libelle_type_note VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE posseder_type_note (posseder_id INT NOT NULL, type_note_id INT NOT NULL, INDEX IDX_9CB4DF311DB77787 (posseder_id), INDEX IDX_9CB4DF31ECC67A0 (type_note_id), PRIMARY KEY(posseder_id, type_note_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE posseder_note_total ADD CONSTRAINT FK_E264181C1DB77787 FOREIGN KEY (posseder_id) REFERENCES posseder (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE posseder_note_total ADD CONSTRAINT FK_E264181CFC8CE522 FOREIGN KEY (note_total_id) REFERENCES note_total (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE penalite_note_total ADD CONSTRAINT FK_4410E019D0CCF327 FOREIGN KEY (penalite_id) REFERENCES penalite (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE penalite_note_total ADD CONSTRAINT FK_4410E019FC8CE522 FOREIGN KEY (note_total_id) REFERENCES note_total (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE posseder_type_note ADD CONSTRAINT FK_9CB4DF311DB77787 FOREIGN KEY (posseder_id) REFERENCES posseder (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE posseder_type_note ADD CONSTRAINT FK_9CB4DF31ECC67A0 FOREIGN KEY (type_note_id) REFERENCES type_note (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE obstacle ADD note_total_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE obstacle ADD CONSTRAINT FK_CCBF5DB1FC8CE522 FOREIGN KEY (note_total_id) REFERENCES note_total (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_CCBF5DB1FC8CE522 ON obstacle (note_total_id)');
        $this->addSql('ALTER TABLE cavalier ADD note_total_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cavalier ADD CONSTRAINT FK_FFD9B8A7FC8CE522 FOREIGN KEY (note_total_id) REFERENCES note_total (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_FFD9B8A7FC8CE522 ON cavalier (note_total_id)');
        $this->addSql('ALTER TABLE user ADD note_total_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649FC8CE522 FOREIGN KEY (note_total_id) REFERENCES note_total (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_8D93D649FC8CE522 ON user (note_total_id)');
    }
}
