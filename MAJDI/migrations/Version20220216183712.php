<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220216183712 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD5DC6FE57');
        $this->addSql('ALTER TABLE product DROP prix, DROP taille, DROP color, CHANGE sub_category_id sub_category_id INT DEFAULT NULL');
        $this->addSql('DROP INDEX idx_d34a04ad5dc6fe57 ON product');
        $this->addSql('CREATE INDEX IDX_D34A04ADF7BFE87C ON product (sub_category_id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD5DC6FE57 FOREIGN KEY (sub_category_id) REFERENCES sub_category (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADF7BFE87C');
        $this->addSql('ALTER TABLE product ADD prix VARCHAR(255) NOT NULL, ADD taille VARCHAR(255) NOT NULL, ADD color VARCHAR(255) NOT NULL, CHANGE sub_category_id sub_category_id INT NOT NULL');
        $this->addSql('DROP INDEX idx_d34a04adf7bfe87c ON product');
        $this->addSql('CREATE INDEX IDX_D34A04AD5DC6FE57 ON product (sub_category_id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADF7BFE87C FOREIGN KEY (sub_category_id) REFERENCES sub_category (id)');
    }
}
