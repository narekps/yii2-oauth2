<?php
/**
 * ScopeController.php
 *
 * PHP version 5.6+
 *
 * @author pgaultier
 * @copyright 2010-2016 Ibitux
 * @license http://www.ibitux.com/license license
 * @version XXX
 * @link http://www.ibitux.com
 * @package sweelix\oauth2\server\commands
 */

namespace sweelix\oauth2\server\commands;

use yii\console\Controller;
use Yii;

/**
 * Manage oauth scopes
 *
 * @author pgaultier
 * @copyright 2010-2016 Ibitux
 * @license http://www.ibitux.com/license license
 * @version XXX
 * @link http://www.ibitux.com
 * @package sweelix\oauth2\server\commands
 * @since XXX
 */
class ScopeController extends Controller
{

    public $isDefault = false;
    public $definition;

    /**
     * @inheritdoc
     */
    public function options($actionID)
    {
        return [
            // 'id',
            'isDefault',
            'definition',
        ];
    }
    /**
     * Create new Oauth scope
     * @return int
     * @since XXX
     */
    public function actionCreate($id)
    {

        $scope = Yii::createObject('sweelix\oauth2\server\interfaces\ScopeModelInterface');
        /* @var \sweelix\oauth2\server\interfaces\ScopeModelInterface $scope */
        $scope->id = $id;
        $scope->isDefault = (bool)$this->isDefault;
        $scope->definition = $this->definition;
        if ($scope->save() === true) {
            $this->stdout('Scope created :'."\n");
            $this->stdout(' - id: ' . $scope->id . "\n");
            $this->stdout(' - isDefault: ' . ($scope->isDefault ? 'Yes' : 'No') . "\n");
            $this->stdout(' - definition: ' . $scope->definition . "\n");
        } else {
            $this->stdout('Scope cannot be created.'."\n");
        }
    }
}