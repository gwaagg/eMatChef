<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250622102620 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE material_item DROP FOREIGN KEY fk_material_standort
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE app_user DROP FOREIGN KEY fk_user_department
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE material_item DROP FOREIGN KEY fk_material_department
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE material_item DROP FOREIGN KEY fk_material_kategorie
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE department DROP FOREIGN KEY fk_department_organisation
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE material_log DROP FOREIGN KEY material_log_ibfk_1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE material_log DROP FOREIGN KEY material_log_ibfk_2
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE standort
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE organisation
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE department
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE material_log
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE kategorie
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX fk_user_department ON app_user
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE app_user DROP department_id, DROP name
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE app_user RENAME INDEX email TO UNIQ_IDENTIFIER_EMAIL
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX fk_material_department ON material_item
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX fk_material_kategorie ON material_item
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX fk_material_standort ON material_item
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE standort (id INT AUTO_INCREMENT NOT NULL, regal VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, platz VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_0900_ai_ci` ENGINE = InnoDB COMMENT = '' 
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE organisation (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_0900_ai_ci` ENGINE = InnoDB COMMENT = '' 
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE department (id INT AUTO_INCREMENT NOT NULL, organisation_id INT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, INDEX fk_department_organisation (organisation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_0900_ai_ci` ENGINE = InnoDB COMMENT = '' 
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE material_log (id INT AUTO_INCREMENT NOT NULL, material_item_id INT NOT NULL, user_id INT NOT NULL, field VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, old_value TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, new_value TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, created_at DATETIME NOT NULL, INDEX material_item_id (material_item_id), INDEX user_id (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_0900_ai_ci` ENGINE = InnoDB COMMENT = '' 
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE kategorie (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, type VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_0900_ai_ci` ENGINE = InnoDB COMMENT = '' 
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE department ADD CONSTRAINT fk_department_organisation FOREIGN KEY (organisation_id) REFERENCES organisation (id) ON UPDATE NO ACTION ON DELETE NO ACTION
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE material_log ADD CONSTRAINT material_log_ibfk_1 FOREIGN KEY (material_item_id) REFERENCES material_item (id) ON UPDATE NO ACTION ON DELETE NO ACTION
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE material_log ADD CONSTRAINT material_log_ibfk_2 FOREIGN KEY (user_id) REFERENCES app_user (id) ON UPDATE NO ACTION ON DELETE NO ACTION
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE app_user ADD department_id INT NOT NULL, ADD name VARCHAR(255) NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE app_user ADD CONSTRAINT fk_user_department FOREIGN KEY (department_id) REFERENCES department (id) ON UPDATE NO ACTION ON DELETE NO ACTION
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX fk_user_department ON app_user (department_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE app_user RENAME INDEX uniq_identifier_email TO email
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE material_item ADD CONSTRAINT fk_material_department FOREIGN KEY (department_id) REFERENCES department (id) ON UPDATE NO ACTION ON DELETE NO ACTION
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE material_item ADD CONSTRAINT fk_material_kategorie FOREIGN KEY (kategorie_id) REFERENCES kategorie (id) ON UPDATE NO ACTION ON DELETE NO ACTION
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE material_item ADD CONSTRAINT fk_material_standort FOREIGN KEY (standort_id) REFERENCES standort (id) ON UPDATE NO ACTION ON DELETE NO ACTION
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX fk_material_department ON material_item (department_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX fk_material_kategorie ON material_item (kategorie_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX fk_material_standort ON material_item (standort_id)
        SQL);
    }
}
