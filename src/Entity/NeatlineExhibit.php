<?php
namespace Neatline\Entity;

use DateTime;
use Omeka\Entity\AbstractEntity;
use Omeka\Entity\User;

/**
 * @package     omeka
 * @subpackage  neatline
 * @copyright   2014 Rector and Board of Visitors, University of Virginia
 * @license     http://www.apache.org/licenses/LICENSE-2.0.html
 */

 /**
  * @Entity
  */
class NeatlineExhibit extends AbstractEntity
{

    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    protected $id;

    /**
     * @ManyToOne(targetEntity="Omeka\Entity\User", inversedBy="neatline_exhibits")
     */
    protected $owner;

    /**
     * @Column(type="datetime")
     */
    protected $added;

    /**
     * @Column(type="datetime", nullable=true)
     */
    protected $modified;

    /**
     * @Column(type="datetime", nullable=true)
     */
    protected $published;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $item_query;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $spatial_layers;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $spatial_layer;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $image_layer;

    /**
     * @Column(type="smallint", nullable=true)
     */
    protected $image_height;

    /**
     * @Column(type="smallint", nullable=true)
     */
    protected $image_width;

    /**
     * @Column(type="smallint", nullable=true)
     */
    protected $zoom_levels;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $wms_address;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $wms_layers;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $widgets;

    /**
     * @Column(type="string", nullable=true)
     */
    protected $title;

    /**
     * @Column(type="string")
     */
    protected $slug;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $narrative;

    /**
     * @Column(type="boolean")
     */
    protected $spatial_querying = true;

    /**
     * @Column(type="boolean")
     */
    protected $public = false;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $styles;

    /**
     * @Column(type="string", nullable=true)
     */
    protected $map_focus;

    /**
     * @Column(type="integer", nullable=true)
     */
    protected $map_zoom;

    /**
     * @Column(type="smallint", nullable=true)
     */
    protected $map_min_zoom;

    /**
     * @Column(type="smallint", nullable=true)
     */
    protected $map_max_zoom;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $map_restricted_extent;

    /**
     * @Column(type="integer", nullable=true)
     */
    protected $accessible_url;

    public function getId()
    {
        return $this->id;
    }

    public function setOwner(User $owner = null)
    {
        $this->owner = $owner;
    }

    public function getOwner()
    {
        return $this->owner;
    }

    public function setAdded(DateTime $dateTime)
    {
        $this->added = $dateTime;
    }

    public function getAdded()
    {
        return $this->added;
    }

    public function setModified(DateTime $dateTime)
    {
        $this->modified = $dateTime;
    }

    public function getModified()
    {
        return $this->modified;
    }

    public function setPublished(DateTime $dateTime)
    {
        $this->published = $dateTime;
    }

    public function getPublished()
    {
        return $this->published;
    }

    public function setItemQuery($item_query)
    {
        $this->item_query = $item_query;
    }

    public function getItemQuery()
    {
        return $this->item_query;
    }

    public function setSpatialLayers($spatial_layers)
    {
        $this->spatial_layers = $spatial_layers;
    }

    public function getSpatialLayers()
    {
        return $this->spatial_layers;
    }

    public function setSpatialLayer($spatial_layer)
    {
        $this->spatial_layer = $spatial_layer;
    }

    public function getSpatialLayer()
    {
        return $this->spatial_layer;
    }

    public function setImageLayer($image_layer)
    {
        $this->image_layer = $image_layer;
    }

    public function getImageLayer()
    {
        return $this->image_layer;
    }

    public function setImageHeight($image_height)
    {
        $this->image_height = $image_height;
    }

    public function getImageHeight()
    {
        return $this->image_height;
    }

    public function setImageWidth($image_width)
    {
        $this->image_width = $image_width;
    }

    public function getImageWidth()
    {
        return $this->image_width;
    }

    public function setZoomLevels($zoom_levels)
    {
        $this->zoom_levels = $zoom_levels;
    }

    public function getZoomLevels()
    {
        return $this->zoom_levels;
    }

    public function setWmsAddress($wms_address)
    {
        $this->wms_address = $wms_address;
    }

    public function getWmsAddress()
    {
        return $this->wms_address;
    }

    public function setWmsLayers($wms_layers)
    {
        $this->wms_layers = $wms_layers;
    }

    public function getWmsLayers()
    {
        return $this->wms_layers;
    }

    public function setWidgets($widgets)
    {
        $this->widgets = $widgets;
    }

