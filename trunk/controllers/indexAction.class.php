<?php 
class indexAction extends Action {
    /**
     * 首页
     * @return
     */
    public function index() {
        if (!$this->_isLog()) {
            echo "You are not login!";
            $this->_setAuth();
        } else {
            echo "welcome !".$this->_getAuth('user');
        }
        
        $this->display();
    }
	/**
	 * 授权
	 * @return 
	 */
    private function _setAuth() {
        $_SESSION['zvchat']['user'] = 'netroby';
    }
	/**
	 * 检查授权
	 * @param object $var [optional]
	 * @return 
	 */
    private function _getAuth($var=false) {
        if ($_SESSION['zvchat']) {
            if ($var && isset($_SESSION['zvchat'][$var])) {
                return $_SESSION['zvchat'][$var];
            } else {
                return $_SESSION['zvchat'];
            }
            
        } else {
            return false;
        }
        
    }
    /**
     * 用户是否登陆
     * @return
     */
    private function _isLog() {
        if (!$this->_getAuth()) {
            return false;
        } else {
            return true;
        }
    }
}
