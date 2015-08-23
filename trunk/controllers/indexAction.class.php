<?php 
class indexAction extends Action {
    /**
     * ��ҳ
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
	 * ��Ȩ
	 * @return 
	 */
    private function _setAuth() {
        $_SESSION['zvchat']['user'] = 'netroby';
    }
	/**
	 * �����Ȩ
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
     * �û��Ƿ��½
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