    public function getWidgets()
    {
        return $this->widgets;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function setNarrative($narrative)
    {
        $this->narrative = $narrative;
    }

    public function getNarrative()
    {
        return $this->narrative;
    }

    public function setSpatialQuerying($spatial_querying)
    {
        $this->spatial_querying = (bool) $spatial_querying;
    }

    public function getSpatialQuerying()
    {
        return (bool) $this->spatial_querying;
    }

    public function setPublic($public)
    {
        $this->public = (bool) $public;
    }

    public function getPublic()
    {
        return (bool) $this->public;
    }

    public function setStyles($styles)
    {
        $this->styles = $styles;
    }

    public function getStyles()
    {
        return $this->styles;
    }

    public function setMapFocus($map_focus)
    {
        $this->map_focus = $map_focus;
    }

    public function getMapFocus()
    {
        return $this->map_focus;
    }

    public function setMapZoom($map_zoom)
    {
        $this->map_zoom = $map_zoom;
    }

    public function getMapZoom()
    {
        return $this->map_zoom;
    }

    public function setMapMinZoom($map_min_zoom)
    {
        $this->map_min_zoom = $map_min_zoom;
    }

    public function getMapMinZoom()
    {
        return $this->map_min_zoom;
    }

    public function setMapMaxZoom($map_max_zoom)
    {
        $this->map_max_zoom = $map_max_zoom;
    }

    public function getMapMaxZoom()
    {
        return $this->map_max_zoom;
    }

    public function setMapRestrictedExtent($map_restricted_extent)
    {
        $this->map_restricted_extent = $map_restricted_extent;
    }

    public function getMapRestrictedExtent()
    {
        return $this->map_restricted_extent;
    }

    public function setAccessibleUrl($accessible_url)
    {
        $this->accessible_url = $accessible_url;
    }

    public function getAccessibleUrl()
    {
        return $this->accessible_url;
    }

    // protected function _initializeMixins()
    // {
    //     parent::_initializeMixins();
    //     $this->_mixins[] = new Mixin_Timestamp($this, 'added', null);
    // }
    //
    // /**
    //  * Set exhibit search text.
    //  */
    // protected function afterSave($args)
    // {
    //     // reinitialize mixins, otherwise a duplicate exhibit will incorrectly populate search text for the original
    //     $this->_mixins = array();
    //     $this->_initializeMixins();
    //
    //     if ($this->private) {
    //       $this->setSearchTextPrivate();
    //     }
    //
    //     $this->setSearchTextTitle($this->title);
    //     $this->addSearchText($this->title);
    //     $this->addSearchText($this->narrative);
    // }
    //
    //
    // /**
    //  * If the exhibit is being published to the public site for the first
    //  * time, set the `published` timestamp.
    //  *
    //  * @param array $values The POST/PUT data.
    //  */
    // public function saveForm($values)
    // {
    //
    //     // Assign the values.
    //     $this->setArray($values);
    //
    //     // If the exhibit is being set "public" for the first time, set the
    //     // `published` timestamp to the current date.
    //
    //     if (is_null($this->published) && $this->public == 1) {
    //         $this->published = date(self::DATE_FORMAT);
    //     }
    //
    //     $this->save();
    //
    // }
    //
    //
    // /**
    //  * Get the number of active records in the exhibit.
    //  *
    //  * @return integer The record count.
    //  */
    // public function getNumberOfRecords()
    // {
    //     return $this->getTable('NeatlineRecord')->count(array(
    //         'exhibit_id' => $this->id
    //     ));
    // }
    //
    //
    // /**
    //  * Get the routing parameters or the URL string for the exhibit.
    //  *
    //  * @param string $action The controller action.
    //  */
    // public function getRecordUrl($action = 'show')
    // {
    //     if ($action = 'show') {
    //       $params = array('action' => $action, 'slug' => $this->slug);
    //       return public_url($params, 'neatline');
    //     }
    //
    //     $urlHelper = new Omeka_View_Helper_Url;
    //     $params = array('action' => $action, 'id' => $this->id);
    //     return $urlHelper->url($params, 'neatlineActionId');
    // }
    //
    //
    // /**
    //  * Check whether a widget is enabled.
    //  *
    //  * @param string $widget The id of the widget.
    //  * @return boolean True if the widget is enabled.
    //  */
    // public function hasWidget($id)
    // {
    //     return in_array($id, nl_explode($this->widgets));
    // }
    //
    //
    // /**
    //  * Update records in an exhibit according to the style definitions in the
    //  * `styles` CSS. For example, if `styles` is:
    //  *
    //  * .tag {
    //  *   fill-color: #ffffff;
    //  *   stroke-color: auto;
    //  * }
    //  *
    //  * The `fill_color` on records tagged with `tag` will be set to `#ffffff`,
    //  * but the stroke color will be left as-is since no explicit value is set
    //  * in the CSS.
    //  */
    // public function pushStyles()
    // {
    //
    //     // Parse the stylesheet.
    //     $css = nl_readCSS($this->styles);
    //
    //     // Load records table.
    //     $recordsTable = $this->getTable('NeatlineRecord');
    //
    //     // Gather style columns.
    //     $valid = nl_getStyles();
    //
    //     foreach ($css as $tag => $rules) {
    //
    //         $where = array('exhibit_id = ?' => $this->id);
    //
    //         // If selector is `all`, update all records in the exhibit;
    //         // otherwise, just match records with the tag.
    //         if ($tag != 'all') {
    //             $where['MATCH (tags) AGAINST (? IN BOOLEAN MODE)'] = $tag;
    //         }
    //
    //         // Walk valid CSS rules.
    //         $set = array();
    //         foreach ($rules as $prop => $val) {
    //             if (in_array($prop, $valid)) {
    //
    //                 // Push value if not `auto` or `none`.
    //                 if ($val != 'auto' && $val != 'none') {
    //                     $set[$prop] = $val;
    //                 }
    //
    //                 // If `none`, push NULL.
    //                 else if ($val == 'none') {
    //                     $set[$prop] = null;
    //                 }
    //
    //             }
    //         }
    //
    //         // Update records.
    //         if (!empty($set)) $recordsTable->update(
    //             $recordsTable->getTableName(), $set, $where
    //         );
    //
    //     }
    //
    // }
    //
    //
    // /**
    //  * Update the exhibit stylesheet with values from a specific record. For
    //  * example, if `styles` is:
    //  *
    //  * .tag {
    //  *   fill-color: #111111;
    //  *   stroke-color: #222222;
    //  * }
    //  *
    //  * And the record is tagged with `tag` has a `fill_color` of `#333333` and
    //  * a `stroke_color` of `#444444`, the stylesheet would be updated to:
    //  *
    //  * .tag {
    //  *   fill-color: #333333;
    //  *   stroke-color: #444444;
    //  * }
    //  *
    //  * @param NeatlineRecord $record The record to update from.
    //  */
    // public function pullStyles($record)
    // {
    //
    //     // Parse the stylesheet.
    //     $css = nl_readCSS($this->styles);
    //
    //     // Explode record tags.
    //     $tags = nl_explode($record->tags);
    //
    //     // Gather style columns.
    //     $valid = nl_getStyles();
    //
    //     foreach ($css as $selector => $rules) {
    //
    //         // Is the record tagged with the selector?
    //         if (in_array($selector, $tags) || $selector == 'all') {
    //
    //             // Scan valid rule definitions.
    //             foreach ($rules as $prop => $val) {
    //
    //                 // Is the property valid?
    //                 if (in_array($prop, $valid)) {
    //
    //                     // Get the record value.
    //                     $value = !is_null($record->$prop) ?
    //                         $record->$prop : 'none';
    //
    //                     // Update the CSS.
    //                     $css[$selector][$prop] = $value;
    //
    //                 }
    //
    //             }
    //
    //         }
    //
    //     }
    //
    //     // Recompile the stylesheet.
    //     $this->styles = nl_writeCSS($css);
    //
    // }
    //
    //
    // /**
    //  * Measure the size of the image defined by `image_layer`. Wrapped in a
    //  * try/catch so that it's possible to work with exhibits offline.
    //  */
    // public function compileImageSize()
    // {
    //     if (!is_null($this->image_layer)) {
    //         try {
    //             $size = getimagesize($this->image_layer);
    //             $this->image_height = $size[1];
    //             $this->image_width  = $size[0];
    //         } catch (Exception $e) {}
    //     }
    // }
    //
    //
    // /**
    //  * Delete all records that belong to the exhibit.
    //  */
    // public function deleteChildRecords()
    // {
    //
    //     // Get records table and name.
    //     $recordsTable = $this->getTable('NeatlineRecord');
    //     $rName = $recordsTable->getTableName();
    //
    //     // Gather record expansion tables.
    //     foreach (nl_getRecordExpansions() as $expansion) {
    //
    //         $eName = $expansion->getTableName();
    //
    //         // Delete expansion rows on child records.
    //         $this->_db->query("DELETE $eName FROM $eName
    //             INNER JOIN $rName ON $eName.parent_id = $rName.id
    //             WHERE $rName.exhibit_id = $this->id
    //         ");
    //
    //     }
    //
    //     // Delete child records.
    //     $recordsTable->delete(
    //         $rName, array('exhibit_id=?' => $this->id)
    //     );
    //
    // }
    //
    //
    // /**
    //  * Measure the image layer when the exhibit is * saved.
    //  */
    // protected function beforeSave($args)
    // {
    //     if (ini_get('allow_url_fopen')) {
    //         $this->compileImageSize();
    //     }
    // }
    //
    //
    // /**
    //  * Delete all child records when the exhibit is deleted.
    //  */
    // protected function beforeDelete()
    // {
    //     $this->deleteChildRecords();
    // }
    //
    //
    // /**
    //  * Associate the model with an ACL resource id.
    //  *
    //  * @return string The resource id.
    //  */
    // public function getResourceId()
    // {
    //     return 'Neatline_Exhibits';
    // }

}
