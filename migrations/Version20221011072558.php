<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221011072558 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE answer ADD id_project_id INT NOT NULL');
        $this->addSql('ALTER TABLE answer ADD CONSTRAINT FK_DADD4A25B3E79F4B FOREIGN KEY (id_project_id) REFERENCES project (id)');
        $this->addSql('CREATE INDEX IDX_DADD4A25B3E79F4B ON answer (id_project_id)');
        $this->addSql('ALTER TABLE project ADD id_manager_id INT NOT NULL');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EEDDB4B4B4 FOREIGN KEY (id_manager_id) REFERENCES manager (id)');
        $this->addSql('CREATE INDEX IDX_2FB3D0EEDDB4B4B4 ON project (id_manager_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE answer DROP FOREIGN KEY FK_DADD4A25B3E79F4B');
        $this->addSql('DROP INDEX IDX_DADD4A25B3E79F4B ON answer');
        $this->addSql('ALTER TABLE answer DROP id_project_id');
        $this->addSql('ALTER TABLE project DROP FOREIGN KEY FK_2FB3D0EEDDB4B4B4');
        $this->addSql('DROP INDEX IDX_2FB3D0EEDDB4B4B4 ON project');
        $this->addSql('ALTER TABLE project DROP id_manager_id');
    }
}
