<?php
/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

/**
 * XOOPS Kernel Class
 *
 * @copyright       The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license         GNU GPL 2 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
 * @package         kernel
 * @since           2.0.0
 * @author          Kazumi Ono (AKA onokazu) http://www.myweb.ne.jp/, http://jp.xoops.org/
 * @author          Gregory Mage (AKA Mage)
 * @author          trabis <lusopoemas@gmail.com>
 * @version         $Id$
 */

defined('XOOPS_ROOT_PATH') or die('Restricted access');

class XoopsBlock extends XoopsObject
{
    /**
     * Constructor
     *
     * @param int|array $id
     */
    public function __construct($id = null)
    {
        $this->initVar('bid', XOBJ_DTYPE_INT, null, false);
        $this->initVar('mid', XOBJ_DTYPE_INT, 0, false);
        $this->initVar('func_num', XOBJ_DTYPE_INT, 0, false);
        $this->initVar('options', XOBJ_DTYPE_TXTBOX, null, false, 255);
        $this->initVar('name', XOBJ_DTYPE_TXTBOX, null, true, 150);
        //$this->initVar('position', XOBJ_DTYPE_INT, 0, false);
        $this->initVar('title', XOBJ_DTYPE_TXTBOX, null, false, 150);
        $this->initVar('content', XOBJ_DTYPE_TXTAREA, null, false);
        $this->initVar('side', XOBJ_DTYPE_INT, 0, false);
        $this->initVar('weight', XOBJ_DTYPE_INT, 0, false);
        $this->initVar('visible', XOBJ_DTYPE_INT, 0, false);
        // The block_type is in a mess, let's say:
        // S - generated by system module
        // M - generated by a non-system module
        // C - Custom block
        // D - cloned system/module block
        // E - cloned custom block, DON'T use it
        $this->initVar('block_type', XOBJ_DTYPE_OTHER, null, false);
        $this->initVar('c_type', XOBJ_DTYPE_OTHER, null, false);
        $this->initVar('isactive', XOBJ_DTYPE_INT, null, false);
        $this->initVar('dirname', XOBJ_DTYPE_TXTBOX, null, false, 50);
        $this->initVar('func_file', XOBJ_DTYPE_TXTBOX, null, false, 50);
        $this->initVar('show_func', XOBJ_DTYPE_TXTBOX, null, false, 50);
        $this->initVar('edit_func', XOBJ_DTYPE_TXTBOX, null, false, 50);
        $this->initVar('template', XOBJ_DTYPE_OTHER, null, false);
        $this->initVar('bcachetime', XOBJ_DTYPE_INT, 0, false);
        $this->initVar('last_modified', XOBJ_DTYPE_INT, 0, false);

        // for backward compatibility
        if (isset($id)) {
            if (is_array($id)) {
                $this->assignVars($id);
            } else {
                $xoops = Xoops::getInstance();
                $blkhandler = $xoops->getHandlerBlock();
                $obj = $blkhandler->get($id);
                foreach (array_keys($obj->getVars()) as $i) {
                    $this->assignVar($i, $obj->getVar($i, 'n'));
                }
            }
        }
    }


    /**
     * @param string $format
     * @return mixed
     */
    public function id($format = 'n')
    {
        return $this->getVar('bid', $format);
    }

    /**
     * @param string $format
     * @return mixed
     */
    public function bid($format = '')
    {
        return $this->getVar('bid', $format);
    }

    /**
     * @param string $format
     * @return mixed
     */
    public function mid($format = '')
    {
        return $this->getVar('mid', $format);
    }

    /**
     * @param string $format
     * @return mixed
     */
    public function func_num($format = '')
    {
        return $this->getVar('func_num', $format);
    }

    /**
     * @param string $format
     * @return mixed
     */
    public function options($format = '')
    {
        return $this->getVar('options', $format);
    }

