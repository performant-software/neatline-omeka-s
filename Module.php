<?php

namespace Neatline;

use Omeka\Module\AbstractModule;
use Zend\View\Renderer\PhpRenderer;
use Zend\Mvc\Controller\AbstractController;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\EventManager\SharedEventManagerInterface;
use Zend\EventManager\Event as ZendEvent;
use Zend\Mvc\MvcEvent;
use Omeka\Permissions\Acl;

class Module extends AbstractModule
{
    public function getConfig()
    {
        return include __DIR__.'/config/module.config.php';
    }

    public function onBootstrap(MvcEvent $event)
    {
        parent::onBootstrap($event);

        $acl = $this->getServiceLocator()->get('Omeka\Acl');
        $acl->allow(
            null,
            ['Neatline\Controller\Index',
             'Neatline\Api\Adapter\ExhibitAdapter']
        );
        $acl->allow(
            Acl::ROLE_GLOBAL_ADMIN,
            ['Neatline\Entity\NeatlineExhibit'],
            'view-all'
        );
    }

    public function install(ServiceLocatorInterface $serviceLocator)
    {
        $connection = $serviceLocator->get('Omeka\Connection');
        $sql = "
            CREATE TABLE IF NOT EXISTS neatline_exhibit (

               id                      INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
               owner_id                INT(10) UNSIGNED NOT NULL,
               added                   TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
               modified                TIMESTAMP NULL,
               published               TIMESTAMP NULL,
               item_query              TEXT NULL,
               spatial_layers          TEXT NULL,
               spatial_layer           TEXT NULL,
               image_layer             TEXT NULL,
               image_height            SMALLINT UNSIGNED NULL,
               image_width             SMALLINT UNSIGNED NULL,
               zoom_levels             SMALLINT UNSIGNED NULL,
               wms_address             TEXT NULL,
               wms_layers              TEXT NULL,
               widgets                 TEXT NULL,
               title                   TEXT NULL,
               slug                    VARCHAR(100) NOT NULL,
               narrative               LONGTEXT NULL,
               spatial_querying        TINYINT(1) NOT NULL,
               public                  TINYINT(1) NOT NULL,
               styles                  TEXT NULL,
               map_focus               VARCHAR(100) NULL,
               map_zoom                INT(10) UNSIGNED NULL,
               accessible_url          TEXT NULL,
               map_restricted_extent   TEXT NULL,
               map_min_zoom            SMALLINT UNSIGNED NULL,
               map_max_zoom            SMALLINT UNSIGNED NULL,

               PRIMARY KEY             (id)

            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

            CREATE TABLE IF NOT EXISTS neatline_record (

               id                      INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
               owner_id                INT(10) UNSIGNED NOT NULL,
               item_id                 INT(10) UNSIGNED NULL,
               exhibit_id              INT(10) UNSIGNED NULL,
               added                   TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
               modified                TIMESTAMP NULL,
               is_coverage             TINYINT(1) NOT NULL,
               is_wms                  TINYINT(1) NOT NULL,
               slug                    VARCHAR(100) NULL,
               title                   MEDIUMTEXT NULL,
               item_title              MEDIUMTEXT NULL,
               body                    MEDIUMTEXT NULL,
               coverage                GEOMETRY NOT NULL,
               tags                    TEXT NULL,
               widgets                 TEXT NULL,
               presenter               VARCHAR(100) NULL,
               fill_color              VARCHAR(100) NULL,
               fill_color_select       VARCHAR(100) NULL,
               stroke_color            VARCHAR(100) NULL,
               stroke_color_select     VARCHAR(100) NULL,
               fill_opacity            DECIMAL(3,2) NULL,
               fill_opacity_select     DECIMAL(3,2) NULL,
               stroke_opacity          DECIMAL(3,2) NULL,
               stroke_opacity_select   DECIMAL(3,2) NULL,
               stroke_width            INT(10) UNSIGNED NULL,
               point_radius            INT(10) UNSIGNED NULL,
               zindex                  INT(10) UNSIGNED NULL,
               weight                  INT(10) UNSIGNED NULL,
               start_date              VARCHAR(100) NULL,
               end_date                VARCHAR(100) NULL,
               after_date              VARCHAR(100) NULL,
               before_date             VARCHAR(100) NULL,
               point_image             VARCHAR(100) NULL,
               wms_address             TEXT NULL,
               wms_layers              TEXT NULL,
               min_zoom                INT(10) UNSIGNED NULL,
               max_zoom                INT(10) UNSIGNED NULL,
               map_zoom                INT(10) UNSIGNED NULL,
               map_focus               VARCHAR(100) NULL,

               PRIMARY KEY             (id),

               INDEX                   (added),
               INDEX                   (exhibit_id, item_id),
               INDEX                   (min_zoom, max_zoom),
               SPATIAL INDEX           (coverage),

               FULLTEXT INDEX          (title, body, slug),
               FULLTEXT INDEX          (tags),
               FULLTEXT INDEX          (widgets)

            ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        ";
        $connection->exec($sql);
    }

    public function uninstall(ServiceLocatorInterface $serviceLocator)
    {
        $connection = $serviceLocator->get('Omeka\Connection');
        $connection->exec("DROP TABLE neatline_exhibit;");
        $connection->exec("DROP TABLE neatline_record;");
    }

    /**
     * @param PhpRenderer $renderer
     * @return string
     */
    public function getConfigForm(PhpRenderer $renderer)
    {
        return '<input name="google-maps-api-key">';
    }

    /**
     * @param AbstractController $controller
     * @return bool False if there was an error during handling
     */
    public function handleConfigForm(AbstractController $controller)
    {
        return true;
    }

    public function attachListeners(SharedEventManagerInterface $sharedEventManager)
    {
        $sharedEventManager->attach(
            'Neatline\Api\Adapter\ExhibitAdapter',
            'api.search.query',
            [$this, 'filterExhibits']
        );
    }

    public function filterExhibits(ZendEvent $event)
    {
        $acl = $this->getServiceLocator()->get('Omeka\Acl');
        if ($acl->userIsAllowed('Neatline\Entity\NeatlineExhibit', 'view-all')) {
            return;
        }

        $qb = $event->getParam('queryBuilder');
        $expression = $qb->expr()->eq('Neatline\Entity\NeatlineExhibit.public', true);
        $qb->andWhere($expression);
    }
}
