<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230609100212 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA1471770D1D');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA148B0B20A6');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14AB739AC5');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14BDA986C8');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14EA168CE1');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14EE041128');
        $this->addSql('DROP INDEX UNIQ_CFBDFA148B0B20A6 ON note');
        $this->addSql('DROP INDEX UNIQ_CFBDFA14EA168CE1 ON note');
        $this->addSql('DROP INDEX UNIQ_CFBDFA14BDA986C8 ON note');
        $this->addSql('DROP INDEX UNIQ_CFBDFA14AB739AC5 ON note');
        $this->addSql('DROP INDEX UNIQ_CFBDFA14EE041128 ON note');
        $this->addSql('DROP INDEX UNIQ_CFBDFA1471770D1D ON note');
        $this->addSql('ALTER TABLE note ADD obstacle_id INT DEFAULT NULL, ADD cavalier_id INT DEFAULT NULL, ADD niveau_id INT DEFAULT NULL, ADD style_id INT DEFAULT NULL, ADD contrat_id INT DEFAULT NULL, ADD allure_id INT DEFAULT NULL, DROP id_obstacle_id, DROP id_cavalier_id, DROP id_niveau_id, DROP id_style_id, DROP id_contrat_id, DROP id_allure_id');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14F616DCDF FOREIGN KEY (obstacle_id) REFERENCES obstacle (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA146965C0EA FOREIGN KEY (cavalier_id) REFERENCES cavalier (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14B3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveau (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14BACD6074 FOREIGN KEY (style_id) REFERENCES style (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA141823061F FOREIGN KEY (contrat_id) REFERENCES contrat (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA142B4626E2 FOREIGN KEY (allure_id) REFERENCES allure (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CFBDFA14F616DCDF ON note (obstacle_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CFBDFA146965C0EA ON note (cavalier_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CFBDFA14B3E9C81 ON note (niveau_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CFBDFA14BACD6074 ON note (style_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CFBDFA141823061F ON note (contrat_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CFBDFA142B4626E2 ON note (allure_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14F616DCDF');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA146965C0EA');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14B3E9C81');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14BACD6074');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA141823061F');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA142B4626E2');
        $this->addSql('DROP INDEX UNIQ_CFBDFA14F616DCDF ON note');
        $this->addSql('DROP INDEX UNIQ_CFBDFA146965C0EA ON note');
        $this->addSql('DROP INDEX UNIQ_CFBDFA14B3E9C81 ON note');
        $this->addSql('DROP INDEX UNIQ_CFBDFA14BACD6074 ON note');
        $this->addSql('DROP INDEX UNIQ_CFBDFA141823061F ON note');
        $this->addSql('DROP INDEX UNIQ_CFBDFA142B4626E2 ON note');
        $this->addSql('ALTER TABLE note ADD id_obstacle_id INT DEFAULT NULL, ADD id_cavalier_id INT DEFAULT NULL, ADD id_niveau_id INT DEFAULT NULL, ADD id_style_id INT DEFAULT NULL, ADD id_contrat_id INT DEFAULT NULL, ADD id_allure_id INT DEFAULT NULL, DROP obstacle_id, DROP cavalier_id, DROP niveau_id, DROP style_id, DROP contrat_id, DROP allure_id');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA1471770D1D FOREIGN KEY (id_cavalier_id) REFERENCES cavalier (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA148B0B20A6 FOREIGN KEY (id_niveau_id) REFERENCES niveau (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14AB739AC5 FOREIGN KEY (id_allure_id) REFERENCES allure (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14BDA986C8 FOREIGN KEY (id_contrat_id) REFERENCES contrat (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14EA168CE1 FOREIGN KEY (id_style_id) REFERENCES style (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14EE041128 FOREIGN KEY (id_obstacle_id) REFERENCES obstacle (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CFBDFA148B0B20A6 ON note (id_niveau_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CFBDFA14EA168CE1 ON note (id_style_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CFBDFA14BDA986C8 ON note (id_contrat_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CFBDFA14AB739AC5 ON note (id_allure_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CFBDFA14EE041128 ON note (id_obstacle_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CFBDFA1471770D1D ON note (id_cavalier_id)');
    }
}