    /**
     * @param string $format
     * @return mixed
     */
    public function name($format = '')
    {
        return $this->getVar('name', $format);
    }

    /**
     * @param string $format
     * @return mixed
     */
    public function title($format = '')
    {
        return $this->getVar('title', $format);
    }

    /**
     * @param string $format
     * @return mixed
     */
    public function content($format = '')
    {
        return $this->getVar('content', $format);
    }

    /**
     * @param string $format
     * @return mixed
     */
    public function side($format = '')
    {
        return $this->getVar('side', $format);
    }

    /**
     * @param string $format
     * @return mixed
     */
    public function weight($format = '')
    {
        return $this->getVar('weight', $format);
    }

    /**
     * @param string $format
     * @return mixed
     */
    public function visible($format = '')
    {
        return $this->getVar('visible', $format);
    }

    /**
     * @param string $format
     * @return mixed
     */
    public function block_type($format = '')
    {
        return $this->getVar('block_type', $format);
    }

    /**
     * @param string $format
     * @return mixed
     */
    public function c_type($format = '')
    {
        return $this->getVar('c_type', $format);
    }

    /**
     * @param string $format
     * @return mixed
     */
    public function isactive($format = '')
    {
        return $this->getVar('isactive', $format);
    }

    /**
     * @param string $format
     * @return mixed
     */
    public function dirname($format = '')
    {
        return $this->getVar('dirname', $format);
    }

    /**
     * @param string $format
     * @return mixed
     */
    public function func_file($format = '')
    {
        return $this->getVar('func_file', $format);
    }

    /**
     * @param string $format
     * @return mixed
     */
    public function show_func($format = '')
    {
        return $this->getVar('show_func', $format);
    }

    /**
     * @param string $format
     * @return mixed
     */
    public function edit_func($format = '')
    {
        return $this->getVar('edit_func', $format);
    }

    /**
     * @param string $format
     * @return mixed
     */
    public function template($format = '')
    {
        return $this->getVar('template', $format);
    }

    /**
     * @param string $format
     * @return mixed
     */
    public function bcachetime($format = '')
    {
        return $this->getVar('bcachetime', $format);
    }

    /**
     * @param string $format
     * @return mixed
     */
    public function last_modified($format = '')
    {
        return $this->getVar('last_modified', $format);
    }

    /**
     * return the content of the block for output
     *
     * @param string $format
     * @param string $c_type type of content<br>
     * Legal value for the type of content<br>
     * <ul><li>H : custom HTML block
     * <li>P : custom PHP block
     * <li>S : use text sanitizater (smilies enabled)
     * <li>T : use text sanitizater (smilies disabled)</ul>
     * @return string content for output
     */
    public function getContent($format = 's', $c_type = 'T')
    {
        $format = strtolower($format);
        $c_type = strtoupper($c_type);
        switch ($format) {
            case 's':
                // check the type of content
                // H : custom HTML block
                // P : custom PHP block
                // S : use text sanitizater (smilies enabled)
                // T : use text sanitizater (smilies disabled)
                if ($c_type == 'H') {
                    return str_replace('{X_SITEURL}', XOOPS_URL . '/', $this->getVar('content', 'n'));
                } else {
                    if ($c_type == 'P') {
                        ob_start();
                        echo eval($this->getVar('content', 'n'));
                        $content = ob_get_contents();
                        ob_end_clean();
                        return str_replace('{X_SITEURL}', XOOPS_URL . '/', $content);
                    } else {
                        if ($c_type == 'S') {
                            $myts = MyTextSanitizer::getInstance();
                            $content = str_replace('{X_SITEURL}', XOOPS_URL . '/', $this->getVar('content', 'n'));
                            return $myts->displayTarea($content, 1, 1);
                        } else {
                            $myts = MyTextSanitizer::getInstance();
                            $content = str_replace('{X_SITEURL}', XOOPS_URL . '/', $this->getVar('content', 'n'));
                            return $myts->displayTarea($content, 1, 0);
                        }
                    }
                }
                break;
            case 'e':
                return $this->getVar('content', 'e');
                break;
            default:
                return $this->getVar('content', 'n');
                break;
        }
    }

