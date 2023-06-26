<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230609100036 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE allure (id INT AUTO_INCREMENT NOT NULL, val_allure INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contrat (id INT AUTO_INCREMENT NOT NULL, val_contrat INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE note (id INT AUTO_INCREMENT NOT NULL, id_obstacle_id INT DEFAULT NULL, id_cavalier_id INT DEFAULT NULL, id_niveau_id INT DEFAULT NULL, id_style_id INT DEFAULT NULL, id_contrat_id INT DEFAULT NULL, id_allure_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_CFBDFA14EE041128 (id_obstacle_id), UNIQUE INDEX UNIQ_CFBDFA1471770D1D (id_cavalier_id), UNIQUE INDEX UNIQ_CFBDFA148B0B20A6 (id_niveau_id), UNIQUE INDEX UNIQ_CFBDFA14EA168CE1 (id_style_id), UNIQUE INDEX UNIQ_CFBDFA14BDA986C8 (id_contrat_id), UNIQUE INDEX UNIQ_CFBDFA14AB739AC5 (id_allure_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE style (id INT AUTO_INCREMENT NOT NULL, val_style INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14EE041128 FOREIGN KEY (id_obstacle_id) REFERENCES obstacle (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA1471770D1D FOREIGN KEY (id_cavalier_id) REFERENCES cavalier (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA148B0B20A6 FOREIGN KEY (id_niveau_id) REFERENCES niveau (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14EA168CE1 FOREIGN KEY (id_style_id) REFERENCES style (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14BDA986C8 FOREIGN KEY (id_contrat_id) REFERENCES contrat (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14AB739AC5 FOREIGN KEY (id_allure_id) REFERENCES allure (id)');
        $this->addSql('ALTER TABLE parametrer CHANGE hauteur hauteur VARCHAR(50) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14EE041128');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA1471770D1D');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA148B0B20A6');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14EA168CE1');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14BDA986C8');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14AB739AC5');
        $this->addSql('DROP TABLE allure');
        $this->addSql('DROP TABLE contrat');
        $this->addSql('DROP TABLE note');
        $this->addSql('DROP TABLE style');
        $this->addSql('ALTER TABLE parametrer CHANGE hauteur hauteur VARCHAR(50) NOT NULL');
    }
}
