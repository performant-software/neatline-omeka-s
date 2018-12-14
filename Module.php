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
use Omeka\Permissions\Assertion\OwnsEntityAssertion;
use Doctrine\DBAL\Types\Type;
use Composer\Semver\Comparator;

require_once __DIR__.'/vendor/autoload.php';

class Module extends AbstractModule
{
    public function getConfig()
    {
        return include __DIR__.'/config/module.config.php';
    }

    public function onBootstrap(MvcEvent $event)
    {
        parent::onBootstrap($event);

        class_alias('Neatline\PHP\Types\Geometry\GeometryCollection', 'CrEOF\Spatial\PHP\Types\Geometry\GeometryCollection');
        Type::addType('geometry_collection', 'Neatline\DBAL\Types\Geometry\GeometryCollectionType');

        $acl = $this->getServiceLocator()->get('Omeka\Acl');
        $acl->allow(
            null,
            ['Neatline\Controller\Index',
             'Neatline\Api\Adapter\ExhibitAdapter',
             'Neatline\Api\Adapter\RecordAdapter']
        );
        $acl->allow(
            Acl::ROLE_GLOBAL_ADMIN,
            ['Neatline\Entity\NeatlineExhibit',
             'Neatline\Entity\NeatlineRecord'],
            'view-all'
        );
        $acl->allow(
            Acl::ROLE_EDITOR,
            ['Neatline\Entity\NeatlineExhibit',
             'Neatline\Entity\NeatlineRecord'],
            'create'
        );
        $acl->allow(
            null,
            ['Neatline\Entity\NeatlineExhibit',
             'Neatline\Entity\NeatlineRecord'],
            ['delete',
             'update'],
            new OwnsEntityAssertion
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

    public function upgrade($oldVersion, $newVersion, ServiceLocatorInterface $serviceLocator)
    {
        if (Comparator::lessThan($oldVersion, '3.0.1')) {
            $connection = $serviceLocator->get('Omeka\Connection');
            $connection->exec("
				ALTER TABLE neatline_exhibit
                ADD COLUMN tile_address TEXT NULL,
                ADD COLUMN image_attribution TEXT NULL,
                ADD COLUMN wms_attribution TEXT NULL,
                ADD COLUMN tile_attribution TEXT NULL;
            ");
        }

		if (Comparator::lessThan($oldVersion, '3.0.2')) {
            $connection = $serviceLocator->get('Omeka\Connection');
            $connection->exec("
				ALTER TABLE neatline_exhibit
                ADD COLUMN exhibit_type INT(10) UNSIGNED NOT NULL DEFAULT 0;
            ");
        }
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

        $sharedEventManager->attach(
            '*',
            MvcEvent::EVENT_ROUTE,
            [$this, 'processApiRequest'],
            2
        );
    }

    /**
     * Filter private exhibits.
     *
     * @param Event $event
     */
    public function filterExhibits(ZendEvent $event)
    {
        $acl = $this->getServiceLocator()->get('Omeka\Acl');
        if ($acl->userIsAllowed('Neatline\Entity\NeatlineExhibit', 'view-all')) {
            return;
        }

        $adapter = $event->getTarget();
        $qb = $event->getParam('queryBuilder');

        // Users can view exhibits they do not own that are public.
        $expression = $qb->expr()->eq('Neatline\Entity\NeatlineExhibit.public', true);

        $identity = $this->getServiceLocator()
            ->get('Omeka\AuthenticationService')->getIdentity();
        if ($identity) {
            $expression = $qb->expr()->orX(
                $expression,
                // Users can view all exhibits they own.
                $qb->expr()->eq(
                    "Neatline\Entity\NeatlineExhibit.owner",
                    $adapter->createNamedParameter($qb, $identity)
                )
            );
        }
        $qb->andWhere($expression);
    }

    /**
     * Provides a workaround for Omeka's assumption of key-secret authentication method for API endpoints, letting Neatline endpoints use JWT instead.
     */
    public function processApiRequest(MvcEvent $event)
    {
        $status = $this->getServiceLocator()->get('Neatline\NeatlineStatus');
        if ($status->isNeatlineApiRequest()) {
            $params = $event->getRequest()->getQuery();
            $jwt = $params->get('jwt');
            if ($jwt) {
                if (!$params->get('key_identity')) $params->set('key_identity', '');
                if (!$params->get('key_credential')) $params->set('key_credential', '');

                $auth = $event->getApplication()->getServiceManager()
                    ->get('Omeka\AuthenticationService');
                $auth->getAdapter()->setJwt($jwt);
            }
        }
    }
}