    /**
     * (HTML-) form for setting the options of the block
     *
     * @return string HTML for the form, FALSE if not defined for this block
     */
    public function getOptions()
    {
        $xoops = Xoops::getInstance();
        if (!$this->isCustom()) {
            $edit_func = (string)$this->getVar('edit_func');
            if (!$edit_func) {
                return false;
            }
            if (XoopsLoad::fileExists(XOOPS_ROOT_PATH . '/modules/' . $this->getVar('dirname') . '/blocks/' . $this->getVar('func_file'))) {
                $xoops->loadLanguage('blocks', $this->getVar('dirname'));
                include_once XOOPS_ROOT_PATH . '/modules/' . $this->getVar('dirname') . '/blocks/' . $this->getVar('func_file');
                $options = explode('|', $this->getVar('options'));
                $edit_form = $edit_func($options);
                if (!$edit_form) {
                    return false;
                }
                return $edit_form;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function isCustom()
    {
        return in_array($this->getVar("block_type"), array('C', 'E'));
    }

    /************ADDED**************/


    /**
     * Build Block
     *
     * @return array|bool
     */
    public function buildBlock()
    {
        $xoops = Xoops::getInstance();
        $block = array();
        if (!$this->isCustom()) {
            // get block display function
            $show_func = (string)$this->getVar('show_func');
            if (!$show_func) {
                return false;
            }
            if (!XoopsLoad::fileExists($func_file = $xoops->path('modules/' . $this->getVar('dirname') . '/blocks/' . $this->getVar('func_file')))) {
                return false;
            }
            // must get lang files b4 including the file
            // some modules require it for code that is outside the function
            $xoops->loadLanguage('blocks', $this->getVar('dirname'));
            $xoops->loadLocale($this->getVar('dirname'));
            include_once $func_file;

            if (function_exists($show_func)) {
                // execute the function
                $options = explode('|', $this->getVar('options'));
                $block = $show_func($options);
                if (!$block) {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            // it is a custom block, so just return the contents
            $block['content'] = $this->getContent('s', $this->getVar('c_type'));
            if (empty($block['content'])) {
                return false;
            }
        }
        return $block;
    }
}

class XoopsBlockHandler extends XoopsPersistableObjectHandler
{
    /**
     * Constructor
     *
     * @param XoopsConnection|null $db {@link XoopsConnection}
     */
    public function __construct(XoopsConnection $db = null)
    {
        parent::__construct($db, 'newblocks', 'XoopsBlock', 'bid', 'name');
    }

    /**
     * @param XoopsBlock $obj
     * @param bool $force
     * @return mixed
     */
    public function insertBlock(XoopsBlock &$obj, $force = false)
    {
        $obj->setVar('last_modified', time());
        return parent::insert($obj, $force);
    }

    /**
     * Delete a ID from the database
     *
     * @param XoopsBlock $obj
     * @return bool
     */
    public function deleteBlock(XoopsBlock &$obj)
    {
        if (!parent::delete($obj)) {
            return false;
        }
        $sql = sprintf("DELETE FROM %s WHERE gperm_name = 'block_read' AND gperm_itemid = %u AND gperm_modid = 1", $this->db->prefix('group_permission'), $obj->getVar('bid'));
        $this->db->query($sql);
        $sql = sprintf("DELETE FROM %s WHERE block_id = %u", $this->db->prefix('block_module_link'), $obj->getVar('bid'));
        $this->db->query($sql);
        return true;
    }

    /**
     * retrieve array of {@link XoopsBlock}s meeting certain conditions
     * @param CriteriaElement|null $criteria {@link CriteriaElement} with conditions for the blocks
     * @param bool $id_as_key should the blocks' bid be the key for the returned array?
     * @return array {@link XoopsBlock}s matching the conditions
     **/
    public function getDistinctObjects(CriteriaElement $criteria = null, $id_as_key = false)
    {
        $ret = array();
        $limit = $start = 0;
        $sql = 'SELECT DISTINCT(b.bid), b.* FROM ' . $this->db->prefix('newblocks') . ' b LEFT JOIN ' . $this->db->prefix('block_module_link') . ' l ON b.bid=l.block_id';
        if (isset($criteria) && is_subclass_of($criteria, 'criteriaelement')) {
            $sql .= ' ' . $criteria->renderWhere();
            $limit = $criteria->getLimit();
            $start = $criteria->getStart();
        }
        $result = $this->db->query($sql, $limit, $start);
        if (!$result) {
            return $ret;
        }
        while ($myrow = $this->db->fetchArray($result)) {
            $block = new XoopsBlock();
            $block->assignVars($myrow);
            if (!$id_as_key) {
                $ret[] = $block;
            } else {
                $ret[$myrow['bid']] = $block;
            }
            unset($block);
        }
        return $ret;
    }

    /**
     * get a list of blocks matching certain conditions
     *
     * @param CriteriaElement|null $criteria conditions to match
     * @return array array of blocks matching the conditions
     **/
    public function getNameList(CriteriaElement $criteria = null)
    {
        $blocks = $this->getObjects($criteria, true);
        $ret = array();
        foreach (array_keys($blocks) as $i) {
            $name = (!$blocks[$i]->isCustom()) ? $blocks[$i]->getVar('name') : $blocks[$i]->getVar('title');
            $ret[$i] = $name;
        }
        return $ret;
    }

    /**
     * get all the blocks that match the supplied parameters
     *
     * @param int $side   0: sideblock - left
     *        1: sideblock - right
     *        2: sideblock - left and right
     *        3: centerblock - left
     *        4: centerblock - right
     *        5: centerblock - center
     *        6: centerblock - left, right, center
     * @param bool $asobject
     * @param int|array $groupid   groupid (can be an array)
     * @param int|null $visible   0: not visible 1: visible
     * @param string $orderby   order of the blocks
     * @param int $isactive
     * @return array of block objects
     */
    public function getAllBlocksByGroup($groupid, $asobject = true, $side = null, $visible = null, $orderby = "b.weight,b.bid", $isactive = 1)
    {
        global $xoopsDB;
        $db = $xoopsDB;
        $ret = array();
        if (!$asobject) {
            $sql = 'SELECT b.bid ';
        } else {
            $sql = 'SELECT b.* ';
        }
        $sql .= "FROM " . $db->prefix("newblocks") . " b LEFT JOIN " . $db->prefix("group_permission") . " l ON l.gperm_itemid=b.bid WHERE gperm_name = 'block_read' AND gperm_modid = 1";
        if (is_array($groupid)) {
            $sql .= " AND (l.gperm_groupid=" . $groupid[0] . "";
            $size = count($groupid);
            if ($size > 1) {
                for ($i = 1; $i < $size; $i++) {
                    $sql .= " OR l.gperm_groupid=" . $groupid[$i] . "";
                }
            }
            $sql .= ")";
        } else {
            $sql .= " AND l.gperm_groupid=" . $groupid . "";
        }
        $sql .= " AND b.isactive=" . $isactive;
        if (isset($side)) {
            // get both sides in sidebox? (some themes need this)
            if ($side == XOOPS_SIDEBLOCK_BOTH) {
                $side = "(b.side=0 OR b.side=1)";
            } elseif ($side == XOOPS_CENTERBLOCK_ALL) {
                $side = "(b.side=3 OR b.side=4 OR b.side=5 OR b.side=7 OR b.side=8 OR b.side=9 )";
            } else {
                $side = "b.side=" . $side;
            }
            $sql .= " AND " . $side;
        }
        if (isset($visible)) {
            $sql .= " AND b.visible=$visible";
        }
        $sql .= " ORDER BY $orderby";
        $result = $db->query($sql);
        $added = array();
        while ($myrow = $db->fetchArray($result)) {
            if (!in_array($myrow['bid'], $added)) {
                if (!$asobject) {
                    $ret[] = $myrow['bid'];
                } else {
                    $ret[] = new XoopsBlock($myrow);
                }
                array_push($added, $myrow['bid']);
            }
        }
        return $ret;
    }

    /**
     * @param string $rettype
     * @param null $side
     * @param null $visible
     * @param string $orderby
     * @param int $isactive
     * @return array
     */
    public function getAllBlocks($rettype = "object", $side = null, $visible = null, $orderby = "side,weight,bid", $isactive = 1)
    {
        global $xoopsDB;
        $db = $xoopsDB;
        $ret = array();
        $where_query = " WHERE isactive=" . $isactive;
        if (isset($side)) {
            // get both sides in sidebox? (some themes need this)
            if ($side == 2) {
                $side = "(side=0 OR side=1)";
            } elseif ($side == 6) {
                $side = "(side=3 OR side=4 OR side=5 OR side=7 OR side=8 OR side=9)";
            } else {
                $side = "side=" . $side;
            }
            $where_query .= " AND " . $side;
        }
        if (isset($visible)) {
            $where_query .= " AND visible=." . $visible;
        }
        $where_query .= " ORDER BY " . $orderby;
        switch ($rettype) {
            case "object":
                $sql = "SELECT * FROM " . $db->prefix("newblocks") . "" . $where_query;
                $result = $db->query($sql);
                while ($myrow = $db->fetchArray($result)) {
                    $ret[] = new XoopsBlock($myrow);
                }
                break;
            case "list":
                $sql = "SELECT * FROM " . $db->prefix("newblocks") . "" . $where_query;
                $result = $db->query($sql);
                while ($myrow = $db->fetchArray($result)) {
                    $block = new XoopsBlock($myrow);
                    $title = $block->getVar("title");
                    $title = empty($title) ? $block->getVar("name") : $title;
                    $ret[$block->getVar("bid")] = $title;
                }
                break;
            case "id":
                $sql = "SELECT bid FROM " . $db->prefix("newblocks") . "" . $where_query;
                $result = $db->query($sql);
                while ($myrow = $db->fetchArray($result)) {
                    $ret[] = $myrow['bid'];
                }
                break;
        }
        //echo $sql;
        return $ret;
    }

    /**
     * @param int $moduleid
     * @param bool $asobject
     * @return array
     */
    public function getByModule($moduleid, $asobject = true)
    {
        global $xoopsDB;
        $moduleid = intval($moduleid);
        $db = $xoopsDB;
        if ($asobject == true) {
            $sql = "SELECT * FROM " . $db->prefix("newblocks") . " WHERE mid=" . $moduleid;
        } else {
            $sql = "SELECT bid FROM " . $db->prefix("newblocks") . " WHERE mid=" . $moduleid;
        }
        $result = $db->query($sql);
        $ret = array();
        while ($myrow = $db->fetchArray($result)) {
            if ($asobject) {
                $ret[] = new XoopsBlock($myrow);
            } else {
                $ret[] = $myrow['bid'];
            }
        }
        return $ret;
    }

    /**
     * XoopsBlock::getAllByGroupModule()
     *
     * @param mixed $groupid
     * @param integer $module_id
     * @param mixed $toponlyblock
     * @param mixed $visible
     * @param string $orderby
     * @param integer $isactive
     * @return array
     */
    public function getAllByGroupModule($groupid, $module_id = 0, $toponlyblock = false, $visible = null, $orderby = 'b.weight, m.block_id', $isactive = 1)
    {
        global $xoopsDB;
        $isactive = intval($isactive);
        $db = $xoopsDB;
        $ret = array();
        $blockids = array();
        $sqlgroupid="";
        if (isset($groupid)) {
            $sqlgroupid = "SELECT DISTINCT gperm_itemid FROM " . $db->prefix('group_permission') . " WHERE gperm_name = 'block_read' AND gperm_modid = 1";
            if (is_array($groupid)) {
                $sqlgroupid .= ' AND gperm_groupid IN (' . implode(',', $groupid) . ')';
            } else {
                if (intval($groupid) > 0) {
                    $sqlgroupid .= ' AND gperm_groupid=' . intval($groupid);
                }
            }
          /* This query is put on subselect later
           * let's mysql making the job
           *
           * $result = $db->query($sql);
            while ($myrow = $db->fetchArray($result)) {
                $blockids[] = $myrow['gperm_itemid'];
            }
            if (empty($blockids)) {
                return $blockids;
            }
            */
        }
        $sql = 'SELECT b.* FROM ' . $db->prefix('newblocks') . ' b, ' . $db->prefix('block_module_link') . ' m';
        $sql .= ' WHERE b.isactive=' . $isactive;
        if (isset($visible)) {
            $sql .= ' AND b.visible=' . intval($visible);
        }
        if (isset($module_id)) {
            $sql .= ' AND m.block_id=b.bid';
            if (!empty($module_id)) {
                $sql .= ' AND m.module_id IN (0,' . intval($module_id);
                if ($toponlyblock) {
                    $sql .= ',-1';
                }
                $sql .= ')';
            } else {
                if ($toponlyblock) {
                    $sql .= ' AND m.module_id IN (0,-1)';
                } else {
                    $sql .= ' AND m.module_id=0';
                }
            }
        }
       /* if (!empty($blockids)) {
            $sql .= ' AND b.bid IN (' . implode(',', $blockids) . ')';
        }
        */
        if ($sqlgroupid !="") {
            $sql .= ' AND b.bid IN (' . $sqlgroupid . ')';
        }
        $sql .= ' ORDER BY ' . $orderby;
        $result = $db->query($sql);
        while ($myrow = $db->fetchArray($result)) {
            $block = new XoopsBlock($myrow);
            $ret[$myrow['bid']] = $block;
            unset($block);
        }
        return $ret;
    }

    /**
     * XoopsBlock::getNonGroupedBlocks()
     *
     * @param integer $module_id
     * @param mixed $toponlyblock
     * @param mixed $visible
     * @param string $orderby
     * @param integer $isactive
     * @return array
     */
    public function getNonGroupedBlocks($module_id = 0, $toponlyblock = false, $visible = null, $orderby = 'b.weight, m.block_id', $isactive = 1)
    {
        global $xoopsDB;
        $db = $xoopsDB;
        $ret = array();
        $bids = array();
        $sql = "SELECT DISTINCT(bid) from " . $db->prefix('newblocks');
        if ($result = $db->query($sql)) {
            while ($myrow = $db->fetchArray($result)) {
                $bids[] = $myrow['bid'];
            }
        }
        $sql = "SELECT DISTINCT(p.gperm_itemid) from " . $db->prefix('group_permission') . " p, " . $db->prefix('groups') . " g WHERE g.groupid=p.gperm_groupid AND p.gperm_name='block_read'";
        $grouped = array();
        if ($result = $db->query($sql)) {
            while ($myrow = $db->fetchArray($result)) {
                $grouped[] = $myrow['gperm_itemid'];
            }
        }
        $non_grouped = array_diff($bids, $grouped);
        if (!empty($non_grouped)) {
            $sql = 'SELECT b.* FROM ' . $db->prefix('newblocks') . ' b, ' . $db->prefix('block_module_link') . ' m';
            $sql .= ' WHERE b.isactive=' . intval($isactive);
            if (isset($visible)) {
                $sql .= ' AND b.visible=' . intval($visible);
            }
            if (!isset($module_id)) {
            } else {
                $sql .= ' AND m.block_id=b.bid';
                if (!empty($module_id)) {
                    $sql .= ' AND m.module_id IN (0,' . intval($module_id);
                    if ($toponlyblock) {
                        $sql .= ',-1';
                    }
                    $sql .= ')';
                } else {
                    if ($toponlyblock) {
                        $sql .= ' AND m.module_id IN (0,-1)';
                    } else {
                        $sql .= ' AND m.module_id=0';
                    }
                }
            }
            $sql .= ' AND b.bid IN (' . implode(',', $non_grouped) . ')';
            $sql .= ' ORDER BY ' . $orderby;
            $result = $db->query($sql);
            while ($myrow = $db->fetchArray($result)) {
                $block = new XoopsBlock($myrow);
                $ret[$myrow['bid']] = $block;
                unset($block);
            }
        }
        return $ret;
    }

    /**
     * XoopsBlock::countSimilarBlocks()
     *
     * @param int $moduleId
     * @param string $funcNum
     * @param mixed $showFunc
     * @return int
     */
    public function countSimilarBlocks($moduleId, $funcNum, $showFunc = null)
    {
        global $xoopsDB;
        $funcNum = intval($funcNum);
        $moduleId = intval($moduleId);
        if ($funcNum < 1 || $moduleId < 1) {
            // invalid query
            return 0;
        }
        $db = $xoopsDB;
        if (isset($showFunc)) {
            // showFunc is set for more strict comparison
            $sql = sprintf("SELECT COUNT(*) FROM %s WHERE mid = %d AND func_num = %d AND show_func = %s", $db->prefix('newblocks'), $moduleId, $funcNum, $db->quoteString(trim($showFunc)));
        } else {
            $sql = sprintf("SELECT COUNT(*) FROM %s WHERE mid = %d AND func_num = %d", $db->prefix('newblocks'), $moduleId, $funcNum);
        }
        if (!$result = $db->query($sql)) {
            return 0;
        }
        list ($count) = $db->fetchRow($result);
        return $count;
    }

    /**
     * Aligns the content of a block
     * If position is 0, content in DB is positioned
     * before the original content
     * If position is 1, content in DB is positioned
     * after the original content
     *
     * @param $position
     * @param string $content
     * @param string $contentdb
     * @return string
     */
    public function buildContent($position, $content = "", $contentdb = "")
    {
        $ret = '';
        if ($position == 0) {
            $ret = $contentdb . $content;
        } else {
            if ($position == 1) {
                $ret = $content . $contentdb;
            }
        }
        return $ret;
    }

    /**
     * Enter description here...
     *
     * @param string $originaltitle
     * @param string $newtitle
     * @return string title
     */
    public function buildTitle($originaltitle, $newtitle = '')
    {
        if ($newtitle != '') {
            $ret = $newtitle;
        } else {
            $ret = $originaltitle;
        }
        return $ret;
    }

    /************ system ***************/

    /**
     * @param int|array $groupid
     * @return array
     */
    public function getBlockByPerm($groupid)
    {
        $ret = array();
        if (isset($groupid)) {
            $sql = "SELECT DISTINCT gperm_itemid FROM " . $this->db->prefix('group_permission') . " WHERE gperm_name = 'block_read' AND gperm_modid = 1";
            if (is_array($groupid)) {
                $sql .= ' AND gperm_groupid IN (' . implode(',', $groupid) . ')';
            } else {
                if (intval($groupid) > 0) {
                    $sql .= ' AND gperm_groupid=' . intval($groupid);
                }
            }
            $result = $this->db->query($sql);
            $blockids = array();
            while ($myrow = $this->db->fetchArray($result)) {
                $blockids[] = $myrow['gperm_itemid'];
            }
            if (empty($blockids)) {
                return $blockids;
            }
            return $blockids;
        }
        return $ret;
    }
}